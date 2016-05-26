<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\LessonWord;
use App\Models\WordAnswer;
use App\Models\Activity;
use Auth;

class Lesson extends Model
{
    protected $fillable = [
        'user_id', 'category_id', 'result',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lessonWords()
    {
        return $this->hasMany(LessonWord::class);
    }

    public function createLesson($userId, $categoryId)
    {
        $lessonData = [
            'user_id' => $userId,
            'category_id' => $categoryId
        ];
        $lesson = $this->create($lessonData);
        return $lesson->id;
    }

    public function createResultOption($lessonId)
    {
        $resultOptions = [];
        $wordAnswer = new WordAnswer;
        $lessonWord = new LessonWord;
        $results = $lessonWord->with('word')->where('lesson_id', $lessonId)->get();
        foreach ($results as $result) {
            $wordAnswerId = $result->word_answer_id;
            $wordAnswerData = $wordAnswer->find($wordAnswerId);
            $resultOptions[] = [
                'wordContent' => $result->word->content,
                'wordAnswerContent' => $wordAnswerData->content,
                'isCorrect' => $wordAnswerData->correct,
            ];
        }
        return $resultOptions;
    }

    public function totalCorrect($lessonId)
    {
        $resultOptions = $this->createResultOption($lessonId);
        $totalCorrect = 0;
        foreach ($resultOptions as $resultOption) {
            if ($resultOption['isCorrect'] == WordAnswer::IS_CORRECT) {
                $totalCorrect++;
            }
        }
        return $totalCorrect;
    }

    public function createActivityLesson($content)
    {
        $activity = new Activity;
        $activityData = [
            'user_id' => Auth::user()->id,
            'target_id' => Activity::LESSON_TYPE,
            'action_type' => $content,
        ];
        $activity->create($activityData);
    }
}
