<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Auth\LoginPage;
use App\Livewire\Auth\RegisterPage;
use App\Livewire\Invitations\CreateForm;
use App\Services\AuthService;
use Illuminate\Support\Facades\Route;

// Root route - redirect based on authentication status
Route::get('/', function (AuthService $authService) {
    if (auth()->check()) {
        // If authenticated, redirect to invitations or dashboard
        return redirect($authService->getAuthenticatedRedirect());
    }

    // If guest, redirect to login
    return redirect($authService->getGuestRedirect());
});

// Guest routes (auth pages)
Route::middleware('guest')->group(function () {
    Route::get('/login', LoginPage::class)->name('login');
    Route::get('/register', RegisterPage::class)->name('register');
});

// Logout route
Route::post('/logout', function (AuthService $authService) {
    $authService->logout();

    return redirect()->route('login');
})->middleware('auth')->name('logout');

// Protected routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Settings page
    Route::get('/settings', function () {
        return view('settings');
    })->name('settings');
    
    // Invitations routes
    Route::get('/invitations', function () {
        return view('invitations.index');
    })->name('invitations.index');
    
    // Invitation creation flow
    Route::get('/invitations/create/type', function () {
        return view('invitations.create.type');
    })->name('invitations.create.type');
    
    Route::get('/invitations/create/template', function () {
        $type = request('type', 'wedding');
        return view('invitations.create.template', compact('type'));
    })->name('invitations.create.template');
    
    Route::get('/invitations/create/form', CreateForm::class)->name('invitations.create.form');
    
    // Legacy route redirect
    Route::get('/invitations/create', function () {
        return redirect()->route('invitations.create.type');
    })->name('invitations.create');
});

// Include remaining auth routes (email verification, password reset, etc.)
require __DIR__.'/auth.php';