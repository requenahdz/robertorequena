<?php

namespace App\Models\A003;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'a003_tasks';

    protected $fillable = [
        'code',
        'name',
        'date_start',
        'status',
        'comments',
        'priority',
        'time',
        'active'
    ];
}
