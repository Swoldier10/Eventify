<x-app-layout>
    <div class="py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto space-y-8">
            <!-- Page Header -->
            <div class="backdrop-blur-xl bg-white/30 dark:bg-white/5 border border-white/30 dark:border-white/10 rounded-3xl shadow-2xl shadow-black/10 dark:shadow-black/30 p-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-slate-800 dark:text-white">Create New Invitation</h1>
                        <p class="text-slate-600 dark:text-slate-400 mt-1">Choose the type of invitation you'd like to create</p>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-slate-500 dark:text-slate-400">
                        <div class="flex items-center">
                            <div class="w-6 h-6 bg-eventify-gold rounded-full flex items-center justify-center text-white text-xs font-semibold mr-2">1</div>
                            <span>Type</span>
                        </div>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <div class="flex items-center opacity-50">
                            <div class="w-6 h-6 bg-slate-300 dark:bg-slate-600 rounded-full flex items-center justify-center text-white text-xs font-semibold mr-2">2</div>
                            <span>Template</span>
                        </div>
                        <svg class="w-4 h-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <div class="flex items-center opacity-50">
                            <div class="w-6 h-6 bg-slate-300 dark:bg-slate-600 rounded-full flex items-center justify-center text-white text-xs font-semibold mr-2">3</div>
                            <span>Details</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Invitation Type Selection -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Wedding Card -->
                <a href="{{ route('invitations.create.template', ['type' => 'wedding']) }}" class="group h-full">
                    <div class="backdrop-blur-xl bg-white/30 dark:bg-white/5 border border-white/30 dark:border-white/10 rounded-3xl shadow-xl shadow-black/5 dark:shadow-black/20 hover:shadow-2xl hover:shadow-black/10 dark:hover:shadow-black/30 transition-all duration-500 hover:-translate-y-2 hover:bg-white/40 dark:hover:bg-white/10 h-full flex flex-col">
                        <!-- Header with Icon and Title -->
                        <div class="p-8 pb-6 text-center">
                            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-rose-500/20 to-pink-500/20 rounded-3xl group-hover:from-rose-500/30 group-hover:to-pink-500/30 transition-all duration-300 mb-6">
                                <svg class="w-10 h-10 text-rose-600 dark:text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-slate-800 dark:text-white group-hover:text-rose-600 dark:group-hover:text-rose-400 transition-colors duration-300 mb-3">
                                Wedding
                            </h3>
                            <p class="text-slate-600 dark:text-slate-400 leading-relaxed text-sm">
                                Create beautiful wedding invitations to celebrate your special day with elegant designs and romantic touches.
                            </p>
                        </div>

                        <!-- Features -->
                        <div class="px-8 pb-6 flex-grow">
                            <div class="space-y-3">
                                <div class="flex items-center text-sm text-slate-600 dark:text-slate-400">
                                    <div class="w-2 h-2 bg-rose-500 rounded-full mr-3 flex-shrink-0"></div>
                                    <span>Bride & Groom details</span>
                                </div>
                                <div class="flex items-center text-sm text-slate-600 dark:text-slate-400">
                                    <div class="w-2 h-2 bg-rose-500 rounded-full mr-3 flex-shrink-0"></div>
                                    <span>Civil & Religious ceremonies</span>
                                </div>
                                <div class="flex items-center text-sm text-slate-600 dark:text-slate-400">
                                    <div class="w-2 h-2 bg-rose-500 rounded-full mr-3 flex-shrink-0"></div>
                                    <span>Reception party details</span>
                                </div>
                                <div class="flex items-center text-sm text-slate-600 dark:text-slate-400">
                                    <div class="w-2 h-2 bg-rose-500 rounded-full mr-3 flex-shrink-0"></div>
                                    <span>Photo galleries & RSVP</span>
                                </div>
                            </div>
                        </div>

                        <!-- Action Button -->
                        <div class="p-8 pt-6 border-t border-white/20 dark:border-white/10">
                            <div class="w-full bg-gradient-to-r from-rose-500 to-pink-500 hover:from-rose-600 hover:to-pink-600 text-white rounded-2xl px-6 py-3 text-center font-semibold transition-all duration-300 transform group-hover:scale-105 group-hover:shadow-lg">
                                Choose Wedding
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Baptism Card -->
                <a href="{{ route('invitations.create.template', ['type' => 'baptism']) }}" class="group h-full">
                    <div class="backdrop-blur-xl bg-white/30 dark:bg-white/5 border border-white/30 dark:border-white/10 rounded-3xl shadow-xl shadow-black/5 dark:shadow-black/20 hover:shadow-2xl hover:shadow-black/10 dark:hover:shadow-black/30 transition-all duration-500 hover:-translate-y-2 hover:bg-white/40 dark:hover:bg-white/10 h-full flex flex-col">
                        <!-- Header with Icon and Title -->
                        <div class="p-8 pb-6 text-center">
                            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-blue-500/20 to-cyan-500/20 rounded-3xl group-hover:from-blue-500/30 group-hover:to-cyan-500/30 transition-all duration-300 mb-6">
                                <svg class="w-10 h-10 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-slate-800 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-300 mb-3">
                                Baptism
                            </h3>
                            <p class="text-slate-600 dark:text-slate-400 leading-relaxed text-sm">
                                Design spiritual and heartwarming baptism invitations for this blessed occasion with sacred elements.
                            </p>
                        </div>

                        <!-- Features -->
                        <div class="px-8 pb-6 flex-grow">
                            <div class="space-y-3">
                                <div class="flex items-center text-sm text-slate-600 dark:text-slate-400">
                                    <div class="w-2 h-2 bg-blue-500 rounded-full mr-3 flex-shrink-0"></div>
                                    <span>Child & Family details</span>
                                </div>
                                <div class="flex items-center text-sm text-slate-600 dark:text-slate-400">
                                    <div class="w-2 h-2 bg-blue-500 rounded-full mr-3 flex-shrink-0"></div>
                                    <span>Godparents information</span>
                                </div>
                                <div class="flex items-center text-sm text-slate-600 dark:text-slate-400">
                                    <div class="w-2 h-2 bg-blue-500 rounded-full mr-3 flex-shrink-0"></div>
                                    <span>Ceremony & Celebration</span>
                                </div>
                                <div class="flex items-center text-sm text-slate-600 dark:text-slate-400">
                                    <div class="w-2 h-2 bg-blue-500 rounded-full mr-3 flex-shrink-0"></div>
                                    <span>Sacred themes & blessings</span>
                                </div>
                            </div>
                        </div>

                        <!-- Action Button -->
                        <div class="p-8 pt-6 border-t border-white/20 dark:border-white/10">
                            <div class="w-full bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white rounded-2xl px-6 py-3 text-center font-semibold transition-all duration-300 transform group-hover:scale-105 group-hover:shadow-lg">
                                Choose Baptism
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Event Card -->
                <a href="{{ route('invitations.create.template', ['type' => 'event']) }}" class="group h-full">
                    <div class="backdrop-blur-xl bg-white/30 dark:bg-white/5 border border-white/30 dark:border-white/10 rounded-3xl shadow-xl shadow-black/5 dark:shadow-black/20 hover:shadow-2xl hover:shadow-black/10 dark:hover:shadow-black/30 transition-all duration-500 hover:-translate-y-2 hover:bg-white/40 dark:hover:bg-white/10 h-full flex flex-col">
                        <!-- Header with Icon and Title -->
                        <div class="p-8 pb-6 text-center">
                            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-purple-500/20 to-indigo-500/20 rounded-3xl group-hover:from-purple-500/30 group-hover:to-indigo-500/30 transition-all duration-300 mb-6">
                                <svg class="w-10 h-10 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3a4 4 0 118 0v4m-4 12v-6m-6 6h16a2 2 0 002-2v-7a2 2 0 00-2-2H6a2 2 0 00-2 2v7a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-slate-800 dark:text-white group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors duration-300 mb-3">
                                Event
                            </h3>
                            <p class="text-slate-600 dark:text-slate-400 leading-relaxed text-sm">
                                Create versatile invitations for any special occasion, from birthdays to corporate events and celebrations.
                            </p>
                        </div>

                        <!-- Features -->
                        <div class="px-8 pb-6 flex-grow">
                            <div class="space-y-3">
                                <div class="flex items-center text-sm text-slate-600 dark:text-slate-400">
                                    <div class="w-2 h-2 bg-purple-500 rounded-full mr-3 flex-shrink-0"></div>
                                    <span>Flexible event details</span>
                                </div>
                                <div class="flex items-center text-sm text-slate-600 dark:text-slate-400">
                                    <div class="w-2 h-2 bg-purple-500 rounded-full mr-3 flex-shrink-0"></div>
                                    <span>Custom themes & colors</span>
                                </div>
                                <div class="flex items-center text-sm text-slate-600 dark:text-slate-400">
                                    <div class="w-2 h-2 bg-purple-500 rounded-full mr-3 flex-shrink-0"></div>
                                    <span>RSVP & guest management</span>
                                </div>
                                <div class="flex items-center text-sm text-slate-600 dark:text-slate-400">
                                    <div class="w-2 h-2 bg-purple-500 rounded-full mr-3 flex-shrink-0"></div>
                                    <span>Birthday, corporate & more</span>
                                </div>
                            </div>
                        </div>

                        <!-- Action Button -->
                        <div class="p-8 pt-6 border-t border-white/20 dark:border-white/10">
                            <div class="w-full bg-gradient-to-r from-purple-500 to-indigo-500 hover:from-purple-600 hover:to-indigo-600 text-white rounded-2xl px-6 py-3 text-center font-semibold transition-all duration-300 transform group-hover:scale-105 group-hover:shadow-lg">
                                Choose Event
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Back to Dashboard -->
            <div class="flex justify-center">
                <a 
                    href="{{ route('dashboard') }}" 
                    class="inline-flex items-center px-6 py-3 backdrop-blur-sm bg-white/20 dark:bg-white/10 hover:bg-white/30 dark:hover:bg-white/15 border border-white/30 dark:border-white/20 hover:border-white/50 dark:hover:border-white/30 rounded-2xl text-slate-700 dark:text-slate-300 font-medium transition-all duration-200 transform hover:-translate-y-0.5"
                >
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Dashboard
                </a>
            </div>
        </div>
    </div>
</x-app-layout>