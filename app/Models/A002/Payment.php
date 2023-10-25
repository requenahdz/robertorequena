<?php

namespace App\Models\A002;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'a002_loans';

    protected $fillable = [
        'user_id',
        'loan_id',
        'amount',
        'cuota',
        'method',
        'date_at',
        'status',
        'active'
    ];
}
