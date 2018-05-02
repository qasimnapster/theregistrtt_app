<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    public function doLogin()
    {
        // validate the info, create rules for the inputs
        $rules = array(
            // 'email'    => 'required|email', // make sure the email is an actual email
            // 'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
            'email'    => 'required|email',
            'password' => 'required|min:3;'
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form

        if ($validator->fails()) {
            // var_dump( $validator->errors()->all() );
            // exit;
            return Redirect::to('/')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {

            // create our customer data for the authentication
            $customer_data = array(
                'email_address' => Input::get('email'),
                'password'      => Input::get('password')
            );

            // attempt to do the login
            if (Auth::attempt($customer_data)) {
                $user = Auth::user();
                //var_dump( $user );
                Auth::login($user);
                // validation successful!
                // redirect them to the secure section or whatever
                // return Redirect::to('secure');
                // for now we'll just echo success (even though echoing in a controller is bad)
                return Redirect::to('/');

            } else {        

                // validation not successful, send back to form 
                return Redirect::to('/')->withErrors(['Incorrect Email/Password']);

            }

        }
    }
}
