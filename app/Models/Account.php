<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'accounts'; 
    protected $fillable = ['user_id', 'balance']; // Add 'user_id' to the fillable fields
}
