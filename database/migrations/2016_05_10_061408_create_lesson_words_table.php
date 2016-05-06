<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLessonWordsTable extends Migration {

    public function up()
    {
        Schema::create('lesson_words', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('lesson_id')->unsigned();
            $table->integer('word_id')->unsigned();
            $table->integer('word_answer_id')->unsigned();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('lesson_words');
    }
}
