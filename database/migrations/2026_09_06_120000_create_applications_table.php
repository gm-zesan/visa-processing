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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('passport_number')->unique();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('destination_country')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
            $table->index('passport_number');
            $table->index('destination_country');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
