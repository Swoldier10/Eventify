<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            
            // Basic invitation info
            $table->enum('type', ['wedding', 'baptism', 'event']);
            $table->string('template')->nullable();
            $table->string('title');
            $table->enum('language', ['en', 'ro', 'fr', 'es', 'de'])->default('en');
            $table->string('confirmation_email')->nullable();
            
            // Couple information (for weddings)
            $table->string('bride_first_name')->nullable();
            $table->string('bride_last_name')->nullable();
            $table->string('groom_first_name')->nullable();
            $table->string('groom_last_name')->nullable();
            
            // Image display settings
            $table->enum('image_display_type', ['individual', 'together', 'none'])->default('none');
            $table->string('bride_image')->nullable();
            $table->text('bride_description')->nullable();
            $table->string('groom_image')->nullable();
            $table->text('groom_description')->nullable();
            $table->string('couple_image')->nullable();
            $table->text('couple_description')->nullable();
            
            // Godparents
            $table->text('godparents')->nullable();
            
            // Civil wedding details
            $table->string('civil_address')->nullable();
            $table->date('civil_date')->nullable();
            $table->time('civil_time')->nullable();
            
            // Religious wedding details
            $table->string('religious_address')->nullable();
            $table->date('religious_date')->nullable();
            $table->time('religious_time')->nullable();
            
            // Party details
            $table->string('party_address')->nullable();
            $table->date('party_date')->nullable();
            $table->time('party_time')->nullable();
            
            // First page settings
            $table->string('first_page_bg_image')->nullable();
            $table->string('first_page_title')->nullable();
            $table->string('first_page_subtitle')->nullable();
            
            // Couple section
            $table->text('couple_section_text_bride')->nullable();
            $table->text('couple_section_text_groom')->nullable();
            $table->boolean('couple_section_visibility')->default(true);
            $table->string('couple_section_bg_image')->nullable();
            $table->string('couple_section_title')->nullable();
            $table->string('couple_section_subtitle')->nullable();
            
            // Countdown section
            $table->boolean('countdown_section_visibility')->default(true);
            $table->string('countdown_section_bg_image')->nullable();
            $table->string('countdown_section_title')->nullable();
            $table->enum('countdown_section_item', ['religious', 'civil', 'party'])->nullable();
            
            // Date section
            $table->string('date_section_bg_image')->nullable();
            $table->string('date_section_title')->nullable();
            
            // RSVP section
            $table->string('rsvp_section_bg_image')->nullable();
            $table->string('rsvp_title')->nullable();
            
            // RSVP options
            $table->boolean('accommodation_option')->default(false);
            $table->boolean('vegetarian_option')->default(false);
            $table->boolean('copies_option')->default(false);
            
            // Social media
            $table->string('social_media_image')->nullable();
            $table->text('social_media_text')->nullable();
            
            // Status
            $table->enum('status', ['draft', 'active', 'completed'])->default('draft');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitations');
    }
};
