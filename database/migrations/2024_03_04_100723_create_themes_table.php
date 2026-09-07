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
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('primary_color')->default('#C59A27');
            $table->string('secondary_color')->default('#111A3A');
            $table->string('hover_color')->default('#A87F17');
            $table->string('light_color')->default('#FBF6EA');
            $table->string('nav_bg')->default('#FFFFFF');
            $table->string('footer_bg')->default('#111A3A');
            $table->string('description')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('themes');
    }
};
