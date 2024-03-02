<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendorsuser extends Model
{
    protected $table = 'users';

    use HasFactory;

    protected $connection = "vendor";
}
