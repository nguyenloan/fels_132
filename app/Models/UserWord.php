<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserWord extends Model
{
    protected $fillable = [
        'word_id', 'user_id',
    ];
}
