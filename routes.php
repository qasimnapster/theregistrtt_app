<?php


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	if (Auth::check()) {
		// The user is logged in...
		// var_dump( Auth::user()->first_name . ' ' . Auth::user()->last_name );
		// exit;
	}
	$reg_types = DB::table('registry_types')->select()->get();
    return view('home', [ 'reg_types' => $reg_types ]);
});

Route::get('/logout', function () {
	if (Auth::check())
		Auth::logout();

	return Redirect::to('/');
});

Route::get('/about-us', function () {
	$reg_types = DB::table('registry_types')->select()->get();
    return view('about-us', [ 'reg_types' => $reg_types ]);
});

Route::get('/products', function () {
	$reg_types = DB::table('registry_types')->select()->get();
    return view('products', [ 'reg_types' => $reg_types ]);
});

Route::post('/signup', function () {
	
	$reg_type   = strlen( Input::get('xslcRegType') ) > 0 ? Input::get('xslcRegType') : 'N/A';
	$first_name = strlen( Input::get('xtxtFirstName') ) > 0 ? Input::get('xtxtFirstName') : 'N/A';
	$last_name  = strlen( Input::get('xtxtLastName') ) > 0 ? Input::get('xtxtLastName') : 'N/A';
	$email_addr = strlen( Input::get('xemlEmailAddr') ) > 0 ? Input::get('xemlEmailAddr') : 'N/A';
	$password   = strlen( Input::get('xpsPassword') ) > 0 ? Input::get('xpsPassword') : 'N/A';

	$encrypted_pass = Hash::make( $password );

	$verf_customer = DB::table('customers')->select()->where('email_address', '=', $email_addr)->get();
	
	if( count( $verf_customer ) == 0 )
	{
		$insertion = DB::table('customers')->insertGetId(
			[ 
				'first_name'       => $first_name,
				'last_name'        => $last_name,
				'email_address'    => $email_addr,
				'password'         => $encrypted_pass,
				'registry_type_id' => $reg_type
			]
		);
		if( $insertion )
			return Response::json(array('message' => 'Successfully signed up'));
		else
			return Response::json(array('message' => 'Something went wrong'));
	} else 
	{
		return Response::json(array('message' => 'Already exists'));
	}

});

Route::post('/login', array('uses' => 'LoginController@doLogin'));

Route::any('/profile', function () {
	
	$reg_types = DB::table('registry_types')->select()->get();

	$updation = 0;

	if( count( Input::all() ) > 0 )
	{
		$first_name  = Input::get('xtxtCustFirstName');
		$last_name   = Input::get('xtxtCustLastName');
		$address_1   = Input::get('xtxtAddress1');
		$address_2   = Input::get('xtxtAddress2');
		$postal_code = Input::get('xtxtPostalcode');
		$state       = Input::get('xtxtState');
		$city        = Input::get('xtxtCity');
		$country     = Input::get('xtxtCountry');

		$updation = DB::table('customers')
            ->where('id', Auth::user()->id)
            ->update([
				'first_name'  => $first_name,
				'last_name'   => $last_name,
				'address_1'   => $address_1,
				'address_2'   => $address_2,
				'postal_code' => $postal_code,
				'state'       => $state,
				'city'        => $city,
				'country'     => $country
            ]);
	}

    return view('profile-setting', [
    	'reg_types' => $reg_types,
    	'customer'  => Auth::user(),
    	'updation'  => $updation
    ]);
});

//