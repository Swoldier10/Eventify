<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invitation extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'template',
        'title',
        'language',
        'confirmation_email',
        'bride_first_name',
        'bride_last_name',
        'groom_first_name',
        'groom_last_name',
        'image_display_type',
        'bride_image',
        'bride_description',
        'groom_image',
        'groom_description',
        'couple_image',
        'couple_description',
        'godparents',
        'civil_address',
        'civil_date',
        'civil_time',
        'religious_address',
        'religious_date',
        'religious_time',
        'party_address',
        'party_date',
        'party_time',
        'first_page_bg_image',
        'first_page_title',
        'first_page_subtitle',
        'couple_section_text_bride',
        'couple_section_text_groom',
        'couple_section_visibility',
        'couple_section_bg_image',
        'couple_section_title',
        'couple_section_subtitle',
        'countdown_section_visibility',
        'countdown_section_bg_image',
        'countdown_section_title',
        'countdown_section_item',
        'date_section_bg_image',
        'date_section_title',
        'rsvp_section_bg_image',
        'rsvp_title',
        'accommodation_option',
        'vegetarian_option',
        'copies_option',
        'social_media_image',
        'social_media_text',
        'status',
    ];

    protected $casts = [
        'civil_date' => 'date',
        'religious_date' => 'date',
        'party_date' => 'date',
        'civil_time' => 'datetime:H:i',
        'religious_time' => 'datetime:H:i',
        'party_time' => 'datetime:H:i',
        'couple_section_visibility' => 'boolean',
        'countdown_section_visibility' => 'boolean',
        'accommodation_option' => 'boolean',
        'vegetarian_option' => 'boolean',
        'copies_option' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
