<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\WordAnswer;
use App\Models\Word;

class LessonWord extends Model
{
    protected $fillable = [
        'lesson_id', 'word_id', 'word_answer_id',
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function word()
    {
        return $this->belongsTo(Word::class);
    }

    public function wordAnswer()
    {
        return $this->belongsTo(WordAnswer::class);
    }

    public function createLessonWord($request)
    {
        $lessonWordData = [
            'lesson_id' => $request->input('lessonId'),
            'word_id' => $request->input('wordId'),
            'word_answer_id' => $request->input('wordAnswerId'),
        ];
        $this->create($lessonWordData);
    }

    public function createOption($categoryId, $questionIndex)
    {
        $lessonOptions = [];
        $question = new Word;
        $wordAnswer = new WordAnswer;
        $wordsData = $question->getQuestion($categoryId);
        $wordId = $wordsData[$questionIndex]->id;
        $wordAnswers = $wordAnswer->getWordAnswer($wordId);
        foreach ($wordAnswers as $wordAnswer) {
            $lessonOptions[] = [
                'wordId' => $wordId,
                'wordAnswerId' => $wordAnswer->id,
                'wordAnswerContent' => $wordAnswer->content,
                'wordAnswerCorrect' => $wordAnswer->correct,
            ];
        }

        return $lessonOptions;
    }
}
