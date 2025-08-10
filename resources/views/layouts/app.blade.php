<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-inter antialiased">
        <!-- Background -->
        <div class="fixed inset-0 bg-gradient-to-br from-slate-50 via-white to-slate-100 dark:from-slate-900 dark:via-[#313244] dark:to-slate-800"></div>
        
        <!-- Animated background elements -->
        <div class="fixed inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-eventify-gold/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-eventify-gold/5 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-white/5 dark:bg-eventify-dark/10 rounded-full blur-2xl animate-pulse" style="animation-delay: 4s;"></div>
        </div>

        <div class="relative min-h-screen">
            <!-- Navigation -->
            <x-navbar />

            <!-- Page Heading -->
            @isset($header)
                <header class="backdrop-blur-sm bg-white/20 dark:bg-white/5 border-b border-white/20 dark:border-white/10">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="pb-12">
                {{ $slot }}
            </main>
        </div>
        @livewireScripts
    </body>
</html>
