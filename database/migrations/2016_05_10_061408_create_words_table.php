<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWordsTable extends Migration {

    public function up()
    {
        Schema::create('words', function(Blueprint $table) {
            $table->increments('id');
            $table->string('content');
            $table->integer('category_id')->unsigned();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('words');
    }
}
