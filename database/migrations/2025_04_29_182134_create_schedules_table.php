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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('users')->onDelete('cascade');
            $table->string('staff_type');

            $table->foreignId('nurse_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('caregiver_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->string('visit_type')->nullable();
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->longText('notes')->nullable();

            $table->string('recurring_visit')->nullable();
            $table->string('frequency')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
