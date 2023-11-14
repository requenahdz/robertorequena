<?php

namespace App\Models\A003;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'a003_comments';

    protected $fillable = [
        'value',
        'task_id'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
