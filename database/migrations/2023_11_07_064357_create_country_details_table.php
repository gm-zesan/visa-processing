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
        Schema::create('country_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('language')->nullable();
            $table->string('processing_time')->nullable();
            $table->json('sectors')->nullable();
            $table->json('worker_protections')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('country_details');
    }
};
