<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Models\User;

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

    public function word()
    {
        return $this->belongsTo(Word::class);
    }

    public function createUserWord($request)
    {
        $userWordData = [
            'word_id' => $request->input('wordId'),
            'user_id' => Auth::user()->id,
        ];
        $this->create($userWordData);
    }

    public function getListWord($userId)
    {
        $listWord = $this->where('user_id', $userId)->get();

        return $listWord;
    }
}
