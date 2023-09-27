<?php

namespace App\Models\A002;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $table = 'A002_loans';

    protected $fillable = [
        'user_id',
        'amount',
        'tasa',
        'plazo',
        'cuotas',
        'total',
        'interest',
        'status',
        'date_start',
        'date_end',
        'active'
    ];
}
