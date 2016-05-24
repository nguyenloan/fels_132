<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    const LESSON_TYPE = 1;
    const FOLLOW_TYPE = 0;

    protected $fillable = [
        'user_id', 'action_type', 'target_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
