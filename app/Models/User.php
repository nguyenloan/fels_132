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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function lessons()
    {
        return $this-> hasMany(Lesson::class);
    }

    public function userWords()
    {
        return $this->hasMany(UserWord::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}
