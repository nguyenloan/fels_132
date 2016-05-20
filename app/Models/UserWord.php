<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserWord extends Model
{
    protected $fillable = [
        'word_id', 'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function words()
    {
        return $this->hasMany(Word::class);
    }
}
