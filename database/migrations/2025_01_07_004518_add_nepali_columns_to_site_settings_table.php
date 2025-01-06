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
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('titleOne_nep')->nullable();
            $table->string('titleTwo_nep')->nullable();
            $table->string('titleThree_nep')->nullable();
            $table->string('titleFour_nep')->nullable();
            $table->text('description_nep')->nullable();
            $table->string('address_nep')->nullable();
            $table->string('metaKeywords_nep')->nullable();
            $table->text('metaDescription_nep')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            //
        });
    }
};
