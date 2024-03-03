<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendorsuser extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'password' => 'required',
        'role_name' => 'required|in:Vendor,Client',
    ];

    use HasFactory;

    protected $connection = "vendor";
}
