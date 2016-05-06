<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserWordsTable extends Migration {

    public function up()
    {
        Schema::create('user_words', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('word_id');
            $table->integer('user_id');
        });
    }

    public function down()
    {
        Schema::drop('user_words');
    }
}
