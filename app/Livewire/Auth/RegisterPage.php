<?php

namespace App\Livewire\Auth;

use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('Create Account - Eventify')]
class RegisterPage extends Component
{
    #[Rule('required|string|max:255')]
    public string $first_name = '';

    #[Rule('required|string|max:255')]
    public string $last_name = '';

    #[Rule('required|email:rfc,dns|unique:users,email')]
    public string $email = '';

    #[Rule('required|min:8|confirmed')]
    public string $password = '';

    #[Rule('required')]
    public string $password_confirmation = '';

    public bool $isLoading = false;

    /**
     * Register a new user account.
     */
    public function register(AuthService $authService): void
    {
        $this->isLoading = true;

        // Validate form data
        $validated = $this->validate();

        try {
            // Register user through service
            $user = $authService->register($validated);

            // Log in the newly created user
            Auth::login($user);

            // Redirect to dashboard after registration
            $this->redirect(route('dashboard'));
        } catch (\Exception $e) {
            $this->isLoading = false;
            throw $e;
        }
    }

    /**
     * Get validation messages for form fields.
     */
    protected function messages(): array
    {
        return [
            'first_name.required' => 'First name is required.',
            'first_name.max' => 'First name may not be greater than 255 characters.',
            'last_name.required' => 'Last name is required.',
            'last_name.max' => 'Last name may not be greater than 255 characters.',
            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already registered.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Password confirmation does not match.',
            'password_confirmation.required' => 'Please confirm your password.',
        ];
    }

    /**
     * Render the registration page.
     */
    public function render()
    {
        return view('livewire.auth.register-page');
    }
}
