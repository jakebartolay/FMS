<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fms10_senderhistory extends Model
{
    use HasFactory;

    protected $table = 'fms10_senderhistory'; 

    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'recipient_id',
        'amount',
        'type',
    ];
}
