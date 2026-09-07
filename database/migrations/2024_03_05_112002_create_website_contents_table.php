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
        Schema::create('website_contents', function (Blueprint $table) {
            $table->id();
            $table->string('page_name');
            $table->foreign('page_name')->references('name')->on('common_types')->onDelete('cascade');
            $table->unsignedBigInteger('theme_id')->nullable();
            $table->foreign('theme_id')->references('id')->on('themes')->onDelete('cascade');
            $table->string('link_key')->nullable();
            $table->string('hints')->nullable();
            $table->string('title')->nullable();
            $table->string('title_label')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('subtitle_label')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_text_label')->nullable();
            $table->string('button_link')->nullable();
            $table->string('button_link_label')->nullable();
            $table->text('description')->nullable();
            $table->text('description_label')->nullable();
            $table->string('image')->nullable();
            $table->string('image_label')->nullable();
            $table->timestamps();

            $table->index('link_key');
            $table->index('page_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_contents');
    }
};
