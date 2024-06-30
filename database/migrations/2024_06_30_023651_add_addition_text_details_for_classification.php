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
        Schema::table('disablity_type', function (Blueprint $table) {
            //
            $table->string('severity_name_nepali')->nullable();
            $table->string('severity_name_english')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('disablity_type', function (Blueprint $table) {
            //
        });
    }
};
