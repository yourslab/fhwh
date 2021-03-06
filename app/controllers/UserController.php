<?php

class UserController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| User Controller
	|--------------------------------------------------------------------------
	|
	| Registers the user and handles messaging.
	|
	|
	*/

	protected function registerUserEmail() {

		Session::put('email', Input::get('email'));

		//make the rules for form validation
		$rules = array(
            'email'   => 'required|email|unique:users',
            'captcha' => 'honeypot', //honeypot validator: makes sure honeypot field is empty (prevents spammers)
            'count'   => 'required|honeytime:0' //honeytime validator: makes sure that email field isn't filled in only one second
        );

        $betterLabels = array(
            'email' => 'Email'
        );

        $validator = Validator::make(Input::all(), $rules); //validate all inputs with the $rules array
        $validator->setAttributeNames($betterLabels); //configure error labels

        if ($validator->fails()) { //if there are errors
        	$messages = $validator->messages(); //assign error messages to $messages variable
        	return Response::json(array(
        		'errors' => $messages->all() //send error back to javascript
        	));
        } else if ($validator->passes()) { //if there are no errors
        	//write input to database
        	$user = new User;
        	$user->email = Input::get('email');
        	$user->save();

        	return Response::json(array(
        		'success' => 1, //send success back to javascript
        	));
        }
        
	}

	protected function registerUserType() {
		if(Session::has('email')) {
			$rule = array(
			'type' => 'required|numeric|between:0,3'
			);
			$validator = Validator::make(Input::all(), $rule);
			if ($validator->passes()) {
	        	$session_email = Session::get('email');
	        	$user = new User;
	        	$user = User::where('email', '=', $session_email)->update(array('type' => Input::get('type')));
        	} else {
        		App::abort(403, 'Errors found');
        	}
        } else {
        	App::abort(403, 'No session found');
        }
	}

	protected function registerMessage() {

		//extra security for message type
		$validMessageTypes = array("contact", "suggest");
		if (!in_array(Input::get('message-type'), $validMessageTypes)) {
			App::abort(403, 'Invalid message type');
		}

		//make the rules for form validation
		$rules = array(
            'name'         => 'required',
            'email'        => 'required|email',
            'message'      => 'required|min:5',
            'message-type' => array('required', 'regex:/^((contact)|(suggest))$/'), //array here because of regex conflict with | character 
            'captcha'      => 'honeypot', //honeypot validator: makes sure honeypot field is empty (prevents spammers)
            'count'        => 'required|honeytime:5' //honeytime validator: makes sure that the message form isn't filled in only five seconds (prevents spammers)
        );

		//create custom labels for the error messages
        $betterLabels = array(
            'name'    => 'Name',
            'email'   => 'Email'
        );

        if (Input::get('message-type') === 'contact') {
            $betterLabels += array('message' => 'Message'); //change error label of textbox to message
        } else if (Input::get('message-type') === 'suggest') {
        	$betterLabels += array('message' => 'Suggestion'); //change error label of textbox to suggestion
        }

        $validator = Validator::make(Input::all(), $rules); //validate all inputs with the $rules array
        $validator->setAttributeNames($betterLabels); //configure error labels

        if ($validator->fails()) { //if there are errors
        	$messages = $validator->messages(); //assign error messages to $messages variable
        	return Response::json(array(
        		'errors' => $messages->all() //send error back to javascript
        	));
        } else if ($validator->passes()) { //if there are no errors
        	//write input to database
        	if (Input::get('message-type') === 'contact') { //if contact form
        		$message = new Contact;
        	} else if (Input::get('message-type') === 'suggest') { //if suggest form
        		$message = new Suggest;
        	}

        	$message->name    = Input::get('name');
        	$message->email   = Input::get('email');
        	$message->message = Input::get('message');

        	$message->save();

        	return Response::json(array(
        		'success' => 1 //send success back to javascript
        	));
        }

	}

}