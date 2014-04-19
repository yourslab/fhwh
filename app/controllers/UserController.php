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

		//make the rules for form validation
		$rules = array(
            'contact-name'    => 'required',
            'contact-email'   => 'required|email|min:3',
            'contact-message' => 'required|min:5',
            'message-type'    => array('required', 'regex:/^((contact)|(suggest))$/')
        );

		//create custom labels for the error messages
        $betterLabels = array(
            'contact-name'    => 'Name',
            'contact-email'   => 'Email',
            'contact-message' => 'Message',
        );

        $validator = Validator::make(Input::all(), $rules); //validate all inputs with get
        $validator->setAttributeNames($betterLabels); 

        if ($validator->fails()) { //if there are errors
        	$messages = $validator->messages(); //assign error messages to $messages variable
        	return Response::json(array(
        		'errors' => $messages->all() //send error back to javascript
        	));
        } else if ($validator->passes()) { //if there are no errors
        	return Response::json(array(
        		'success' => 1, //send success back to javascript
        	));
        }

	}

	protected static function mico() {
		return "Hello World!";
	}
	
}