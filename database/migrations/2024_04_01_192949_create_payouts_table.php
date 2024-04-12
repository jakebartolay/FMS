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
        Schema::create('payouts', function (Blueprint $table) {
            $table->id();
            $table->string('withdrawal_account');
            $table->foreignId('user_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->decimal('amount', 10, 2); // Assuming maximum 2 decimal places
            $table->string('status'); // Assuming status_id is integer type
            $table->timestamps();

            // Define foreign key constraint for status_id referencing the statuses table
            // $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payouts');
    }
};
