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
        Schema::table('website_contents', function (Blueprint $table) {
            $table->index('link_key');
            $table->index('page_name');
        });

        Schema::table('visa_types', function (Blueprint $table) {
            $table->index('country_details_id');
        });

        Schema::table('blogs', function (Blueprint $table) {
            $table->index('category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('website_contents', function (Blueprint $table) {
            $table->dropIndex(['link_key']);
            $table->dropIndex(['page_name']);
        });

        Schema::table('visa_types', function (Blueprint $table) {
            $table->dropIndex(['country_details_id']);
        });

        Schema::table('blogs', function (Blueprint $table) {
            $table->dropIndex(['category_id']);
        });
    }
};
