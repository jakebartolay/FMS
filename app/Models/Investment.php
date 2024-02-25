<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    protected $fillable = ['user_id', 'amount', 'investment_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
