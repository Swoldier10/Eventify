<x-app-layout>
    <div class="py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto space-y-8">
            <!-- Page Header -->
            <div class="backdrop-blur-xl bg-white/30 dark:bg-white/5 border border-white/30 dark:border-white/10 rounded-3xl shadow-2xl shadow-black/10 dark:shadow-black/30 p-8">
                <div class="flex flex-col lg:flex-row lg:items-center justify-between space-y-4 lg:space-y-0">
                    <div>
                        <h1 class="text-3xl font-bold text-slate-800 dark:text-white">Choose a Template</h1>
                        <p class="text-slate-600 dark:text-slate-400 mt-1">
                            Select a beautiful template for your 
                            <span class="capitalize font-semibold text-eventify-gold">{{ request('type', 'wedding') }}</span> 
                            invitation
                        </p>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-slate-500 dark:text-slate-400">
                        <div class="flex items-center opacity-50">
                            <div class="w-6 h-6 bg-eventify-gold/50 rounded-full flex items-center justify-center text-white text-xs font-semibold mr-2">✓</div>
                            <span>Type</span>
                        </div>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <div class="flex items-center">
                            <div class="w-6 h-6 bg-eventify-gold rounded-full flex items-center justify-center text-white text-xs font-semibold mr-2">2</div>
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

            <!-- Templates Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach([
                    ['id' => 'classic-elegant', 'name' => 'Classic Elegant', 'description' => 'Timeless design with sophisticated typography', 'color' => 'rose'],
                    ['id' => 'modern-minimal', 'name' => 'Modern Minimal', 'description' => 'Clean and contemporary with subtle accents', 'color' => 'blue'],
                    ['id' => 'romantic-floral', 'name' => 'Romantic Floral', 'description' => 'Beautiful botanical elements and soft colors', 'color' => 'pink'],
                    ['id' => 'vintage-classic', 'name' => 'Vintage Classic', 'description' => 'Nostalgic charm with ornate details', 'color' => 'amber'],
                    ['id' => 'luxury-gold', 'name' => 'Luxury Gold', 'description' => 'Premium design with golden accents', 'color' => 'yellow'],
                    ['id' => 'rustic-charm', 'name' => 'Rustic Charm', 'description' => 'Natural elements with warm tones', 'color' => 'green']
                ] as $template)
                    <div class="group backdrop-blur-xl bg-white/30 dark:bg-white/5 border border-white/30 dark:border-white/10 rounded-3xl shadow-xl shadow-black/5 dark:shadow-black/20 hover:shadow-2xl hover:shadow-black/10 dark:hover:shadow-black/30 transition-all duration-500 hover:-translate-y-2 overflow-hidden">
                        <!-- Template Preview -->
                        <div class="relative h-64 bg-gradient-to-br from-{{ $template['color'] }}-50 to-{{ $template['color'] }}-100 dark:from-{{ $template['color'] }}-900/20 dark:to-{{ $template['color'] }}-800/20">
                            <!-- Mock invitation preview -->
                            <div class="absolute inset-4 bg-white/90 dark:bg-slate-800/90 backdrop-blur-sm rounded-2xl border border-{{ $template['color'] }}-200/50 dark:border-{{ $template['color'] }}-700/50 flex items-center justify-center">
                                <div class="text-center space-y-2 p-4">
                                    <div class="w-12 h-12 mx-auto bg-{{ $template['color'] }}-500/20 rounded-full flex items-center justify-center mb-3">
                                        <svg class="w-6 h-6 text-{{ $template['color'] }}-600 dark:text-{{ $template['color'] }}-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            @if($template['color'] === 'rose')
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                            @elseif($template['color'] === 'blue')
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                            @elseif($template['color'] === 'pink')
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM7 3H5v14a2 2 0 002 2h2"></path>
                                            @elseif($template['color'] === 'amber')
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                            @elseif($template['color'] === 'yellow')
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                                            @else
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                                            @endif
                                        </svg>
                                    </div>
                                    <h4 class="font-semibold text-{{ $template['color'] }}-800 dark:text-{{ $template['color'] }}-200 text-sm">Sample Text</h4>
                                    <div class="h-px bg-{{ $template['color'] }}-300 dark:bg-{{ $template['color'] }}-600"></div>
                                    <p class="text-xs text-{{ $template['color'] }}-600 dark:text-{{ $template['color'] }}-300">Template Preview</p>
                                </div>
                            </div>
                            
                            <!-- Preview Badge -->
                            <div class="absolute top-4 right-4">
                                <span class="inline-flex items-center px-2 py-1 bg-{{ $template['color'] }}-500/20 backdrop-blur-sm border border-{{ $template['color'] }}-300/50 rounded-lg text-xs font-medium text-{{ $template['color'] }}-700 dark:text-{{ $template['color'] }}-300">
                                    Preview
                                </span>
                            </div>
                        </div>

                        <!-- Template Info -->
                        <div class="p-6 space-y-4">
                            <div class="space-y-2">
                                <h3 class="text-xl font-bold text-slate-800 dark:text-white group-hover:text-{{ $template['color'] }}-600 dark:group-hover:text-{{ $template['color'] }}-400 transition-colors duration-300">
                                    {{ $template['name'] }}
                                </h3>
                                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                                    {{ $template['description'] }}
                                </p>
                            </div>

                            <!-- Template Features -->
                            <div class="flex items-center space-x-4 text-xs text-slate-500 dark:text-slate-400">
                                <div class="flex items-center">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span>Images</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM7 3H5v14a2 2 0 002 2h2"></path>
                                    </svg>
                                    <span>Responsive</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                                    </svg>
                                    <span>Animated</span>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex space-x-3 pt-2">
                                <a 
                                    href="{{ route('invitations.create.form', ['type' => request('type', 'wedding'), 'template' => $template['id']]) }}"
                                    class="flex-1 inline-flex items-center justify-center px-4 py-2.5 bg-{{ $template['color'] }}-500 hover:bg-{{ $template['color'] }}-600 text-white rounded-2xl font-medium transition-all duration-200 transform hover:-translate-y-0.5 shadow-lg hover:shadow-xl"
                                >
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Choose
                                </a>
                                <button 
                                    disabled
                                    class="px-4 py-2.5 backdrop-blur-sm bg-slate-200/50 dark:bg-slate-700/50 border border-slate-300/50 dark:border-slate-600/50 rounded-2xl text-slate-500 dark:text-slate-400 font-medium cursor-not-allowed transition-all duration-200"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Navigation -->
            <div class="flex justify-between items-center">
                <a 
                    href="{{ route('invitations.create.type') }}" 
                    class="inline-flex items-center px-6 py-3 backdrop-blur-sm bg-white/20 dark:bg-white/10 hover:bg-white/30 dark:hover:bg-white/15 border border-white/30 dark:border-white/20 hover:border-white/50 dark:hover:border-white/30 rounded-2xl text-slate-700 dark:text-slate-300 font-medium transition-all duration-200 transform hover:-translate-y-0.5"
                >
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Type Selection
                </a>

                <a 
                    href="{{ route('dashboard') }}" 
                    class="inline-flex items-center px-6 py-3 backdrop-blur-sm bg-slate-500/20 hover:bg-slate-500/30 border border-slate-500/30 hover:border-slate-500/50 rounded-2xl text-slate-600 dark:text-slate-300 font-medium transition-all duration-200 transform hover:-translate-y-0.5"
                >
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Cancel & Return to Dashboard
                </a>
            </div>
        </div>
    </div>
</x-app-layout>