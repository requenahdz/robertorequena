<?php

namespace App\Models\A001;
use Illuminate\Database\Eloquent\Model;

class Sitie extends Model
{
    protected $table = 'A001_sites';

    protected $fillable = [
        'name',
        'url',
        'active'
    ];
}
