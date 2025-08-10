<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

class AuthService
{
    /**
     * Attempt to authenticate a user with email and password.
     *
     * @throws ValidationException
     */
    public function login(array $data): bool
    {
        $credentials = [
            'email' => strtolower(trim($data['email'])),
            'password' => $data['password'],
        ];

        if (Auth::attempt($credentials, $data['remember'] ?? false)) {
            request()->session()->regenerate();

            return true;
        }

        throw ValidationException::withMessages([
            'email' => __('The provided credentials do not match our records.'),
        ]);
    }

    /**
     * Register a new user and optionally log them in.
     */
    public function register(array $data): User
    {
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'name' => $data['first_name'].' '.$data['last_name'],
            'email' => strtolower(trim($data['email'])),
            'password' => Hash::make($data['password']),
        ]);

        event(new Registered($user));

        return $user;
    }

    /**
     * Log out the current user and invalidate the session.
     */
    public function logout(): void
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
    }

    /**
     * Get the intended redirect route after successful authentication.
     */
    public function getAuthenticatedRedirect(): string
    {
        // Check if invitations.index route exists, otherwise fallback to dashboard
        if (Route::has('invitations.index')) {
            return route('invitations.index');
        }

        return route('dashboard');
    }

    /**
     * Get the redirect route for guest users (login page).
     */
    public function getGuestRedirect(): string
    {
        return route('login');
    }
}
