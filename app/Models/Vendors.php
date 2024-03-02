<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendors extends Model
{
    protected $table = 'vendors';

    use HasFactory;

    protected $connection = "vendor";
}
