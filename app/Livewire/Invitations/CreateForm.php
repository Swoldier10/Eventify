<?php

namespace App\Livewire\Invitations;

use App\Models\Invitation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
#[Title('Create Invitation - Eventify')]
class CreateForm extends Component
{
    use WithFileUploads;

    // Multi-step form state
    public int $currentStep = 1;
    public int $totalSteps = 6;

    // Basic invitation info
    public string $type = 'wedding';
    public string $title = '';
    public string $language = 'en';
    public string $confirmation_email = '';

    // Couple information (for weddings)
    public string $bride_first_name = '';
    public string $bride_last_name = '';
    public string $groom_first_name = '';
    public string $groom_last_name = '';

    // Child information (for baptism)
    public string $child_name = '';

    // Image display settings
    public string $image_display_type = 'none';
    
    public $bride_image;
    public string $bride_description = '';
    
    public $groom_image;
    public string $groom_description = '';
    
    public $couple_image;
    public string $couple_description = '';

    // Godparents
    public string $godparents = '';

    // Civil wedding details
    public string $civil_address = '';
    public string $civil_date = '';
    public string $civil_time = '';

    // Religious wedding details
    public string $religious_address = '';
    public string $religious_date = '';
    public string $religious_time = '';

    // Party details
    public string $party_address = '';
    public string $party_date = '';
    public string $party_time = '';

    // First page settings
    public $first_page_bg_image;
    public string $first_page_title = '';
    public string $first_page_subtitle = '';

    // Couple section
    public string $couple_section_text_bride = '';
    public string $couple_section_text_groom = '';
    public bool $couple_section_visibility = true;
    
    public $couple_section_bg_image;
    public string $couple_section_title = '';
    public string $couple_section_subtitle = '';

    // Countdown section
    public bool $countdown_section_visibility = true;
    
    public $countdown_section_bg_image;
    public string $countdown_section_title = '';
    public string $countdown_section_item = '';

    // Date section
    public $date_section_bg_image;
    public string $date_section_title = '';

    // RSVP section
    public $rsvp_section_bg_image;
    public string $rsvp_title = '';

    // RSVP options
    public bool $accommodation_option = false;
    public bool $vegetarian_option = false;
    public bool $copies_option = false;

    // Social media
    public $social_media_image;
    public string $social_media_text = '';

    public bool $isLoading = false;

    /**
     * Get validation rules
     */
    protected function rules(): array
    {
        return [
            // Basic info
            'type' => 'required|in:wedding,baptism,event',
            'title' => 'required|string|max:255',
            'language' => 'required|in:en,ro,fr,es,de',
            'confirmation_email' => 'nullable|email',
            
            // Couple information
            'bride_first_name' => 'nullable|string|max:255',
            'bride_last_name' => 'nullable|string|max:255',
            'groom_first_name' => 'nullable|string|max:255',
            'groom_last_name' => 'nullable|string|max:255',
            'child_name' => 'nullable|string|max:255',
            
            // Image display settings
            'image_display_type' => 'required|in:individual,together,none',
            'bride_image' => 'nullable|image|max:2048',
            'bride_description' => 'nullable|string',
            'groom_image' => 'nullable|image|max:2048',
            'groom_description' => 'nullable|string',
            'couple_image' => 'nullable|image|max:2048',
            'couple_description' => 'nullable|string',
            
            // Godparents
            'godparents' => 'nullable|string',
            
            // Event details
            'civil_address' => 'nullable|string|max:255',
            'civil_date' => 'nullable|date',
            'civil_time' => 'nullable',
            'religious_address' => 'nullable|string|max:255',
            'religious_date' => 'nullable|date',
            'religious_time' => 'nullable',
            'party_address' => 'nullable|string|max:255',
            'party_date' => 'nullable|date',
            'party_time' => 'nullable',
            
            // First page settings
            'first_page_bg_image' => 'nullable|image|max:2048',
            'first_page_title' => 'nullable|string|max:255',
            'first_page_subtitle' => 'nullable|string|max:255',
            
            // Couple section
            'couple_section_text_bride' => 'nullable|string',
            'couple_section_text_groom' => 'nullable|string',
            'couple_section_visibility' => 'boolean',
            'couple_section_bg_image' => 'nullable|image|max:2048',
            'couple_section_title' => 'nullable|string|max:255',
            'couple_section_subtitle' => 'nullable|string|max:255',
            
            // Countdown section
            'countdown_section_visibility' => 'boolean',
            'countdown_section_bg_image' => 'nullable|image|max:2048',
            'countdown_section_title' => 'nullable|string|max:255',
            'countdown_section_item' => 'nullable|in:religious,civil,party',
            
            // Date section
            'date_section_bg_image' => 'nullable|image|max:2048',
            'date_section_title' => 'nullable|string|max:255',
            
            // RSVP section
            'rsvp_section_bg_image' => 'nullable|image|max:2048',
            'rsvp_title' => 'nullable|string|max:255',
            
            // RSVP options
            'accommodation_option' => 'boolean',
            'vegetarian_option' => 'boolean',
            'copies_option' => 'boolean',
            
            // Social media
            'social_media_image' => 'nullable|image|max:2048',
            'social_media_text' => 'nullable|string',
        ];
    }

