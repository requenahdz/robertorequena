<?php

namespace App\Models\A003;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'A003_tasks';

    protected $fillable = [
        'code',
        'name',
        'date_start',
        'status',
        'comments',
        'priority',
        'time'
    ];
}
