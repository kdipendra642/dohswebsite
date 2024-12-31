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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('titleOne')->nullable();
            $table->string('titleTwo')->nullable();
            $table->string('titleThree')->nullable();
            $table->string('titleFour')->nullable();
            $table->text('description')->nullable();
            $table->string('address')->nullable();
            $table->string('primaryContact')->nullable();
            $table->string('secondaryContact')->nullable();
            $table->string('primaryEmail')->nullable();
            $table->string('secondaryEmail')->nullable();
            $table->string('socialTwitterLink')->nullable();
            $table->string('socialFacebookLink')->nullable();
            $table->string('socialYoutubeLink')->nullable();
            $table->string('imap')->nullable();
            $table->string('metaKeywords')->nullable();
            $table->text('metaDescription')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
