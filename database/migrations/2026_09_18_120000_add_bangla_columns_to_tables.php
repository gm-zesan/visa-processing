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
            $table->string('title_bn')->nullable()->after('title');
            $table->string('subtitle_bn')->nullable()->after('subtitle');
            $table->string('button_text_bn')->nullable()->after('button_text');
            $table->text('description_bn')->nullable()->after('description');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->string('name_bn')->nullable()->after('name');
        });

        Schema::table('blogs', function (Blueprint $table) {
            $table->string('title_bn')->nullable()->after('title');
            $table->text('description_bn')->nullable()->after('description');
        });

        Schema::table('visa_types', function (Blueprint $table) {
            $table->string('name_bn')->nullable()->after('name');
            $table->text('description_bn')->nullable()->after('description');
            $table->string('visa_category_bn')->nullable()->after('visa_category');
            $table->string('issuing_authority_bn')->nullable()->after('issuing_authority');
            $table->string('processing_time_bn')->nullable()->after('processing_time');
            $table->string('contract_period_bn')->nullable()->after('contract_period');
            $table->string('emigration_clearance_bn')->nullable()->after('emigration_clearance');
            $table->json('processing_steps_bn')->nullable()->after('processing_steps');
        });

        Schema::table('our_teams', function (Blueprint $table) {
            $table->string('name_bn')->nullable()->after('name');
            $table->string('designation_bn')->nullable()->after('designation');
            $table->text('biography_bn')->nullable()->after('biography');
        });

        Schema::table('countries', function (Blueprint $table) {
            $table->string('name_bn')->nullable()->after('name');
        });

        Schema::table('country_details', function (Blueprint $table) {
            $table->text('description_bn')->nullable()->after('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('website_contents', function (Blueprint $table) {
            $table->dropColumn(['title_bn', 'subtitle_bn', 'button_text_bn', 'description_bn']);
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('name_bn');
        });

        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn(['title_bn', 'description_bn']);
        });

        Schema::table('visa_types', function (Blueprint $table) {
            $table->dropColumn(['name_bn', 'description_bn', 'visa_category_bn', 'issuing_authority_bn', 'processing_time_bn', 'contract_period_bn', 'emigration_clearance_bn', 'processing_steps_bn']);
        });

        Schema::table('our_teams', function (Blueprint $table) {
            $table->dropColumn(['name_bn', 'designation_bn', 'biography_bn']);
        });

        Schema::table('countries', function (Blueprint $table) {
            $table->dropColumn('name_bn');
        });

        Schema::table('country_details', function (Blueprint $table) {
            $table->dropColumn('description_bn');
        });
    }
};
