<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SenderHistory extends Model
{
    use HasFactory;

    protected $table = 'senderhistory'; 

    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'recipient_id',
        'amount',
        'type',
    ];
}
