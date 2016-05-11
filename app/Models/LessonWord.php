<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessonWord extends Model
{
    protected $fillable = [
        'lesson_id', 'word_id', 'word_answer_id',
    ];
}
