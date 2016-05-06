<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    //
    protected $table="words";

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
}
