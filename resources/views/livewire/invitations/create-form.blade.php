<div class="min-h-screen py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Create New Invitation</h1>
            <p class="text-gray-600 dark:text-gray-400">Design your perfect invitation in just a few steps</p>
        </div>

        <!-- Progress Indicator -->
        <div class="mb-8">
            <div class="backdrop-blur-xl bg-white/10 dark:bg-white/5 rounded-2xl border border-glass dark:border-glass-dark p-6">
                <div class="flex items-center justify-between mb-4">
                    @for ($i = 1; $i <= $totalSteps; $i++)
                        <div class="flex items-center {{ $i < $totalSteps ? 'flex-1' : '' }}">
                            <div class="flex items-center justify-center w-10 h-10 rounded-full border-2 
                                {{ $currentStep >= $i ? 'bg-eventify-gold border-eventify-gold text-white' : 'border-gray-300 dark:border-gray-600 text-gray-400' }} 
                                transition-all duration-300">
                                @if($currentStep > $i)
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                @else
                                    {{ $i }}
                                @endif
                            </div>
                            @if($i < $totalSteps)
                                <div class="flex-1 h-1 mx-4 
                                    {{ $currentStep > $i ? 'bg-eventify-gold' : 'bg-gray-200 dark:bg-gray-700' }} 
                                    transition-all duration-300"></div>
                            @endif
                        </div>
                    @endfor
                </div>
                
                <!-- Step Labels -->
                <div class="flex justify-between text-xs text-gray-600 dark:text-gray-400 mt-2">
                    <span>Basic Info</span>
                    <span>Type Details</span>
                    <span>Images</span>
                    <span>Events</span>
                    <span>Sections</span>
                    <span>Review</span>
                </div>
            </div>
        </div>

        <!-- Form Container -->
        <div class="backdrop-blur-xl bg-white/10 dark:bg-white/5 rounded-2xl border border-glass dark:border-glass-dark">
            <form wire:submit="save" class="p-6 space-y-6">
                
                <!-- Step 1: Basic Information -->
                @if($currentStep === 1)
                    <div class="space-y-6">
                        <div class="text-center mb-6">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-2">Basic Information</h2>
                            <p class="text-gray-600 dark:text-gray-400">Let's start with the basics of your invitation</p>
                        </div>

                        <!-- Invitation Type -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Invitation Type</label>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                @foreach($this->getTypeOptions() as $value => $label)
                                    <label class="relative cursor-pointer">
                                        <input type="radio" wire:model.live="type" value="{{ $value }}" class="sr-only">
                                        <div class="p-4 rounded-xl border-2 transition-all duration-300 text-center
                                            {{ $type === $value ? 'border-eventify-gold bg-eventify-gold/10' : 'border-gray-200 dark:border-gray-600 hover:border-eventify-gold/50' }}">
                                            <div class="text-lg font-semibold text-gray-900 dark:text-white mb-1">{{ $label }}</div>
                                            <div class="text-sm text-gray-600 dark:text-gray-400">
                                                @if($value === 'wedding') Perfect for your special day
                                                @elseif($value === 'baptism') Celebrate this sacred moment
                                                @else For any special occasion
                                                @endif
                                            </div>
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                            @error('type') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        <!-- Title -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Invitation Title</label>
                            <input type="text" wire:model="title" 
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                       text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                                       focus:ring-2 focus:ring-eventify-gold focus:border-transparent transition-all duration-300"
                                placeholder="Enter your invitation title">
                            @error('title') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        <!-- Language -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Language</label>
                            <select wire:model="language" 
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                       text-gray-900 dark:text-white focus:ring-2 focus:ring-eventify-gold focus:border-transparent transition-all duration-300">
                                @foreach($this->getLanguageOptions() as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('language') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        <!-- Confirmation Email -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Confirmation Email (Optional)</label>
                            <input type="email" wire:model="confirmation_email" 
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                       text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                                       focus:ring-2 focus:ring-eventify-gold focus:border-transparent transition-all duration-300"
                                placeholder="email@example.com">
                            @error('confirmation_email') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>
                    </div>
                @endif

                <!-- Step 2: Type-specific Details -->
                @if($currentStep === 2)
                    <div class="space-y-6">
                        <div class="text-center mb-6">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-2">
                                {{ ucfirst($type) }} Details
                            </h2>
                            <p class="text-gray-600 dark:text-gray-400">Add specific information for your {{ $type }}</p>
                        </div>

                        @if($type === 'wedding')
                            <!-- Bride Information -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Bride Information</h3>
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">First Name</label>
                                            <input type="text" wire:model="bride_first_name" 
                                                class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                                       text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                                                       focus:ring-2 focus:ring-eventify-gold focus:border-transparent transition-all duration-300">
                                            @error('bride_first_name') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Last Name</label>
                                            <input type="text" wire:model="bride_last_name" 
                                                class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                                       text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                                                       focus:ring-2 focus:ring-eventify-gold focus:border-transparent transition-all duration-300">
                                            @error('bride_last_name') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Groom Information</h3>
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">First Name</label>
                                            <input type="text" wire:model="groom_first_name" 
                                                class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                                       text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                                                       focus:ring-2 focus:ring-eventify-gold focus:border-transparent transition-all duration-300">
                                            @error('groom_first_name') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Last Name</label>
                                            <input type="text" wire:model="groom_last_name" 
                                                class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                                       text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                                                       focus:ring-2 focus:ring-eventify-gold focus:border-transparent transition-all duration-300">
                                            @error('groom_last_name') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif($type === 'baptism')
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Child's Name</label>
                                <input type="text" wire:model="child_name" 
                                    class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                           text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                                           focus:ring-2 focus:ring-eventify-gold focus:border-transparent transition-all duration-300">
                                @error('child_name') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                            </div>

                            <!-- Godparents -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Godparents</label>
                                <textarea wire:model="godparents" rows="4"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                           text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                                           focus:ring-2 focus:ring-eventify-gold focus:border-transparent transition-all duration-300"
                                    placeholder="Enter godparents' names..."></textarea>
                                @error('godparents') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                            </div>
                        @endif
                    </div>
                @endif

                <!-- Step 3: Images and Descriptions -->
                @if($currentStep === 3)
                    <div class="space-y-6">
                        <div class="text-center mb-6">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-2">Images & Descriptions</h2>
                            <p class="text-gray-600 dark:text-gray-400">Add photos and descriptions to personalize your invitation</p>
                        </div>

                        <!-- Image Display Type -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Image Display Type</label>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <label class="relative cursor-pointer">
                                    <input type="radio" wire:model.live="image_display_type" value="individual" class="sr-only">
                                    <div class="p-4 rounded-xl border-2 transition-all duration-300 text-center
                                        {{ $image_display_type === 'individual' ? 'border-eventify-gold bg-eventify-gold/10' : 'border-gray-200 dark:border-gray-600 hover:border-eventify-gold/50' }}">
                                        <div class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Individual</div>
                                        <div class="text-sm text-gray-600 dark:text-gray-400">Separate photos</div>
                                    </div>
                                </label>
                                <label class="relative cursor-pointer">
                                    <input type="radio" wire:model.live="image_display_type" value="together" class="sr-only">
                                    <div class="p-4 rounded-xl border-2 transition-all duration-300 text-center
                                        {{ $image_display_type === 'together' ? 'border-eventify-gold bg-eventify-gold/10' : 'border-gray-200 dark:border-gray-600 hover:border-eventify-gold/50' }}">
                                        <div class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Together</div>
                                        <div class="text-sm text-gray-600 dark:text-gray-400">One couple photo</div>
                                    </div>
                                </label>
                                <label class="relative cursor-pointer">
                                    <input type="radio" wire:model.live="image_display_type" value="none" class="sr-only">
                                    <div class="p-4 rounded-xl border-2 transition-all duration-300 text-center
                                        {{ $image_display_type === 'none' ? 'border-eventify-gold bg-eventify-gold/10' : 'border-gray-200 dark:border-gray-600 hover:border-eventify-gold/50' }}">
                                        <div class="text-lg font-semibold text-gray-900 dark:text-white mb-1">None</div>
                                        <div class="text-sm text-gray-600 dark:text-gray-400">No photos</div>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Individual Images -->
                        @if($image_display_type === 'individual')
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Bride/First Person -->
                                <div class="space-y-4">
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                                        {{ $type === 'wedding' ? 'Bride' : 'First Person' }}
                                    </h3>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Photo</label>
                                        <input type="file" wire:model="bride_image" accept="image/*"
                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                                   text-gray-900 dark:text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 
                                                   file:bg-eventify-gold file:text-white file:cursor-pointer hover:file:bg-eventify-gold/80">
                                        @error('bride_image') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                                        <textarea wire:model="bride_description" rows="3"
                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                                   text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                                                   focus:ring-2 focus:ring-eventify-gold focus:border-transparent transition-all duration-300"
                                            placeholder="Write a beautiful description..."></textarea>
                                    </div>
                                </div>

                                <!-- Groom/Second Person -->
                                <div class="space-y-4">
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                                        {{ $type === 'wedding' ? 'Groom' : 'Second Person' }}
                                    </h3>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Photo</label>
                                        <input type="file" wire:model="groom_image" accept="image/*"
                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                                   text-gray-900 dark:text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 
                                                   file:bg-eventify-gold file:text-white file:cursor-pointer hover:file:bg-eventify-gold/80">
                                        @error('groom_image') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                                        <textarea wire:model="groom_description" rows="3"
                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                                   text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                                                   focus:ring-2 focus:ring-eventify-gold focus:border-transparent transition-all duration-300"
                                            placeholder="Write a beautiful description..."></textarea>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Together Image -->
                        @if($image_display_type === 'together')
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Couple Photo</label>
                                    <input type="file" wire:model="couple_image" accept="image/*"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                               text-gray-900 dark:text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 
                                               file:bg-eventify-gold file:text-white file:cursor-pointer hover:file:bg-eventify-gold/80">
                                    @error('couple_image') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                                    <textarea wire:model="couple_description" rows="4"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                               text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                                               focus:ring-2 focus:ring-eventify-gold focus:border-transparent transition-all duration-300"
                                        placeholder="Write a beautiful description about your relationship..."></textarea>
                                </div>
                            </div>
                        @endif
                    </div>
                @endif

                <!-- Step 4: Event Details -->
                @if($currentStep === 4)
                    <div class="space-y-6">
                        <div class="text-center mb-6">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-2">Event Details</h2>
                            <p class="text-gray-600 dark:text-gray-400">Add dates, times, and locations for your events</p>
                        </div>

                        @if($type === 'wedding')
                            <!-- Civil Wedding -->
                            <div class="p-6 rounded-xl border border-gray-200 dark:border-gray-600 space-y-4">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Civil Wedding</h3>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Address</label>
                                        <input type="text" wire:model="civil_address" 
                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                                   text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                                                   focus:ring-2 focus:ring-eventify-gold focus:border-transparent transition-all duration-300">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Date</label>
                                        <input type="date" wire:model="civil_date" 
                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                                   text-gray-900 dark:text-white focus:ring-2 focus:ring-eventify-gold focus:border-transparent transition-all duration-300">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Time</label>
                                        <input type="time" wire:model="civil_time" 
                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                                   text-gray-900 dark:text-white focus:ring-2 focus:ring-eventify-gold focus:border-transparent transition-all duration-300">
                                    </div>
                                </div>
                            </div>

                            <!-- Religious Wedding -->
                            <div class="p-6 rounded-xl border border-gray-200 dark:border-gray-600 space-y-4">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Religious Wedding</h3>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Address</label>
                                        <input type="text" wire:model="religious_address" 
                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                                   text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                                                   focus:ring-2 focus:ring-eventify-gold focus:border-transparent transition-all duration-300">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Date</label>
                                        <input type="date" wire:model="religious_date" 
                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                                   text-gray-900 dark:text-white focus:ring-2 focus:ring-eventify-gold focus:border-transparent transition-all duration-300">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Time</label>
                                        <input type="time" wire:model="religious_time" 
                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                                   text-gray-900 dark:text-white focus:ring-2 focus:ring-eventify-gold focus:border-transparent transition-all duration-300">
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Party/Reception -->
                        <div class="p-6 rounded-xl border border-gray-200 dark:border-gray-600 space-y-4">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                                {{ $type === 'wedding' ? 'Reception' : ($type === 'baptism' ? 'Celebration' : 'Event') }}
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Address</label>
                                    <input type="text" wire:model="party_address" 
                                        class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                               text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                                               focus:ring-2 focus:ring-eventify-gold focus:border-transparent transition-all duration-300">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Date</label>
                                    <input type="date" wire:model="party_date" 
                                        class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                               text-gray-900 dark:text-white focus:ring-2 focus:ring-eventify-gold focus:border-transparent transition-all duration-300">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Time</label>
                                    <input type="time" wire:model="party_time" 
                                        class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                               text-gray-900 dark:text-white focus:ring-2 focus:ring-eventify-gold focus:border-transparent transition-all duration-300">
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Step 5: Section Configuration -->
                @if($currentStep === 5)
                    <div class="space-y-8">
                        <div class="text-center mb-6">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-2">Section Configuration</h2>
                            <p class="text-gray-600 dark:text-gray-400">Customize the sections of your invitation</p>
                        </div>

                        <!-- First Page Section -->
                        <div class="p-6 rounded-xl border border-gray-200 dark:border-gray-600 space-y-4">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white">First Page</h3>
                            <div class="grid grid-cols-1 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Background Image</label>
                                    <input type="file" wire:model="first_page_bg_image" accept="image/*"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                               text-gray-900 dark:text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 
                                               file:bg-eventify-gold file:text-white file:cursor-pointer hover:file:bg-eventify-gold/80">
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title</label>
                                        <input type="text" wire:model="first_page_title" 
                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                                   text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                                                   focus:ring-2 focus:ring-eventify-gold focus:border-transparent transition-all duration-300">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Subtitle</label>
                                        <input type="text" wire:model="first_page_subtitle" 
                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                                   text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                                                   focus:ring-2 focus:ring-eventify-gold focus:border-transparent transition-all duration-300">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Couple Section -->
                        <div class="p-6 rounded-xl border border-gray-200 dark:border-gray-600 space-y-4">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Couple Section</h3>
                                <label class="flex items-center">
                                    <input type="checkbox" wire:model="couple_section_visibility" 
                                        class="rounded border-gray-300 text-eventify-gold shadow-sm focus:ring-eventify-gold">
                                    <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Visible</span>
                                </label>
                            </div>

                            @if($couple_section_visibility)
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Background Image</label>
                                        <input type="file" wire:model="couple_section_bg_image" accept="image/*"
                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                                   text-gray-900 dark:text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 
                                                   file:bg-eventify-gold file:text-white file:cursor-pointer hover:file:bg-eventify-gold/80">
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title</label>
                                            <input type="text" wire:model="couple_section_title" 
                                                class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                                       text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                                                       focus:ring-2 focus:ring-eventify-gold focus:border-transparent transition-all duration-300">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Subtitle</label>
                                            <input type="text" wire:model="couple_section_subtitle" 
                                                class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                                       text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                                                       focus:ring-2 focus:ring-eventify-gold focus:border-transparent transition-all duration-300">
                                        </div>
                                    </div>
                                    @if($type === 'wedding')
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Bride Text</label>
                                                <textarea wire:model="couple_section_text_bride" rows="3"
                                                    class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                                           text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                                                           focus:ring-2 focus:ring-eventify-gold focus:border-transparent transition-all duration-300"></textarea>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Groom Text</label>
                                                <textarea wire:model="couple_section_text_groom" rows="3"
                                                    class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                                           text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                                                           focus:ring-2 focus:ring-eventify-gold focus:border-transparent transition-all duration-300"></textarea>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>

                        <!-- Countdown Section -->
                        <div class="p-6 rounded-xl border border-gray-200 dark:border-gray-600 space-y-4">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Countdown Section</h3>
                                <label class="flex items-center">
                                    <input type="checkbox" wire:model="countdown_section_visibility" 
                                        class="rounded border-gray-300 text-eventify-gold shadow-sm focus:ring-eventify-gold">
                                    <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Visible</span>
                                </label>
                            </div>

                            @if($countdown_section_visibility)
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Background Image</label>
                                        <input type="file" wire:model="countdown_section_bg_image" accept="image/*"
                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                                   text-gray-900 dark:text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 
                                                   file:bg-eventify-gold file:text-white file:cursor-pointer hover:file:bg-eventify-gold/80">
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title</label>
                                            <input type="text" wire:model="countdown_section_title" 
                                                class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                                       text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                                                       focus:ring-2 focus:ring-eventify-gold focus:border-transparent transition-all duration-300">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Countdown To</label>
                                            <select wire:model="countdown_section_item" 
                                                class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                                       text-gray-900 dark:text-white focus:ring-2 focus:ring-eventify-gold focus:border-transparent transition-all duration-300">
                                                <option value="">Select event</option>
                                                @if($type === 'wedding')
                                                    <option value="religious">Religious Wedding</option>
                                                    <option value="civil">Civil Wedding</option>
                                                @endif
                                                <option value="party">{{ $type === 'wedding' ? 'Reception' : 'Celebration' }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- RSVP Section -->
                        <div class="p-6 rounded-xl border border-gray-200 dark:border-gray-600 space-y-4">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white">RSVP Section</h3>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Background Image</label>
                                    <input type="file" wire:model="rsvp_section_bg_image" accept="image/*"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                               text-gray-900 dark:text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 
                                               file:bg-eventify-gold file:text-white file:cursor-pointer hover:file:bg-eventify-gold/80">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">RSVP Title</label>
                                    <input type="text" wire:model="rsvp_title" 
                                        class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                               text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                                               focus:ring-2 focus:ring-eventify-gold focus:border-transparent transition-all duration-300">
                                </div>
                                <div class="space-y-3">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">RSVP Options</label>
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                        <label class="flex items-center">
                                            <input type="checkbox" wire:model="accommodation_option" 
                                                class="rounded border-gray-300 text-eventify-gold shadow-sm focus:ring-eventify-gold">
                                            <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Accommodation needed</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" wire:model="vegetarian_option" 
                                                class="rounded border-gray-300 text-eventify-gold shadow-sm focus:ring-eventify-gold">
                                            <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Vegetarian option</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" wire:model="copies_option" 
                                                class="rounded border-gray-300 text-eventify-gold shadow-sm focus:ring-eventify-gold">
                                            <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Print copies</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Social Media Section -->
                        <div class="p-6 rounded-xl border border-gray-200 dark:border-gray-600 space-y-4">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white">Social Media</h3>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Image</label>
                                    <input type="file" wire:model="social_media_image" accept="image/*"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                               text-gray-900 dark:text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 
                                               file:bg-eventify-gold file:text-white file:cursor-pointer hover:file:bg-eventify-gold/80">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Text/Hashtag</label>
                                    <textarea wire:model="social_media_text" rows="3"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 
                                               text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                                               focus:ring-2 focus:ring-eventify-gold focus:border-transparent transition-all duration-300"
                                        placeholder="#YourHashtag Share your memories with us!"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Step 6: Review and Submit -->
                @if($currentStep === 6)
                    <div class="space-y-6">
                        <div class="text-center mb-6">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-2">Review & Create</h2>
                            <p class="text-gray-600 dark:text-gray-400">Review your invitation details before creating</p>
                        </div>

                        <!-- Summary Cards -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Basic Info -->
                            <div class="p-6 rounded-xl bg-gray-50 dark:bg-gray-800/50 space-y-3">
                                <h3 class="font-semibold text-gray-900 dark:text-white">Basic Information</h3>
                                <div class="space-y-2 text-sm">
                                    <div><span class="text-gray-600 dark:text-gray-400">Type:</span> <span class="font-medium">{{ ucfirst($type) }}</span></div>
                                    <div><span class="text-gray-600 dark:text-gray-400">Title:</span> <span class="font-medium">{{ $title }}</span></div>
                                    <div><span class="text-gray-600 dark:text-gray-400">Language:</span> <span class="font-medium">{{ $this->getLanguageOptions()[$language] }}</span></div>
                                    @if($confirmation_email)
                                        <div><span class="text-gray-600 dark:text-gray-400">Confirmation:</span> <span class="font-medium">{{ $confirmation_email }}</span></div>
                                    @endif
                                </div>
                            </div>

                            <!-- Type Details -->
                            @if($type === 'wedding' && ($bride_first_name || $groom_first_name))
                                <div class="p-6 rounded-xl bg-gray-50 dark:bg-gray-800/50 space-y-3">
                                    <h3 class="font-semibold text-gray-900 dark:text-white">Couple Details</h3>
                                    <div class="space-y-2 text-sm">
                                        @if($bride_first_name)
                                            <div><span class="text-gray-600 dark:text-gray-400">Bride:</span> <span class="font-medium">{{ $bride_first_name }} {{ $bride_last_name }}</span></div>
                                        @endif
                                        @if($groom_first_name)
                                            <div><span class="text-gray-600 dark:text-gray-400">Groom:</span> <span class="font-medium">{{ $groom_first_name }} {{ $groom_last_name }}</span></div>
                                        @endif
                                    </div>
                                </div>
                            @endif

                            <!-- Event Dates -->
                            @if($civil_date || $religious_date || $party_date)
                                <div class="p-6 rounded-xl bg-gray-50 dark:bg-gray-800/50 space-y-3">
                                    <h3 class="font-semibold text-gray-900 dark:text-white">Important Dates</h3>
                                    <div class="space-y-2 text-sm">
                                        @if($civil_date)
                                            <div><span class="text-gray-600 dark:text-gray-400">Civil:</span> <span class="font-medium">{{ $civil_date }} at {{ $civil_time ?: 'TBD' }}</span></div>
                                        @endif
                                        @if($religious_date)
                                            <div><span class="text-gray-600 dark:text-gray-400">Religious:</span> <span class="font-medium">{{ $religious_date }} at {{ $religious_time ?: 'TBD' }}</span></div>
                                        @endif
                                        @if($party_date)
                                            <div><span class="text-gray-600 dark:text-gray-400">{{ $type === 'wedding' ? 'Reception' : 'Celebration' }}:</span> <span class="font-medium">{{ $party_date }} at {{ $party_time ?: 'TBD' }}</span></div>
                                        @endif
                                    </div>
                                </div>
                            @endif

                            <!-- Image Display -->
                            <div class="p-6 rounded-xl bg-gray-50 dark:bg-gray-800/50 space-y-3">
                                <h3 class="font-semibold text-gray-900 dark:text-white">Image Settings</h3>
                                <div class="space-y-2 text-sm">
                                    <div><span class="text-gray-600 dark:text-gray-400">Display Type:</span> <span class="font-medium">{{ ucfirst($image_display_type) }}</span></div>
                                    @if($image_display_type === 'individual')
                                        <div><span class="text-gray-600 dark:text-gray-400">Images:</span> <span class="font-medium">{{ $bride_image ? '✓' : '✗' }} Bride, {{ $groom_image ? '✓' : '✗' }} Groom</span></div>
                                    @elseif($image_display_type === 'together')
                                        <div><span class="text-gray-600 dark:text-gray-400">Couple Image:</span> <span class="font-medium">{{ $couple_image ? 'Uploaded' : 'Not uploaded' }}</span></div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="flex justify-center">
                            <button type="submit" 
                                wire:loading.attr="disabled"
                                wire:target="save"
                                class="inline-flex items-center px-8 py-4 bg-eventify-gold hover:bg-eventify-gold/80 
                                       text-white font-semibold rounded-xl transition-all duration-300 transform hover:scale-105
                                       disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none">
                                <span wire:loading.remove wire:target="save">Create Invitation</span>
                                <span wire:loading wire:target="save" class="flex items-center">
                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Creating...
                                </span>
                            </button>
                        </div>
                    </div>
                @endif

                <!-- Navigation Buttons -->
                @if($currentStep < 6)
                    <div class="flex justify-between pt-6 border-t border-gray-200 dark:border-gray-700">
                        <button type="button" wire:click="previousStep" 
                            class="inline-flex items-center px-6 py-3 bg-gray-500 hover:bg-gray-600 text-white font-medium rounded-lg 
                                   transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed"
                            @if($currentStep === 1) disabled @endif>
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                            Previous
                        </button>
                        
                        <button type="button" wire:click="nextStep" 
                            class="inline-flex items-center px-6 py-3 bg-eventify-gold hover:bg-eventify-gold/80 text-white font-medium rounded-lg 
                                   transition-all duration-300">
                            Next
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>