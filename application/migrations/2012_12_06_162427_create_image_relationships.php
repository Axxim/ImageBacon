<?php

class Create_Image_Relationships {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create relationship
		Schema::table('images', function($table)
		{
			$table->integer('user_id')->index()->unsigned()->nullable();

			$table->foreign('user_id')->references('id')->on('users')->on_update('cascade');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('images', function($table)
		{
			$table->drop_column('user_id');

			$table->drop_foreign('images_user_id_foreign');
		});
	}

}