<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fms10_transactions extends Model
{
    use HasFactory;

    protected $table = 'fms10_transactions'; 

    protected $fillable = [
        'firstname',
        'lastname',
        'user_id',
        'amount',
        'type',
    ];
}
