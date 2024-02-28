<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestmentRequest extends Model
{
    protected $fillable = [
        'user_id',
        'amount',
        'status',
    ];
    protected $table = 'investmentrequest'; // Specify the correct table name
}