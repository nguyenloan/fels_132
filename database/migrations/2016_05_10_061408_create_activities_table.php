<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActivitiesTable extends Migration {

    public function up()
    {
        Schema::create('activities', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('action_type');
            $table->integer('target_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('activities');
    }
}
