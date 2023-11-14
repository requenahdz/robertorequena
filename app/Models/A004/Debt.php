<?php

namespace App\Models\A004;

use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    protected $table = 'a003_debts';

    protected $fillable = [
        'name',
        'value'
    ];
}
