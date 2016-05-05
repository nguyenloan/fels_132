<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('relationships', function(Blueprint $table) {
			$table->foreign('follower_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
		Schema::table('relationships', function(Blueprint $table) {
			$table->foreign('follwing_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('words', function(Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('categories')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
		Schema::table('word_answers', function(Blueprint $table) {
			$table->foreign('word_id')->references('id')->on('words')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
		Schema::table('lesson_words', function(Blueprint $table) {
			$table->foreign('lesson_id')->references('id')->on('lessons')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
		Schema::table('lesson_words', function(Blueprint $table) {
			$table->foreign('word_id')->references('id')->on('words')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
		Schema::table('lesson_words', function(Blueprint $table) {
			$table->foreign('word_answer_id')->references('id')->on('word_answers')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
		Schema::table('activities', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
		Schema::table('lessons', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
		Schema::table('lessons', function(Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('categories')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('relationships', function(Blueprint $table) {
			$table->dropForeign('relationships_follower_id_foreign');
		});
		Schema::table('relationships', function(Blueprint $table) {
			$table->dropForeign('relationships_follwing_id_foreign');
		});
		Schema::table('words', function(Blueprint $table) {
			$table->dropForeign('words_category_id_foreign');
		});
		Schema::table('word_answers', function(Blueprint $table) {
			$table->dropForeign('word_answers_word_id_foreign');
		});
		Schema::table('lesson_words', function(Blueprint $table) {
			$table->dropForeign('lesson_words_lesson_id_foreign');
		});
		Schema::table('lesson_words', function(Blueprint $table) {
			$table->dropForeign('lesson_words_word_id_foreign');
		});
		Schema::table('lesson_words', function(Blueprint $table) {
			$table->dropForeign('lesson_words_word_answer_id_foreign');
		});
		Schema::table('activities', function(Blueprint $table) {
			$table->dropForeign('activities_user_id_foreign');
		});
		Schema::table('lessons', function(Blueprint $table) {
			$table->dropForeign('lessons_user_id_foreign');
		});
		Schema::table('lessons', function(Blueprint $table) {
			$table->dropForeign('lessons_category_id_foreign');
		});
	}
}