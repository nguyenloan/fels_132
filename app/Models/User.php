<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function lesson()
    {
        return $this->hasMany(Lesson::class);
    }

    public function userWord()
    {
        return $this->hasMany(UserWord::class);
    }

    public function activity()
    {
        return $this->hasMany(Activity::class);
    }
}
