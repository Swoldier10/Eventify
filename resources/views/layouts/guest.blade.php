<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-inter antialiased">
        <!-- Background -->
        <div class="fixed inset-0 bg-gradient-to-br from-slate-50 via-white to-slate-100 dark:from-slate-900 dark:via-[#313244] dark:to-slate-800"></div>
        
        <!-- Animated background elements -->
        <div class="fixed inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-eventify-gold/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-eventify-gold/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-white/5 dark:bg-eventify-dark/20 rounded-full blur-2xl animate-pulse" style="animation-delay: 4s;"></div>
        </div>

        <!-- Main content -->
        <div class="relative min-h-screen flex items-center justify-center px-4 py-8">
            <div class="w-full max-w-md">
                <!-- Logo -->
                <div class="text-center mb-8">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 dark:bg-white/10 backdrop-blur-xl border border-white/30 dark:border-white/20 rounded-2xl mb-4 shadow-xl">
                        <div class="w-8 h-8 bg-eventify-gold rounded-lg"></div>
                    </div>
                    <h1 class="text-3xl font-bold text-slate-800 dark:text-white mb-2">
                        Eventify
                    </h1>
                    <p class="text-slate-600 dark:text-slate-400 text-sm">
                        Create beautiful invitations
                    </p>
                </div>

                <!-- Glass Card -->
                <div class="backdrop-blur-xl bg-white/30 dark:bg-white/5 border border-white/30 dark:border-white/10 rounded-3xl shadow-2xl shadow-black/10 dark:shadow-black/30 p-8">
                    {{ $slot }}
                </div>
            </div>
        </div>
        @livewireScripts
    </body>
</html>
