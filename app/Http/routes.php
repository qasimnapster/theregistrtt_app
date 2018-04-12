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

Route::get('/categories/{type}', function ($type) {
	$reg_types           = DB::table('registry_types')->select()->get();
	if( $type == 'all' )
	{
		$products = DB::table('products')->orderBy('title', 'asc')->select()->get();
	} else 
	{
		$cat_id = DB::table('categories')->where('slug', '=', $type)->select('id')->get();
		$category_id = $cat_id[0]->id;

		$products = DB::table('products as p')
		->select('p.*')
		->leftJoin('products_categories as apc', 'p.id', '=', 'apc.product_id')
		->where(['apc.category_id' => $category_id])
		->orderBy('p.title', 'ASC')
		->get();

	}
	
	$categories = DB::table('categories')->select()->get();
    return view('categories', [ 
		'reg_types'  => $reg_types,
		'products'   => $products,
		'categories' => $categories
    ]);
});

Route::post('/signup', function () {

	// try {
	// 	Mail::send('emails.welcome', [], function ($message) {
	// 		$message->from('tester.registrytt@gmail.com', 'Testing - email verification');

	// 		$message->to('qasimnepster@gmail.com');
	// 	});
	// } catch(Exception $e) {
	// 	echo $e->getMessage();
	// }

	
 //    exit;
	
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

Route::post('/registry/delete', function(){

	if ( ! Auth::check())
		return Redirect::to('/');

	if( count( Input::all() ) > 0 )
	{	

		$registry_id = Input::get('registry_id');
		$customer_id = Input::get('customer_id');

		if( Auth::user()->id == $customer_id )
		{

			if( $registry_id == Cookie::get('latest_registry_id') )
			{
				Cookie::queue(
					Cookie::forget('latest_registry_id')
				);
			}

			return DB::table('registeries')->where( ['id'=>$registry_id,'customer_id'=>$customer_id] )->delete();
		}
	}
});

Route::get('/registry/index', function(){

	if ( ! Auth::check())
		return Redirect::to('/');
	
	$reg_types   = DB::table('registry_types')->select()->get();
	$registeries = DB::table('registeries')->where('customer_id', Auth::user()->id )->select()->get();

	if( count( $registeries ) > 0 ):
		foreach( $registeries as $reg ):
			$reg->registry_status = DB::table('registry_status')->where('id', $reg->registry_status_id )->select('name')->get()[0];
			$reg->ocassion = DB::table('ocassions')->where('id', $reg->ocassion_id )->select('title')->get()[0];
		endforeach;
	endif;
	// var_dump( $registeries[0]-> );
	// exit;

	return view( 'registry.index', [
		'reg_types'   => $reg_types,
		'registeries' => $registeries
    ]);

});

Route::post('/create/registry/store', function () {

	if ( ! Auth::check())
		return Redirect::to('/');

	$forver = time() + (10 * 365 * 24 * 60 * 60);

	if( count( Input::all() ) > 0 )
	{

		//var_dump( Input::all() );

		$step = request('step');

		$latest_registry_id = Cookie::get('latest_registry_id');

		if( count( Input::all() ) > 0 )
		{

			if( $step == 1 )
			{
		
				if( $latest_registry_id )
					return Redirect::to('/create/registry/2');	
				
				$ocassion_id      = request('xtxtOccs');

				if( $ocassion_id == 1 )
					$filler_names = request('xtxtCoupleNames');
				else
					$filler_names = request('xtxtYourNames');

				$del_pref         = request('xrdoDelPref');
				$first_name       = $filler_names[0];
				$last_name        = $ocassion_id == 1 ? 'N/A' : $filler_names[1];
				$partner_name     = $ocassion_id == 1 ? $filler_names[1] : 'N/A';
				$event_date       = request('xtxtEventDate');
				$shipping_fname   = request('xtxtShippingFirstName');
				$shipping_lname   = request('xtxtShippingLastName');
				$shipping_addr1   = request('xtxtAddress1');
				$shipping_addr2   = request('xtxtAddress2');
				$shipping_zipcode = request('xtxtZipcode');
				$shipping_city    = request('xtxtCity');
				$shipping_state   = request('xtxtState');
				$shipping_country = request('xslsCountry');
				$shipping_pnum    = request('xtxtShippingPhoneNumber');
				$customer_id      = Auth::user()->id;
				$registry_title   = $ocassion_id;

				var_dump( Auth::user()->id );

				$inserted_registry_id = DB::table('registeries')->insertGetId([ 
					'customer_id'            => $customer_id,
					'ocassion_id'            => $ocassion_id,
					'title'                  => $registry_title,
					'first_name'             => $first_name,
					'last_name'              => $last_name,
					'partner_name'           => $partner_name,
					'event_date'             => $event_date,
					'delivery_preference_id' => $del_pref,
					'registry_status_id'    => 1
				]);

				var_dump( $inserted_registry_id );

				if( $del_pref == 1 && $inserted_registry_id )
				{
					$insertion_shippings = DB::table('customers_shipping_info')->insertGetId([ 
						'customer_id'  => $customer_id,
						'registry_id'  => $inserted_registry_id,
						'first_name'   => $shipping_fname,
						'last_name'    => $shipping_lname,
						'address_1'    => $shipping_addr1,
						'address_2'    => $shipping_addr2,
						'postal_code'  => $shipping_zipcode,
						'state_id'     => 1,
						'city_id'      => 1,
						'country_id'   => $shipping_country,
						`phone_number` => $shipping_pnum
					]);

					var_dump( $insertion_shippings );
				}

				Cookie::queue('latest_registry_id', $inserted_registry_id, $forver);
				return Redirect::to('/create/registry/2');
				
			
			}

			if( $step == 2 )
			{

				$product_ids = request('products_id');

				if( ! $latest_registry_id )
					return Redirect::to('/');

				if( count( $product_ids ) > 0 )
				{
					foreach( $product_ids as $product_id ):
						if( $product_id ):
							DB::table('registeries_products')->insertGetId([ 
								'registry_id' => $latest_registry_id,
								'product_id'  => $product_id
							]);
						endif;
					endforeach;
				}

				Cookie::queue('alot_promo_code',true, $forver);
				return Redirect::to('/create/registry/3');	
				
			}
		}
	}

});

Route::any('/create/registry/{step}', function ($step) {

	if ( ! Auth::check())
		return Redirect::to('/');
	
	$reg_types  = DB::table('registry_types')->select()->get();

	$products      = [];
	$categories    = [];
	$ocassions     = [];
	$delivery_pref = [];
	$countries     = [];
	$states        = [];
	$cities        = [];

	$sort_by_cat   = '';
	$sort_by_price = '';
	$sort_by_alpha = '';
	$promo_code    = '';

	if( $step == 1 )
	{
		$ocassions     = DB::table('ocassions')->select()->get();
		$delivery_pref = DB::table('gift_delivery_preference')->select()->get();

		$countries = DB::table('countries')->orderBy('name', 'asc')->select()->get();
		// $states    = DB::table('states')->orderBy('name', 'asc')->select()->get();
		// $cities    = DB::table('cities')->orderBy('name', 'asc')->select()->get();
	}

	if( $step == 2 )
	{

		$categories = DB::table('categories')->select()->get();

		if( count( Input::all() ) > 0 )
		{
			$sort_by_cat   = request('xslcCat');
			$sort_by_price = request('xslcSortByPrice');
			$sort_by_alpha = request('xslcSortByAlpha');

			$product_inst = DB::table('products as p')
			->select('p.*')
			->leftJoin('products_categories as apc', 'p.id', '=', 'apc.product_id');

			if( strlen( $sort_by_cat ) > 0 )
			{
				$category_id = $sort_by_cat;
				$product_inst->where(['apc.category_id' => $category_id]);
			}
			//var_dump( $sort_by_price );
			if( $sort_by_price == '1' )
				$product_inst->orderByRaw('CAST(trtt_p.price AS DECIMAL(10,2)) DESC');
			else if( $sort_by_price == '2' )
				$product_inst->orderByRaw('CAST(trtt_p.price AS DECIMAL(10,2)) ASC');

			if( $sort_by_alpha == '1' )
				$product_inst->orderBy('p.title', 'ASC');
			else if( $sort_by_alpha == '2' )
				$product_inst->orderBy('p.title', 'DESC');

			$products = $product_inst->get();
			// var_dump( $products );
			// exit;
			
		} else 
		{
			$products = DB::table('products')->orderBy('title', 'asc')->select()->get();
		}
	}

	if( $step == 3 )
	{

		$latest_registry_id = Cookie::get('latest_registry_id');
		$alot_promo_code    = Cookie::get('alot_promo_code');
		
		if( ! $latest_registry_id  )
			return Redirect::to('/');

		if( ! $alot_promo_code  )
			return Redirect::to('/create/registry/1');

		function generate_promo_code( $size = 6 )
		{
			$alpha_key = '';
			$keys      = range('A', 'Z');

			for ($i = 0; $i < 2; $i++)
				$alpha_key .= $keys[array_rand($keys)];

			$length = $size - 2;
			$key    = '';
			$keys   = range(0, 9);

			for ($i = 0; $i < $length; $i++)
				$key .= $keys[array_rand($keys)];
			
			return $alpha_key . $key;
		}

		$promo_code = generate_promo_code();

		DB::table('registeries')->where('id', $latest_registry_id)->update([
			'promo_code'          => $promo_code,
			'registry_status_id' => 2
		]);

		Cookie::queue(
			Cookie::forget('alot_promo_code')
		);

		Cookie::queue(
			Cookie::forget('latest_registry_id')
		);

	}

	return view('create-registry-' . $step, [
		'reg_types'     => $reg_types,
		'products'      => $products,
		'categories'    => $categories,
		'sort_by_cat'   => $sort_by_cat,
		'sort_by_price' => $sort_by_price,
		'sort_by_alpha' => $sort_by_alpha,
		'promo_code'    => $promo_code,
		'ocassions'     => $ocassions,
		'delivery_pref' => $delivery_pref,
		'countries'     => $countries,
		'states'        => $states,
		'cities'        => $cities
    ]);

});

Route::post('/edit/registry/store/{edit_id}', function ($edit_id) {

	if ( ! Auth::check())
		return Redirect::to('/');

	$forver = time() + (10 * 365 * 24 * 60 * 60);

	if( count( Input::all() ) > 0 )
	{

		//var_dump( Input::all() );

		$step = request('step');

		if( count( Input::all() ) > 0 )
		{

			if( $step == 1 )
			{
				
				$ocassion_id      = request('xtxtOccs');

				if( $ocassion_id == 1 )
					$filler_names = request('xtxtCoupleNames');
				else
					$filler_names = request('xtxtYourNames');

				$del_pref         = request('xrdoDelPref');
				$first_name       = $filler_names[0];
				$last_name        = $ocassion_id == 1 ? 'N/A' : $filler_names[1];
				$partner_name     = $ocassion_id == 1 ? $filler_names[1] : 'N/A';
				$event_date       = request('xtxtEventDate');
				$shipping_fname   = request('xtxtShippingFirstName');
				$shipping_lname   = request('xtxtShippingLastName');
				$shipping_addr1   = request('xtxtAddress1');
				$shipping_addr2   = request('xtxtAddress2');
				$shipping_zipcode = request('xtxtZipcode');
				$shipping_city    = request('xtxtCity');
				$shipping_state   = request('xtxtState');
				$shipping_country = request('xslsCountry');
				$shipping_pnum    = request('xtxtShippingPhoneNumber');
				$customer_id      = Auth::user()->id;
				$registry_title   = $ocassion_id;

				var_dump( Auth::user()->id );

				$updated_registry_id = DB::table('registeries')->where('id',$edit_id)->update([ 
					'ocassion_id'            => $ocassion_id,
					'title'                  => $registry_title,
					'first_name'             => $first_name,
					'last_name'              => $last_name,
					'partner_name'           => $partner_name,
					'event_date'             => $event_date,
					'delivery_preference_id' => $del_pref,
					'updated_at'             => 'NOW()'
				]);

				var_dump( $updated_registry_id );

				if( $del_pref == 1 )
				{

					$num_rows_shipping = DB::table('customers_shipping_info')->where('registry_id', $edit_id)->select()->get();

					if( count( $num_rows_shipping ) == 0 ):

						$insertion_shippings = DB::table('customers_shipping_info')->insertGetId([ 
							'customer_id'  => $customer_id,
							'registry_id'  => $edit_id,
							'first_name'   => $shipping_fname,
							'last_name'    => $shipping_lname,
							'address_1'    => $shipping_addr1,
							'address_2'    => $shipping_addr2,
							'postal_code'  => $shipping_zipcode,
							'state_id'     => 1,
							'city_id'      => 1,
							'country_id'   => $shipping_country,
							'phone_number' => $shipping_pnum
						]);

					else:
						$updated_shippings = DB::table('customers_shipping_info')->where('registry_id',$edit_id)->update([ 
							'first_name'   => $shipping_fname,
							'last_name'    => $shipping_lname,
							'address_1'    => $shipping_addr1,
							'address_2'    => $shipping_addr2,
							'postal_code'  => $shipping_zipcode,
							'state_id'     => 1,
							'city_id'      => 1,
							'country_id'   => $shipping_country,
							'phone_number' => $shipping_pnum,
							'updated_at'   => 'NOW()'
						]);
					endif;

					//var_dump( $updated_shippings );
				}
				//Cookie::queue('edit_registry_id', $inserted_registry_id, $forver);
				return Redirect::to('/edit/registry/2/' . $edit_id);
			}

			if( $step == 2 )
			{

				$product_ids = request('products_id');

				if( count( $product_ids ) > 0 )
				{
					DB::table('registeries_products')->where('registry_id',$edit_id)->delete();

					foreach( $product_ids as $product_id ):
						if( $product_id ):
							DB::table('registeries_products')->insertGetId([ 
								'registry_id' => $latest_registry_id,
								'product_id'  => $product_id
							]);
						endif;
					endforeach;
				}

				return Redirect::to('/edit/registry/3/' . $edit_id);
				
			}
		}
	}

});

Route::any('/edit/registry/{step}/{edit_id}', function ($step, $edit_id) {

	if ( ! Auth::check())
		return Redirect::to('/');

	$edit_details = DB::table('registeries')->where('id', $edit_id)->select()->get();

	if( count( $edit_details ) == 0 )
		return Redirect::to('/registry/index');
	
	$reg_types  = DB::table('registry_types')->select()->get();

	$products          = [];
	$categories        = [];
	$ocassions         = [];
	$delivery_pref     = [];
	$countries         = [];
	$states            = [];
	$cities            = [];
	$shipping_detail   = [];
	$edit_products_ids = [];

	$sort_by_cat   = '';
	$sort_by_price = '';
	$sort_by_alpha = '';
	$promo_code    = '';

	if( $step == 1 )
	{
		$ocassions     = DB::table('ocassions')->select()->get();
		$delivery_pref = DB::table('gift_delivery_preference')->select()->get();

		$shipping_detail = DB::table('customers_shipping_info')->where('registry_id', $edit_id)->select()->first();


		$countries = DB::table('countries')->orderBy('name', 'asc')->select()->get();
		// $states    = DB::table('states')->orderBy('name', 'asc')->select()->get();
		// $cities    = DB::table('cities')->orderBy('name', 'asc')->select()->get();
	}

	if( $step == 2 )
	{

		$categories        = DB::table('categories')->select()->get();

		$edit_products_ids = DB::table('registeries_products')->where('registry_id', $edit_id)->select()->get();
		if( count( Input::all() ) > 0 )
		{
			$sort_by_cat   = request('xslcCat');
			$sort_by_price = request('xslcSortByPrice');
			$sort_by_alpha = request('xslcSortByAlpha');

			$product_inst = DB::table('products as p')
			->select('p.*')
			->leftJoin('products_categories as apc', 'p.id', '=', 'apc.product_id');

			if( strlen( $sort_by_cat ) > 0 )
			{
				$category_id = $sort_by_cat;
				$product_inst->where(['apc.category_id' => $category_id]);
			}
			//var_dump( $sort_by_price );
			if( $sort_by_price == '1' )
				$product_inst->orderByRaw('CAST(trtt_p.price AS DECIMAL(10,2)) DESC');
			else if( $sort_by_price == '2' )
				$product_inst->orderByRaw('CAST(trtt_p.price AS DECIMAL(10,2)) ASC');

			if( $sort_by_alpha == '1' )
				$product_inst->orderBy('p.title', 'ASC');
			else if( $sort_by_alpha == '2' )
				$product_inst->orderBy('p.title', 'DESC');

			$products = $product_inst->get();
			// var_dump( $products );
			// exit;
			
		} else 
		{
			$products = DB::table('products')->orderBy('title', 'asc')->select()->get();
		}
	}

	if( $step == 3 )
	{

		function generate_promo_code( $size = 6 )
		{
			$alpha_key = '';
			$keys      = range('A', 'Z');

			for ($i = 0; $i < 2; $i++)
				$alpha_key .= $keys[array_rand($keys)];

			$length = $size - 2;
			$key    = '';
			$keys   = range(0, 9);

			for ($i = 0; $i < $length; $i++)
				$key .= $keys[array_rand($keys)];
			
			return $alpha_key . $key;
		}

		$promo_code = generate_promo_code();

		DB::table('registeries')->where('id', $edit_id)->update([
			'promo_code'          => $promo_code,
			'registry_status_id'  => 2
		]);

	}

	return view('registry.edit-' . $step, [
		'reg_types'     => $reg_types,
		'products'      => $products,
		'categories'    => $categories,
		'sort_by_cat'   => $sort_by_cat,
		'sort_by_price' => $sort_by_price,
		'sort_by_alpha' => $sort_by_alpha,
		'promo_code'    => $promo_code,
		'ocassions'     => $ocassions,
		'delivery_pref' => $delivery_pref,
		'countries'     => $countries,
		'states'        => $states,
		'cities'        => $cities,
		'edit_details'  => $edit_details[0],
		'shipping_detail' => $shipping_detail,
		'edit_products_ids' => $edit_products_ids
    ]);

});

//