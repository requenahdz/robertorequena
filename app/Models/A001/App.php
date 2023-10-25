<?php

namespace App\Models\A001;
use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    protected $table = 'a001_apps';

    protected $fillable = [
        'code',
        'name',
        'active'
    ];
}
