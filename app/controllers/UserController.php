<?php

class UserController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	protected function registerUser() {
		return "View::make('index');";
	}

	protected function registerMessage() {

		$rules = array(
               	'contact-name'    => 'required',
                'contact-email'   => 'required|min:3',
                'contact-message' => 'required|min:5',
                'message-type'    => 'required'
        );



        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
        	return "shit!";
        }

	}
	
}