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
            $table->date('date_of_birth')->nullable();
            $table->string('medicaid_id')->nullable();
            $table->string('ssn')->nullable();
            $table->string('status')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('emergency_phone')->nullable();
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_relation')->nullable();
            $table->string('emergency_email')->nullable();
            $table->string('care_frequency')->nullable()->after('care_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_profiles', function (Blueprint $table) {
            //
        });
    }
};
