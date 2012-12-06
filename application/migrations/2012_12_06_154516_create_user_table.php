<?php

class Create_User_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		// create users table
        Schema::table('users', function($table)
        {
            $table->create();
            $table->increments('id');
            $table->string('username');
            $table->string('password');
            $table->string('email');
            $table->integer('group');
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
		// drop users
        Schema::drop('users');
	}

}