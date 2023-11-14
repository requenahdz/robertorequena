<?php

namespace App\Models\A003;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'a003_comments';

    protected $fillable = [
        'value',
        'task_id'
    ];
}
