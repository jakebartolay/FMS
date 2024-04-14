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
        Schema::create('fms10_accounts', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Define 'id' column as UUID and primary key
            $table->string('firstname');
            $table->string('lastname');
            $table->unsignedBigInteger('user_id');
            $table->decimal('balance', 12, 2)->default(0);
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
