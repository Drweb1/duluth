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
            Schema::create('customers', function (Blueprint $table) {
                $table->id(); // Auto-increment primary key
                $table->string('name', 50);
                $table->string('email', 100)->unique();
                $table->string('password')->nullable();
                $table->string('phone_number', 20)->nullable();
                $table->string('address', 255)->nullable();
                $table->string('city', 50)->nullable();
                $table->string('state', 50)->nullable();
                $table->string('postal_code', 20)->nullable();
                $table->string('country', 50);
                $table->timestamps(); // Adds created_at and updated_at
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
