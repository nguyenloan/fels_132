<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLessonsTable extends Migration {

	public function up()
	{
		Schema::create('lessons', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('category_id')->unsigned();
			$table->string('result');
			$table->timestamps();
			//$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('lessons');
	}
}