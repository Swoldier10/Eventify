<x-app-layout>
    <div class="py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto space-y-8">
            <!-- Page Header -->
            <div class="backdrop-blur-xl bg-white/30 dark:bg-white/5 border border-white/30 dark:border-white/10 rounded-3xl shadow-2xl shadow-black/10 dark:shadow-black/30 p-8">
                <div class="flex flex-col md:flex-row md:items-center justify-between space-y-4 md:space-y-0">
                    <div>
                        <h1 class="text-3xl font-bold text-slate-800 dark:text-white">Your Invitations</h1>
                        <p class="text-slate-600 dark:text-slate-400 mt-1">Create, manage, and track your event invitations</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="inline-flex items-center px-4 py-2 backdrop-blur-sm bg-eventify-gold/20 border border-eventify-gold/30 rounded-2xl">
                            <svg class="w-5 h-5 text-eventify-gold mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            <span class="text-sm font-medium text-eventify-gold">{{ rand(8, 15) }} Total</span>
                        </div>
                        <a href="{{ route('invitations.create.type') }}" class="inline-flex items-center px-6 py-3 bg-eventify-gold hover:bg-eventify-gold/90 text-white rounded-2xl font-semibold transition-all duration-200 transform hover:-translate-y-0.5 shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Create New
                        </a>
                    </div>
                </div>
            </div>

            <!-- Filter Tabs -->
            <div class="backdrop-blur-xl bg-white/30 dark:bg-white/5 border border-white/30 dark:border-white/10 rounded-3xl shadow-xl shadow-black/5 dark:shadow-black/20 p-2">
                <div class="flex flex-wrap gap-2">
                    <button class="px-6 py-3 bg-eventify-gold/20 text-eventify-gold border border-eventify-gold/30 rounded-2xl font-medium text-sm transition-all duration-200">
                        All Invitations
                    </button>
                    <button class="px-6 py-3 text-slate-600 dark:text-slate-300 hover:bg-white/20 dark:hover:bg-white/10 rounded-2xl font-medium text-sm transition-all duration-200">
                        Active ({{ rand(2, 5) }})
                    </button>
                    <button class="px-6 py-3 text-slate-600 dark:text-slate-300 hover:bg-white/20 dark:hover:bg-white/10 rounded-2xl font-medium text-sm transition-all duration-200">
                        Drafts ({{ rand(1, 3) }})
                    </button>
                    <button class="px-6 py-3 text-slate-600 dark:text-slate-300 hover:bg-white/20 dark:hover:bg-white/10 rounded-2xl font-medium text-sm transition-all duration-200">
                        Completed ({{ rand(5, 12) }})
                    </button>
                </div>
            </div>

            <!-- Invitations Coming Soon -->
            <div class="backdrop-blur-xl bg-white/30 dark:bg-white/5 border border-white/30 dark:border-white/10 rounded-3xl shadow-2xl shadow-black/10 dark:shadow-black/30 p-12">
                <div class="text-center space-y-8">
                    <div class="inline-flex items-center justify-center p-6 bg-gradient-to-br from-eventify-gold/20 to-eventify-gold/10 rounded-full">
                        <svg class="w-20 h-20 text-eventify-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    
                    <div class="space-y-3">
                        <h2 class="text-3xl font-bold text-slate-800 dark:text-white">Beautiful Invitations Are Coming</h2>
                        <p class="text-lg text-slate-600 dark:text-slate-400 max-w-2xl mx-auto">
                            We're crafting the perfect invitation creation and management experience. Soon you'll be able to design stunning invitations, track RSVPs, and manage your events effortlessly.
                        </p>
                    </div>

                    <!-- Preview Features -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto">
                        <div class="backdrop-blur-sm bg-white/20 dark:bg-white/10 border border-white/30 dark:border-white/20 rounded-2xl p-6">
                            <div class="inline-flex items-center justify-center p-3 bg-purple-500/20 rounded-xl mb-4">
                                <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM7 3H5v14a2 2 0 002 2h2"></path>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-slate-800 dark:text-white mb-2">Template Library</h3>
                            <p class="text-sm text-slate-600 dark:text-slate-400">Choose from dozens of professionally designed templates</p>
                        </div>

                        <div class="backdrop-blur-sm bg-white/20 dark:bg-white/10 border border-white/30 dark:border-white/20 rounded-2xl p-6">
                            <div class="inline-flex items-center justify-center p-3 bg-green-500/20 rounded-xl mb-4">
                                <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-slate-800 dark:text-white mb-2">RSVP Tracking</h3>
                            <p class="text-sm text-slate-600 dark:text-slate-400">Real-time guest responses and attendance management</p>
                        </div>

                        <div class="backdrop-blur-sm bg-white/20 dark:bg-white/10 border border-white/30 dark:border-white/20 rounded-2xl p-6">
                            <div class="inline-flex items-center justify-center p-3 bg-blue-500/20 rounded-xl mb-4">
                                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-slate-800 dark:text-white mb-2">Smart Delivery</h3>
                            <p class="text-sm text-slate-600 dark:text-slate-400">Email, SMS, and social media distribution options</p>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center pt-4">
                        <a 
                            href="{{ route('dashboard') }}" 
                            class="inline-flex items-center justify-center px-6 py-3 backdrop-blur-sm bg-eventify-gold/20 hover:bg-eventify-gold/30 border border-eventify-gold/30 hover:border-eventify-gold/50 rounded-2xl text-eventify-gold font-medium transition-all duration-200 transform hover:-translate-y-0.5"
                        >
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            Back to Dashboard
                        </a>
                        <button 
                            disabled
                            class="inline-flex items-center justify-center px-6 py-3 backdrop-blur-sm bg-slate-200/50 dark:bg-slate-700/50 border border-slate-300/50 dark:border-slate-600/50 rounded-2xl text-slate-500 dark:text-slate-400 font-medium cursor-not-allowed"
                        >
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            Coming Soon
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>