<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\UserWord;
use Auth;
class Word extends Model
{
    protected $fillable = [
        'content', 'category_id',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function wordAnswer()
    {
        return $this->hasOne(WordAnswer::class);
    }

    public function userWord()
    {
        return $this->belongsToMany(User::class, 'user_words', 'word_id', 'user_id');
    }

    public function getWord($categoryId,$statusRadio)
    {
        $listWord = $this->with('category')
            ->where('category_id', $categoryId)
            ->get();
        switch ($statusRadio) {
            case 'all':
                $listWord = $this->with('category')
                    ->where('category_id', $categoryId)
                    ->get();;
                break;
            case 'learn':
                $listWord = User::find(Auth::user()->id)->userWord()->get();
                break;
            case 'notlearn':
                $wordLearned = userWord::lists('word_id');
                $listWord = $this->whereNotIn('id', $wordLearned)->get();
                break;
            default:
                break;
        }
        return $listWord;
    }
}
