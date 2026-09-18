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
        Schema::table('country_details', function (Blueprint $table) {
            $table->string('subtitle_bn')->nullable()->after('subtitle');
            $table->string('language_bn')->nullable()->after('language');
            $table->string('processing_time_bn')->nullable()->after('processing_time');
            $table->json('sectors_bn')->nullable()->after('sectors');
            $table->json('worker_protections_bn')->nullable()->after('worker_protections');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('country_details', function (Blueprint $table) {
            $table->dropColumn([
                'subtitle_bn',
                'language_bn',
                'processing_time_bn',
                'sectors_bn',
                'worker_protections_bn',
            ]);
        });
    }
};
