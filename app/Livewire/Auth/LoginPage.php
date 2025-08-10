<?php

namespace App\Livewire\Auth;

use App\Services\AuthService;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('Sign In - Eventify')]
class LoginPage extends Component
{
    #[Rule('required|email')]
    public string $email = '';

    #[Rule('required')]
    public string $password = '';

    public bool $remember = false;

    public bool $isLoading = false;

    /**
     * Attempt to authenticate the user.
     */
    public function login(AuthService $authService): void
    {
        $this->isLoading = true;

        // Rate limiting
        $this->ensureIsNotRateLimited();

        // Validate form data
        $validated = $this->validate();

        try {
            // Attempt login through service
            $authService->login([
                'email' => $this->email,
                'password' => $this->password,
                'remember' => $this->remember,
            ]);

            // Clear rate limiting on successful login
            RateLimiter::clear($this->throttleKey());

            // Redirect to dashboard after login
            $this->redirect(route('dashboard'));
        } catch (ValidationException $e) {
            // Track failed login attempt
            RateLimiter::hit($this->throttleKey());

            $this->isLoading = false;

            // Re-throw validation exception to show errors
            throw $e;
        }
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws ValidationException
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }

    /**
     * Render the login page.
     */
    public function render()
    {
        return view('livewire.auth.login-page');
    }
}
