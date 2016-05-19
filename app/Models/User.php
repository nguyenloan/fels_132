<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Activity;
use App\Models\Lesson;
use App\Models\UserWord;
use App\Models\Relationship;
use Hash;
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    const ROLE_MEMBER = 1;
    protected $fillable = ['name', 'email', 'avatar', 'password',];

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

    public function getLinkReset($token)
    {
        $link = url('password/reset', $token) . '?email=' . urlencode($this->getEmailForPasswordReset());
        return $link;
    }

    public function followers()
    {
        return $this->hasMany(Relationship::class, 'following_id');
    }

    public function followings()
    {
        return $this->hasMany(Relationship::class, 'follower_id');
    }

    public function updateUser($request)
    {
        $imagePath = public_path('uploads/image');
        $image = $request->file('avatar');
        $fileName = $image->getClientOriginalName();
        if (!empty($image)) {
            $image->move($imagePath, $fileName);
        }
        $userData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'avatar' => $fileName,
        ];
        $this->update($userData);
    }

    public function updatePassword($password)
    {
        $this->password = Hash::make($password);
        $this->save();
    }
}
