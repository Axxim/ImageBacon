<?php

class User_Controller extends Base_Controller 
{
	
	public $restful = true;

	public function get_index() 
	{

	}

	public function get_user($username)
	{
		$user = User::where_username($username)->first();
		$images = Image::where_user_id($user->id)->get();

		return View::make('user.user', array('user' => $user, 'images' => $images));
	}

}