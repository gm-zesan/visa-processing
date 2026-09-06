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
            $table->string('subtitle')->nullable()->after('description');
            $table->string('language')->nullable()->after('subtitle');
            $table->string('processing_time')->nullable()->after('language');
            $table->json('sectors')->nullable()->after('processing_time');
            $table->json('worker_protections')->nullable()->after('sectors');
        });

        Schema::table('visa_types', function (Blueprint $table) {
            $table->string('visa_category')->nullable()->after('description');
            $table->string('issuing_authority')->nullable()->after('visa_category');
            $table->string('processing_time')->nullable()->after('issuing_authority');
            $table->string('contract_period')->nullable()->after('processing_time');
            $table->string('emigration_clearance')->nullable()->after('contract_period');
            $table->json('benefits')->nullable()->after('emigration_clearance');
            $table->json('requirements')->nullable()->after('benefits');
            $table->json('processing_steps')->nullable()->after('requirements');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('country_details', function (Blueprint $table) {
            $table->dropColumn([
                'subtitle',
                'language',
                'processing_time',
                'sectors',
                'worker_protections',
            ]);
        });

        Schema::table('visa_types', function (Blueprint $table) {
            $table->dropColumn([
                'visa_category',
                'issuing_authority',
                'processing_time',
                'contract_period',
                'emigration_clearance',
                'benefits',
                'requirements',
                'processing_steps',
            ]);
        });
    }
};
