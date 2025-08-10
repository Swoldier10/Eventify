<x-app-layout>
    <div class="py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto space-y-8">
            <!-- Welcome Section -->
            <div class="backdrop-blur-xl bg-white/30 dark:bg-white/5 border border-white/30 dark:border-white/10 rounded-3xl shadow-2xl shadow-black/10 dark:shadow-black/30 p-8">
                <div class="flex flex-col md:flex-row md:items-center justify-between">
                    <div class="space-y-2">
                        <h1 class="text-3xl font-bold text-slate-800 dark:text-white">
                            Welcome back, {{ auth()->user()->first_name ?? explode(' ', auth()->user()->name)[0] }}! 👋
                        </h1>
                        <p class="text-slate-600 dark:text-slate-400">
                            {{ collect([
                                'Ready to create something amazing today?',
                                'Your invitations are waiting for you.',
                                'Time to make some beautiful memories.',
                                'Let\'s craft your perfect event invitations.',
                                'Your creative space awaits you.'
                            ])->random() }}
                        </p>
                    </div>
                    <div class="mt-4 md:mt-0 text-right">
                        <div class="inline-flex items-center px-4 py-2 backdrop-blur-sm bg-eventify-gold/20 border border-eventify-gold/30 rounded-2xl">
                            <svg class="w-5 h-5 text-eventify-gold mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 12v-6m-6 6h16a2 2 0 002-2v-7a2 2 0 00-2-2H6a2 2 0 00-2 2v7a2 2 0 002 2z"></path>
                            </svg>
                            <div class="text-sm">
                                <p class="font-semibold text-eventify-gold">{{ now()->format('M d, Y') }}</p>
                                <p class="text-eventify-gold/80">{{ now()->format('l') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Active Invitations Card -->
                <div class="group backdrop-blur-xl bg-white/30 dark:bg-white/5 border border-white/30 dark:border-white/10 rounded-3xl shadow-xl shadow-black/5 dark:shadow-black/20 p-6 hover:shadow-2xl hover:shadow-black/10 dark:hover:shadow-black/30 transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-start justify-between">
                        <div class="space-y-2">
                            <h3 class="text-lg font-semibold text-slate-800 dark:text-white">Active Invitations</h3>
                            <p class="text-3xl font-bold text-eventify-gold">{{ rand(2, 8) }}</p>
                            <p class="text-sm text-slate-600 dark:text-slate-400">Currently live events</p>
                        </div>
                        <div class="p-3 bg-green-500/20 rounded-2xl">
                            <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-white/20 dark:border-white/10">
                        <div class="flex items-center text-sm text-green-600 dark:text-green-400">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                            <span>{{ rand(15, 45) }}% response rate</span>
                        </div>
                    </div>
                </div>

                <!-- Draft Invitations Card -->
                <div class="group backdrop-blur-xl bg-white/30 dark:bg-white/5 border border-white/30 dark:border-white/10 rounded-3xl shadow-xl shadow-black/5 dark:shadow-black/20 p-6 hover:shadow-2xl hover:shadow-black/10 dark:hover:shadow-black/30 transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-start justify-between">
                        <div class="space-y-2">
                            <h3 class="text-lg font-semibold text-slate-800 dark:text-white">Draft Invitations</h3>
                            <p class="text-3xl font-bold text-orange-600 dark:text-orange-400">{{ rand(1, 5) }}</p>
                            <p class="text-sm text-slate-600 dark:text-slate-400">Waiting to be sent</p>
                        </div>
                        <div class="p-3 bg-orange-500/20 rounded-2xl">
                            <svg class="w-6 h-6 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-white/20 dark:border-white/10">
                        <div class="flex items-center text-sm text-orange-600 dark:text-orange-400">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Ready to publish</span>
                        </div>
                    </div>
                </div>

                <!-- Past Invitations Card -->
                <div class="group backdrop-blur-xl bg-white/30 dark:bg-white/5 border border-white/30 dark:border-white/10 rounded-3xl shadow-xl shadow-black/5 dark:shadow-black/20 p-6 hover:shadow-2xl hover:shadow-black/10 dark:hover:shadow-black/30 transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-start justify-between">
                        <div class="space-y-2">
                            <h3 class="text-lg font-semibold text-slate-800 dark:text-white">Past Invitations</h3>
                            <p class="text-3xl font-bold text-slate-600 dark:text-slate-400">{{ rand(12, 28) }}</p>
                            <p class="text-sm text-slate-600 dark:text-slate-400">Completed events</p>
                        </div>
                        <div class="p-3 bg-slate-500/20 rounded-2xl">
                            <svg class="w-6 h-6 text-slate-600 dark:text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-white/20 dark:border-white/10">
                        <div class="flex items-center text-sm text-slate-600 dark:text-slate-400">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>All successful</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="backdrop-blur-xl bg-white/30 dark:bg-white/5 border border-white/30 dark:border-white/10 rounded-3xl shadow-2xl shadow-black/10 dark:shadow-black/30 p-8">
                <h2 class="text-2xl font-bold text-slate-800 dark:text-white mb-6">Quick Actions</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <!-- Create Invitation -->
                    <a href="{{ route('invitations.create.type') }}" class="group p-6 backdrop-blur-sm bg-white/20 dark:bg-white/10 hover:bg-white/30 dark:hover:bg-white/15 border border-white/40 dark:border-white/20 rounded-2xl transition-all duration-200 hover:shadow-lg transform hover:-translate-y-0.5">
                        <div class="flex flex-col items-center text-center space-y-3">
                            <div class="p-3 bg-eventify-gold/20 rounded-xl">
                                <svg class="w-6 h-6 text-eventify-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-slate-800 dark:text-white group-hover:text-eventify-gold transition-colors">Create Invitation</h3>
                                <p class="text-sm text-slate-600 dark:text-slate-400">Start a new event</p>
                            </div>
                        </div>
                    </a>

                    <!-- View Templates -->
                    <a href="#" class="group p-6 backdrop-blur-sm bg-white/20 dark:bg-white/10 hover:bg-white/30 dark:hover:bg-white/15 border border-white/40 dark:border-white/20 rounded-2xl transition-all duration-200 hover:shadow-lg transform hover:-translate-y-0.5">
                        <div class="flex flex-col items-center text-center space-y-3">
                            <div class="p-3 bg-blue-500/20 rounded-xl">
                                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-slate-800 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">Templates</h3>
                                <p class="text-sm text-slate-600 dark:text-slate-400">Browse designs</p>
                            </div>
                        </div>
                    </a>

                    <!-- Manage Guests -->
                    <a href="#" class="group p-6 backdrop-blur-sm bg-white/20 dark:bg-white/10 hover:bg-white/30 dark:hover:bg-white/15 border border-white/40 dark:border-white/20 rounded-2xl transition-all duration-200 hover:shadow-lg transform hover:-translate-y-0.5">
                        <div class="flex flex-col items-center text-center space-y-3">
                            <div class="p-3 bg-purple-500/20 rounded-xl">
                                <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-slate-800 dark:text-white group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors">Manage Guests</h3>
                                <p class="text-sm text-slate-600 dark:text-slate-400">Guest lists</p>
                            </div>
                        </div>
                    </a>

                    <!-- Analytics -->
                    <a href="#" class="group p-6 backdrop-blur-sm bg-white/20 dark:bg-white/10 hover:bg-white/30 dark:hover:bg-white/15 border border-white/40 dark:border-white/20 rounded-2xl transition-all duration-200 hover:shadow-lg transform hover:-translate-y-0.5">
                        <div class="flex flex-col items-center text-center space-y-3">
                            <div class="p-3 bg-green-500/20 rounded-xl">
                                <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-slate-800 dark:text-white group-hover:text-green-600 dark:group-hover:text-green-400 transition-colors">Analytics</h3>
                                <p class="text-sm text-slate-600 dark:text-slate-400">View insights</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="backdrop-blur-xl bg-white/30 dark:bg-white/5 border border-white/30 dark:border-white/10 rounded-3xl shadow-2xl shadow-black/10 dark:shadow-black/30 p-8">
                <h2 class="text-2xl font-bold text-slate-800 dark:text-white mb-6">Recent Activity</h2>
                <div class="space-y-4">
                    @foreach([
                        ['type' => 'invitation', 'text' => 'Wedding invitation "Sarah & John" was sent to 45 guests', 'time' => '2 hours ago', 'icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                        ['type' => 'rsvp', 'text' => '12 guests responded to "Birthday Celebration"', 'time' => '5 hours ago', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                        ['type' => 'draft', 'text' => 'Draft "Anniversary Party" was saved', 'time' => '1 day ago', 'icon' => 'M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z']
                    ] as $activity)
                        <div class="flex items-center p-4 backdrop-blur-sm bg-white/10 dark:bg-white/5 border border-white/20 dark:border-white/10 rounded-2xl">
                            <div class="flex-shrink-0 p-2 bg-eventify-gold/20 rounded-lg">
                                <svg class="w-5 h-5 text-eventify-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $activity['icon'] }}"></path>
                                </svg>
                            </div>
                            <div class="ml-4 flex-1">
                                <p class="text-sm font-medium text-slate-800 dark:text-white">{{ $activity['text'] }}</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400">{{ $activity['time'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
