<x-app-layout>
    <div class="py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto space-y-8">
            <!-- Page Header -->
            <div class="backdrop-blur-xl bg-white/30 dark:bg-white/5 border border-white/30 dark:border-white/10 rounded-3xl shadow-2xl shadow-black/10 dark:shadow-black/30 p-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-slate-800 dark:text-white">Settings</h1>
                        <p class="text-slate-600 dark:text-slate-400 mt-1">Manage your account preferences and configurations</p>
                    </div>
                    <div class="p-3 bg-eventify-gold/20 rounded-2xl">
                        <svg class="w-8 h-8 text-eventify-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Settings Coming Soon -->
            <div class="backdrop-blur-xl bg-white/30 dark:bg-white/5 border border-white/30 dark:border-white/10 rounded-3xl shadow-2xl shadow-black/10 dark:shadow-black/30 p-12">
                <div class="text-center space-y-6">
                    <div class="inline-flex items-center justify-center p-4 bg-slate-100/50 dark:bg-slate-800/50 rounded-full">
                        <svg class="w-16 h-16 text-slate-400 dark:text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                        </svg>
                    </div>
                    
                    <div class="space-y-2">
                        <h2 class="text-2xl font-bold text-slate-800 dark:text-white">Settings Coming Soon</h2>
                        <p class="text-slate-600 dark:text-slate-400 max-w-md mx-auto">
                            We're working on bringing you comprehensive settings to customize your Eventify experience. Stay tuned!
                        </p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a 
                            href="{{ route('dashboard') }}" 
                            class="inline-flex items-center justify-center px-6 py-3 backdrop-blur-sm bg-eventify-gold/20 hover:bg-eventify-gold/30 border border-eventify-gold/30 hover:border-eventify-gold/50 rounded-2xl text-eventify-gold font-medium transition-all duration-200 transform hover:-translate-y-0.5"
                        >
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            Back to Dashboard
                        </a>
                        <a 
                            href="{{ route('profile.edit') }}" 
                            class="inline-flex items-center justify-center px-6 py-3 backdrop-blur-sm bg-white/20 dark:bg-white/10 hover:bg-white/30 dark:hover:bg-white/15 border border-white/30 dark:border-white/20 hover:border-white/50 dark:hover:border-white/30 rounded-2xl text-slate-700 dark:text-slate-300 font-medium transition-all duration-200 transform hover:-translate-y-0.5"
                        >
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Edit Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>