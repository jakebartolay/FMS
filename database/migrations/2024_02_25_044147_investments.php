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
        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('tax_amount');
            $table->decimal('amount', 10, 2);
            $table->string('type');
            $table->date('investment_date');
            $table->enum('status', ['Active', 'Inactive', 'Pending', 'Completed', 'Cancelled', 'Suspended', 'Failed', 'Refunded', 'Approve', 'Cancel', 'Delete'])->default('Active');
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