    /**
     * Get validation messages
     */
    protected function messages(): array
    {
        return [
            'type.required' => 'Please select an invitation type.',
            'type.in' => 'Please select a valid invitation type.',
            'title.required' => 'Invitation title is required.',
            'title.max' => 'Title cannot be longer than 255 characters.',
            'language.required' => 'Please select a language.',
            'language.in' => 'Please select a valid language.',
            'confirmation_email.email' => 'Please enter a valid email address.',
            
            // Image validation
            'bride_image.image' => 'Bride photo must be an image file.',
            'bride_image.max' => 'Bride photo cannot be larger than 2MB.',
            'groom_image.image' => 'Groom photo must be an image file.',
            'groom_image.max' => 'Groom photo cannot be larger than 2MB.',
            'couple_image.image' => 'Couple photo must be an image file.',
            'couple_image.max' => 'Couple photo cannot be larger than 2MB.',
            
            // Background images
            'first_page_bg_image.image' => 'Background image must be an image file.',
            'first_page_bg_image.max' => 'Background image cannot be larger than 2MB.',
            'couple_section_bg_image.image' => 'Background image must be an image file.',
            'couple_section_bg_image.max' => 'Background image cannot be larger than 2MB.',
            'countdown_section_bg_image.image' => 'Background image must be an image file.',
            'countdown_section_bg_image.max' => 'Background image cannot be larger than 2MB.',
            'date_section_bg_image.image' => 'Background image must be an image file.',
            'date_section_bg_image.max' => 'Background image cannot be larger than 2MB.',
            'rsvp_section_bg_image.image' => 'Background image must be an image file.',
            'rsvp_section_bg_image.max' => 'Background image cannot be larger than 2MB.',
            'social_media_image.image' => 'Social media image must be an image file.',
            'social_media_image.max' => 'Social media image cannot be larger than 2MB.',
            
            // Date validation
            'civil_date.date' => 'Please enter a valid date.',
            'religious_date.date' => 'Please enter a valid date.',
            'party_date.date' => 'Please enter a valid date.',
            
            // String length validation
            'bride_first_name.max' => 'First name cannot be longer than 255 characters.',
            'bride_last_name.max' => 'Last name cannot be longer than 255 characters.',
            'groom_first_name.max' => 'First name cannot be longer than 255 characters.',
            'groom_last_name.max' => 'Last name cannot be longer than 255 characters.',
            'child_name.max' => 'Name cannot be longer than 255 characters.',
            
            // Address validation
            'civil_address.max' => 'Address cannot be longer than 255 characters.',
            'religious_address.max' => 'Address cannot be longer than 255 characters.',
            'party_address.max' => 'Address cannot be longer than 255 characters.',
            
            // Section titles
            'first_page_title.max' => 'Title cannot be longer than 255 characters.',
            'first_page_subtitle.max' => 'Subtitle cannot be longer than 255 characters.',
            'couple_section_title.max' => 'Title cannot be longer than 255 characters.',
            'couple_section_subtitle.max' => 'Subtitle cannot be longer than 255 characters.',
            'countdown_section_title.max' => 'Title cannot be longer than 255 characters.',
            'date_section_title.max' => 'Title cannot be longer than 255 characters.',
            'rsvp_title.max' => 'Title cannot be longer than 255 characters.',
            
            // Dropdown validation
            'countdown_section_item.in' => 'Please select a valid countdown option.',
        ];
    }

    /**
     * Initialize component with default values
     */
    public function mount(): void
    {
        // Set some default values based on type
        $this->updateDefaultsForType();
    }

    /**
     * Update defaults when type changes
     */
    public function updatedType(): void
    {
        $this->updateDefaultsForType();
    }

