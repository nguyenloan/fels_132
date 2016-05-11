<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

    public function up()
    {
        Schema::create('users', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('avatar');
            $table->string('password');
            $table->string('remember_token');
            $table->integer('role')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('users');
    }
}
