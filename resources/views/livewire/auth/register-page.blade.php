<div class="space-y-6">
    <!-- Header -->
    <div class="text-center space-y-1">
        <h2 class="text-2xl font-bold text-slate-800 dark:text-white">
            Create Account
        </h2>
        <p class="text-sm text-slate-600 dark:text-slate-400">
            Join Eventify and start creating beautiful invitations
        </p>
    </div>

    <!-- Form -->
    <form wire:submit="register" class="space-y-5">
        <!-- Name Fields Row -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <!-- First Name -->
            <div class="space-y-2">
                <label for="first_name" class="block text-sm font-semibold text-slate-700 dark:text-slate-200">
                    First Name
                </label>
                <div class="relative">
                    <input 
                        wire:model.blur="first_name" 
                        id="first_name" 
                        type="text" 
                        name="first_name"
                        autocomplete="given-name"
                        required
                        class="w-full px-4 py-4 bg-white/40 dark:bg-white/5 backdrop-blur-sm border @error('first_name') border-red-400/60 @else border-white/40 dark:border-white/20 @enderror rounded-2xl text-slate-800 dark:text-white placeholder-slate-500 dark:placeholder-slate-400 focus:outline-none focus:ring-2 @error('first_name') focus:ring-red-400/50 @else focus:ring-eventify-gold/50 @enderror focus:border-transparent transition-all duration-200 shadow-sm"
                        placeholder="First name"
                    >
                    <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-transparent via-white/10 to-transparent opacity-50 pointer-events-none"></div>
                </div>
                @error('first_name')
                    <p class="text-xs text-red-500 dark:text-red-400 ml-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Last Name -->
            <div class="space-y-2">
                <label for="last_name" class="block text-sm font-semibold text-slate-700 dark:text-slate-200">
                    Last Name
                </label>
                <div class="relative">
                    <input 
                        wire:model.blur="last_name" 
                        id="last_name" 
                        type="text" 
                        name="last_name"
                        autocomplete="family-name"
                        required
                        class="w-full px-4 py-4 bg-white/40 dark:bg-white/5 backdrop-blur-sm border @error('last_name') border-red-400/60 @else border-white/40 dark:border-white/20 @enderror rounded-2xl text-slate-800 dark:text-white placeholder-slate-500 dark:placeholder-slate-400 focus:outline-none focus:ring-2 @error('last_name') focus:ring-red-400/50 @else focus:ring-eventify-gold/50 @enderror focus:border-transparent transition-all duration-200 shadow-sm"
                        placeholder="Last name"
                    >
                    <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-transparent via-white/10 to-transparent opacity-50 pointer-events-none"></div>
                </div>
                @error('last_name')
                    <p class="text-xs text-red-500 dark:text-red-400 ml-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Email Field -->
        <div class="space-y-2">
            <label for="email" class="block text-sm font-semibold text-slate-700 dark:text-slate-200">
                Email Address
            </label>
            <div class="relative">
                <input 
                    wire:model.blur="email" 
                    id="email" 
                    type="email" 
                    name="email"
                    autocomplete="email"
                    required
                    class="w-full px-4 py-4 bg-white/40 dark:bg-white/5 backdrop-blur-sm border @error('email') border-red-400/60 @else border-white/40 dark:border-white/20 @enderror rounded-2xl text-slate-800 dark:text-white placeholder-slate-500 dark:placeholder-slate-400 focus:outline-none focus:ring-2 @error('email') focus:ring-red-400/50 @else focus:ring-eventify-gold/50 @enderror focus:border-transparent transition-all duration-200 shadow-sm"
                    placeholder="Enter your email address"
                >
                <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-transparent via-white/10 to-transparent opacity-50 pointer-events-none"></div>
            </div>
            @error('email')
                <p class="text-xs text-red-500 dark:text-red-400 ml-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password Fields -->
        <div class="space-y-4">
            <!-- Password Field -->
            <div class="space-y-2">
                <label for="password" class="block text-sm font-semibold text-slate-700 dark:text-slate-200">
                    Password
                </label>
                <div class="relative">
                    <input 
                        wire:model.blur="password" 
                        id="password" 
                        type="password" 
                        name="password"
                        autocomplete="new-password"
                        required
                        class="w-full px-4 py-4 bg-white/40 dark:bg-white/5 backdrop-blur-sm border @error('password') border-red-400/60 @else border-white/40 dark:border-white/20 @enderror rounded-2xl text-slate-800 dark:text-white placeholder-slate-500 dark:placeholder-slate-400 focus:outline-none focus:ring-2 @error('password') focus:ring-red-400/50 @else focus:ring-eventify-gold/50 @enderror focus:border-transparent transition-all duration-200 shadow-sm"
                        placeholder="Choose a strong password"
                    >
                    <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-transparent via-white/10 to-transparent opacity-50 pointer-events-none"></div>
                </div>
                @error('password')
                    <p class="text-xs text-red-500 dark:text-red-400 ml-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password Field -->
            <div class="space-y-2">
                <label for="password_confirmation" class="block text-sm font-semibold text-slate-700 dark:text-slate-200">
                    Confirm Password
                </label>
                <div class="relative">
                    <input 
                        wire:model.blur="password_confirmation" 
                        id="password_confirmation" 
                        type="password" 
                        name="password_confirmation"
                        autocomplete="new-password"
                        required
                        class="w-full px-4 py-4 bg-white/40 dark:bg-white/5 backdrop-blur-sm border @error('password_confirmation') border-red-400/60 @else border-white/40 dark:border-white/20 @enderror rounded-2xl text-slate-800 dark:text-white placeholder-slate-500 dark:placeholder-slate-400 focus:outline-none focus:ring-2 @error('password_confirmation') focus:ring-red-400/50 @else focus:ring-eventify-gold/50 @enderror focus:border-transparent transition-all duration-200 shadow-sm"
                        placeholder="Confirm your password"
                    >
                    <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-transparent via-white/10 to-transparent opacity-50 pointer-events-none"></div>
                </div>
                @error('password_confirmation')
                    <p class="text-xs text-red-500 dark:text-red-400 ml-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Submit Button -->
        <button 
            type="submit" 
            wire:loading.attr="disabled"
            class="group relative w-full bg-gradient-to-r from-eventify-gold to-eventify-gold/90 hover:from-eventify-gold/90 hover:to-eventify-gold/80 disabled:from-eventify-gold/60 disabled:to-eventify-gold/50 text-white font-semibold py-4 px-6 rounded-2xl focus:outline-none focus:ring-2 focus:ring-eventify-gold/50 focus:ring-offset-2 focus:ring-offset-transparent transition-all duration-200 disabled:cursor-not-allowed shadow-lg shadow-eventify-gold/25 hover:shadow-xl hover:shadow-eventify-gold/30 transform hover:-translate-y-0.5 disabled:transform-none"
        >
            <span wire:loading.remove wire:target="register">
                Create Account
            </span>
            <span wire:loading wire:target="register">
                Creating account...
            </span>
            <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none"></div>
        </button>
    </form>

    <!-- Divider -->
    <div class="relative my-6">
        <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-white/30 dark:border-white/20"></div>
        </div>
        <div class="relative flex justify-center">
            <span class="px-4 text-xs uppercase tracking-wider text-slate-500 dark:text-slate-400 bg-white/20 dark:bg-white/5 backdrop-blur-sm rounded-full border border-white/30 dark:border-white/20">
                Already have an account?
            </span>
        </div>
    </div>

    <!-- Login Link -->
    <div class="text-center">
        <a 
            href="{{ route('login') }}"
            wire:navigate
            class="group relative inline-flex items-center px-6 py-3 bg-white/20 dark:bg-white/10 hover:bg-white/30 dark:hover:bg-white/15 backdrop-blur-sm border border-white/40 dark:border-white/20 rounded-2xl text-sm font-semibold text-slate-700 dark:text-slate-200 hover:text-eventify-gold dark:hover:text-eventify-gold transition-all duration-200 shadow-sm hover:shadow-md transform hover:-translate-y-0.5"
        >
            <svg class="mr-2 w-4 h-4 transition-transform duration-200 group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
            </svg>
            <span>Sign In Instead</span>
            <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-eventify-gold/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none"></div>
        </a>
    </div>

    <!-- Footer Links -->
    <div class="pt-6 border-t border-white/20 dark:border-white/10">
        <p class="text-xs text-slate-500 dark:text-slate-400 text-center mb-3">
            By creating an account, you agree to our
        </p>
        <div class="flex justify-center space-x-6">
            <a href="#" class="text-xs text-slate-500 dark:text-slate-400 hover:text-eventify-gold transition-colors duration-200">
                Privacy Policy
            </a>
            <span class="text-xs text-slate-400 dark:text-slate-500">•</span>
            <a href="#" class="text-xs text-slate-500 dark:text-slate-400 hover:text-eventify-gold transition-colors duration-200">
                Terms of Service
            </a>
        </div>
    </div>
</div>