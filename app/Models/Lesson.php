<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //
    protected $table="lessons";

    protected $fillable = [
        'user_id', 'category_id','result',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
