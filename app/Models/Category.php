<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = "categories";

    protected $fillable = [
        'name',
    ];

    public function lesson(){
        return $this->hasMany(Lesson::class);
    }

    public function word()
    {
        return $this->hasMany(Word::class);
    }
}
