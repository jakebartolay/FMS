<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class fms10_investments extends Model
{
    protected $fillable = ['user_id', 'amount','tax_amount', 'investment_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
