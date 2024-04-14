<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fms10_transactionhistory extends Model
{
    use HasFactory;
    protected $table = 'fms10_transactionhistory';

    protected $fillable = [
    'user_id',
    'firstname',
    'lastname',
    'amount',
    'description',
    'type',
    ];
    
}
