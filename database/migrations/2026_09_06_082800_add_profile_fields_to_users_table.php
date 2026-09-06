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
        Schema::table('users', function (Blueprint $table) {
            $table->string('designation')->nullable()->after('name');
            $table->string('address')->nullable()->after('phone_no');
            $table->string('facebook')->nullable()->after('description');
            $table->string('linkedin')->nullable()->after('facebook');
            $table->string('whatsapp')->nullable()->after('linkedin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['designation', 'address', 'facebook', 'linkedin', 'whatsapp']);
        });
    }
};
