<nav class="backdrop-blur-xl bg-white/30 dark:bg-white/5 border-b border-white/30 dark:border-white/10 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Left side - Company name and navigation -->
            <div class="flex items-center space-x-8">
                <!-- Logo/Company name -->
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-eventify-gold rounded-lg flex items-center justify-center">
                        <div class="w-4 h-4 bg-white rounded-sm"></div>
                    </div>
                    <h1 class="text-xl font-bold text-slate-800 dark:text-white">Eventify</h1>
                </div>
                
                <!-- Navigation Items -->
                <div class="hidden md:flex items-center space-x-1">
                    <a 
                        href="{{ route('dashboard') }}" 
                        class="px-4 py-2 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-eventify-gold/20 text-eventify-gold' : 'text-slate-600 dark:text-slate-300 hover:text-eventify-gold hover:bg-white/20 dark:hover:bg-white/10' }}"
                    >
                        Dashboard
                    </a>
                    <a 
                        href="{{ route('invitations.index', []) }}" 
                        class="px-4 py-2 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('invitations.*') ? 'bg-eventify-gold/20 text-eventify-gold' : 'text-slate-600 dark:text-slate-300 hover:text-eventify-gold hover:bg-white/20 dark:hover:bg-white/10' }}"
                    >
                        Invitations
                    </a>
                </div>
            </div>

            <!-- Right side - Avatar dropdown -->
            <div class="flex items-center">
                <!-- Profile dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button 
                        @click="open = !open"
                        @click.outside="open = false"
                        class="flex items-center space-x-3 p-2 rounded-2xl hover:bg-white/20 dark:hover:bg-white/10 transition-all duration-200 group"
                    >
                        <!-- Avatar -->
                        <div class="w-8 h-8 bg-gradient-to-br from-eventify-gold to-eventify-gold/80 rounded-full flex items-center justify-center text-white text-sm font-semibold">
                            {{ strtoupper(substr(auth()->user()->first_name ?? auth()->user()->name, 0, 1)) }}{{ strtoupper(substr(auth()->user()->last_name ?? '', 0, 1)) }}
                        </div>
                        
                        <!-- User name (hidden on mobile) -->
                        <div class="hidden md:block">
                            <p class="text-sm font-medium text-slate-700 dark:text-slate-200">
                                {{ auth()->user()->first_name ?? explode(' ', auth()->user()->name)[0] }}
                            </p>
                        </div>
                        
                        <!-- Chevron -->
                        <svg class="w-4 h-4 text-slate-500 dark:text-slate-400 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div 
                        x-show="open"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95"
                        class="absolute right-0 mt-2 w-56 backdrop-blur-xl bg-white/80 dark:bg-slate-800/80 border border-white/30 dark:border-white/20 rounded-2xl shadow-2xl py-2 z-50"
                        style="display: none;"
                    >
                        <!-- User info -->
                        <div class="px-4 py-3 border-b border-white/20 dark:border-white/10">
                            <p class="text-sm font-semibold text-slate-800 dark:text-white">
                                {{ auth()->user()->first_name ?? auth()->user()->name }} {{ auth()->user()->last_name ?? '' }}
                            </p>
                            <p class="text-xs text-slate-500 dark:text-slate-400 truncate">
                                {{ auth()->user()->email }}
                            </p>
                        </div>
                        
                        <!-- Menu items -->
                        <div class="py-1">
                            <a 
                                href="{{ route('profile.edit') }}" 
                                class="flex items-center px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-eventify-gold/10 hover:text-eventify-gold transition-colors duration-200"
                            >
                                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Profile
                            </a>
                            <a 
                                href="{{ route('settings') }}" 
                                class="flex items-center px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-eventify-gold/10 hover:text-eventify-gold transition-colors duration-200"
                            >
                                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Settings
                            </a>
                        </div>
                        
                        <!-- Logout -->
                        <div class="border-t border-white/20 dark:border-white/10 py-1">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button 
                                    type="submit"
                                    class="flex items-center w-full px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors duration-200"
                                >
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H3m4 5v-3a4 4 0 00-4-4H1"></path>
                                    </svg>
                                    Sign Out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile navigation menu -->
    <div class="md:hidden border-t border-white/20 dark:border-white/10" x-data="{ mobileOpen: false }">
        <div class="px-4 py-3 space-y-1">
            <a 
                href="{{ route('dashboard') }}" 
                class="block px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200 {{ request()->routeIs('dashboard') ? 'bg-eventify-gold/20 text-eventify-gold' : 'text-slate-600 dark:text-slate-300' }}"
            >
                Dashboard
            </a>
            <a 
                href="{{ route('invitations.index', []) }}" 
                class="block px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200 {{ request()->routeIs('invitations.*') ? 'bg-eventify-gold/20 text-eventify-gold' : 'text-slate-600 dark:text-slate-300' }}"
            >
                Invitations
            </a>
        </div>
    </div>
</nav>