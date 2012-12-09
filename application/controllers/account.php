<?php

class Account_Controller extends Base_Controller
{

    public $restful = true;


    public function get_login()
    {
        return View::make('account.login', array('title' => 'Login'));
    }

    public function post_login()
    {
        $rules = array(
            'username' => 'required|min:2|max:25|alpha_num',
            'password' => 'min:6|max:128'
        );

        $input = Input::all();
        $validation = Validator::make($input, $rules);


        if ($validation->fails()) {
            return Redirect::to_action('account.login')->with_errors($validation->errors);
        }

        // Validation worked, let's try authing!
        $credentials = array('username' => $input['username'], 'password' => $input['password']);

        if (Auth::attempt($credentials)) {
            return Redirect::to_action('home');
        } else {
        	return Redirect::to_action('account.login')->with_errors($validation->errors);
        }
    }

    public function get_register()
    {
        return View::make('account.register', array('title' => 'Register'));
    }

    public function post_register()
    {
        $rules = array(
            'username' => 'required|min:2|max:25|alpha_num|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'min:6|max:128|same:password_confirm'
        );

        $input = Input::all();

        $validation = Validator::make($input, $rules);

        if ($validation->fails()) {
            return Redirect::to_action('account.register')->with_errors($validation->errors);
        }

        // Validation passed, let's register the user and send them an email to confirm!
        $user = new User();

        $user->username = $input['username'];
        $user->email = $input['email'];
        $user->password = Hash::make($input['password']);

        $user->save();

        $credentials = array('username' => $input['username'], 'password' => $input['password']);

		if (Auth::attempt($credentials)) {
		    return Redirect::to_action('home');
		} else {
			Log::write('error', 'User couldn\'t be logged in after register.');
		}
    }

    public function get_logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }

    public function get_forgot($code = null)
    {
        if($code != null) {
            // We might have a code
        } else {
            // No code, they want to reset

            return View::make('account.forgot');
        }
    }

    public function post_forgot()
    {
        // Send their code

        $input = Input::all();


    }

}
