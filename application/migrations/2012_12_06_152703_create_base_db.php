<?php

class Create_Base_Db {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('images', function($table)
		{
			$table->create();
			$table->string('id')->primary();
			$table->string('file_name');
			$table->string('file_name_old');
			$table->integer('file_size');
			$table->string('file_type');
			$table->string('file_tmp');
			$table->boolean('public');
			$table->boolean('nsfw');
			$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('images');
	}

}