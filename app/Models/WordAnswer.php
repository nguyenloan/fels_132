<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WordAnswer extends Model
{
    const IS_CORRECT = 1;

    protected $fillable = [
        'content', 'word_id', 'correct',
    ];

    public function word()
    {
        return $this->belongsTo(Word::class);
    }

    public function lessWords()
    {
        return $this->hasMany(LessWord::class);
    }

    public function getWordAnswer($wordId)
    {
        $wordAnswer = $this->where('word_id', $wordId)->get();

        return $wordAnswer;
    }
}
