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
        Schema::create('visa_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_details_id')->constrained('country_details')->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('visa_category')->nullable();
            $table->string('issuing_authority')->nullable();
            $table->string('processing_time')->nullable();
            $table->string('contract_period')->nullable();
            $table->string('emigration_clearance')->nullable();
            $table->json('processing_steps')->nullable();
            $table->timestamps();

            $table->index('country_details_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visa_types');
    }
};
