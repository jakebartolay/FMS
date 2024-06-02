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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('account_number')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('role')->nullable();
            $table->string('profile_path_picture')->nullable();
            $table->string('user_id')->nullable();
            $table->string('type')->nullable();
            $table->enum('status', ['Active', 'Inactive', 'Suspended', 'Closed'])->default('Active');
            $table->date('birthdate')->nullable(); // Added birthdate column
            $table->timestamps();
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
