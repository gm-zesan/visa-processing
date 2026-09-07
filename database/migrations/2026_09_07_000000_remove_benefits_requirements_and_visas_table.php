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
        // Drop unused visas table if it exists
        Schema::dropIfExists('visas');

        // Drop benefits and requirements columns from visa_types table
        Schema::table('visa_types', function (Blueprint $table) {
            $columnsToDrop = [];
            if (Schema::hasColumn('visa_types', 'benefits')) {
                $columnsToDrop[] = 'benefits';
            }
            if (Schema::hasColumn('visa_types', 'requirements')) {
                $columnsToDrop[] = 'requirements';
            }
            if (!empty($columnsToDrop)) {
                $table->dropColumn($columnsToDrop);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('visa_types', function (Blueprint $table) {
            $table->json('benefits')->nullable()->after('emigration_clearance');
            $table->json('requirements')->nullable()->after('benefits');
        });

        Schema::create('visas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('visa_type_id')->constrained('visa_types')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }
};