    /**
     * Set default values based on invitation type
     */
    private function updateDefaultsForType(): void
    {
        switch ($this->type) {
            case 'wedding':
                $this->first_page_title = $this->first_page_title ?: 'Our Wedding Day';
                $this->couple_section_title = $this->couple_section_title ?: 'The Happy Couple';
                $this->countdown_section_title = $this->countdown_section_title ?: 'Countdown to Our Big Day';
                $this->date_section_title = $this->date_section_title ?: 'Save the Date';
                $this->rsvp_title = $this->rsvp_title ?: 'RSVP';
                break;
            case 'baptism':
                $this->first_page_title = $this->first_page_title ?: 'Baptism Celebration';
                $this->couple_section_title = $this->couple_section_title ?: 'Our Little Angel';
                $this->countdown_section_title = $this->countdown_section_title ?: 'Days Until Baptism';
                $this->date_section_title = $this->date_section_title ?: 'Join Us';
                $this->rsvp_title = $this->rsvp_title ?: 'Please Confirm';
                break;
            case 'event':
                $this->first_page_title = $this->first_page_title ?: 'Special Event';
                $this->couple_section_title = $this->couple_section_title ?: 'Event Details';
                $this->countdown_section_title = $this->countdown_section_title ?: 'Countdown';
                $this->date_section_title = $this->date_section_title ?: 'Mark Your Calendar';
                $this->rsvp_title = $this->rsvp_title ?: 'RSVP Required';
                break;
        }
    }

    /**
     * Move to next step
     */
    public function nextStep(): void
    {
        $this->validateCurrentStep();
        
        if ($this->currentStep < $this->totalSteps) {
            $this->currentStep++;
        }
    }

    /**
     * Move to previous step
     */
    public function previousStep(): void
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    /**
     * Go to specific step
     */
    public function goToStep(int $step): void
    {
        if ($step >= 1 && $step <= $this->totalSteps) {
            // Only validate if moving forward
            if ($step > $this->currentStep) {
                $this->validateCurrentStep();
            }
            $this->currentStep = $step;
        }
    }

    /**
     * Validate current step
     */
    private function validateCurrentStep(): void
    {
        switch ($this->currentStep) {
            case 1: // Basic Info
                $this->validate([
                    'type' => 'required|in:wedding,baptism,event',
                    'title' => 'required|string|max:255',
                    'language' => 'required|in:en,ro,fr,es,de',
                    'confirmation_email' => 'nullable|email',
                ]);
                break;
            case 2: // Type-specific fields
                if ($this->type === 'wedding') {
                    $this->validate([
                        'bride_first_name' => 'nullable|string|max:255',
                        'bride_last_name' => 'nullable|string|max:255',
                        'groom_first_name' => 'nullable|string|max:255',
                        'groom_last_name' => 'nullable|string|max:255',
                    ]);
                } elseif ($this->type === 'baptism') {
                    $this->validate([
                        'child_name' => 'nullable|string|max:255',
                        'godparents' => 'nullable|string',
                    ]);
                }
                break;
            case 3: // Images and Descriptions
                $this->validate([
                    'image_display_type' => 'required|in:individual,together,none',
                    'bride_description' => 'nullable|string',
                    'groom_description' => 'nullable|string',
                    'couple_description' => 'nullable|string',
                    'bride_image' => 'nullable|image|max:2048',
                    'groom_image' => 'nullable|image|max:2048',
                    'couple_image' => 'nullable|image|max:2048',
                ]);
                break;
            // Add more validation as needed
        }
    }

    /**
     * Save invitation as draft and redirect
     */
    public function save(): void
    {
        $this->isLoading = true;

        try {
            // Validate all fields
            $validated = $this->validate();

            // Handle file uploads
            $this->handleFileUploads($validated);

            // Create invitation
            $invitation = Invitation::create(array_merge($validated, [
                'user_id' => Auth::id(),
                'status' => 'draft',
            ]));

            session()->flash('message', 'Invitation created successfully!');
            $this->redirect(route('invitations.index'));

        } catch (\Exception $e) {
            $this->isLoading = false;
            session()->flash('error', 'Failed to create invitation. Please try again.');
            throw $e;
        }
    }

    /**
     * Handle file uploads and store paths
     */
    private function handleFileUploads(array &$validated): void
    {
        $fileFields = [
            'bride_image',
            'groom_image',
            'couple_image',
            'first_page_bg_image',
            'couple_section_bg_image',
            'countdown_section_bg_image',
            'date_section_bg_image',
            'rsvp_section_bg_image',
            'social_media_image'
        ];

        foreach ($fileFields as $field) {
            if ($this->$field && is_object($this->$field)) {
                $validated[$field] = $this->$field->store('invitations', 'public');
            } else {
                unset($validated[$field]);
            }
        }
    }

    /**
     * Get available languages
     */
    public function getLanguageOptions(): array
    {
        return [
            'en' => 'English',
            'ro' => 'Romanian',
            'fr' => 'French',
            'es' => 'Spanish',
            'de' => 'German',
        ];
    }

    /**
     * Get available invitation types
     */
    public function getTypeOptions(): array
    {
        return [
            'wedding' => 'Wedding',
            'baptism' => 'Baptism',
            'event' => 'Event',
        ];
    }

    /**
     * Render the component
     */
    public function render()
    {
        return view('livewire.invitations.create-form');
    }
}