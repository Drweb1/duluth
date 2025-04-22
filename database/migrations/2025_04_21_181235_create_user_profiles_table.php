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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references("id")->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->float('experience_years')->nullable();
            $table->string('certification')->nullable();
            $table->date('start_date')->nullable();
            $table->string('schdule_type')->nullable();
            $table->string('care_type')->nullable();
            $table->string('takes_medications')->nullable();
            $table->boolean('uses_mobility_aids')->nullable();
            $table->string('dietary_restrictions')->nullable();
            $table->string('insurance_provider')->nullable();
            $table->string('policy_number')->nullable();
            $table->string('group_number')->nullable();
            $table->string('medicare_number')->nullable();
            $table->string('insurance_card')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
