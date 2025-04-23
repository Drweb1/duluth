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
        Schema::table('user_profiles', function (Blueprint $table) {
        $table->string('availability')->nullable();
        $table->string('language')->nullable();
        $table->string('background_check')->nullable();
        $table->string('crp_certification')->nullable();
        $table->string('tb_test')->nullable();
        $table->string('licence')->nullable();
        $table->string('schedule')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
