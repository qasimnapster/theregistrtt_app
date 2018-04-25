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

use Illuminate\Cookie\CookieJar;
use Illuminate\Contracts\Cookie\Factory;


Route::get('/', function () {
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

Route::any('/categories/{type}', function ($type) {

	$reg_types = DB::table('registry_types')->select()->get();

	$sort_by_price = '';
	$sort_by_alpha = '';

	$sort_by_price = request('xslcSortByPrice');
	$sort_by_alpha = request('xslcSortByAlpha');

	$product_inst = DB::table('products as p');

	$max = $product_inst->max('price');
	$min = $product_inst->min('price');
	
	if( $type == 'all' )
	{
		if( count( Input::all() ) > 0 )
		{
			
			if( $sort_by_price == '1' )
				$product_inst->orderByRaw('CAST(price AS DECIMAL(10,2)) DESC');
			else if( $sort_by_price == '2' )
				$product_inst->orderByRaw('CAST(price AS DECIMAL(10,2)) ASC');

			if( $sort_by_alpha == '1' )
				$product_inst->orderBy('title', 'ASC');
			else if( $sort_by_alpha == '2' )
				$product_inst->orderBy('title', 'DESC');

			$products = $product_inst->select()->get();
		} else 
		{
			$products = DB::table('products')->orderBy('title', 'asc')->select()->get();
		}
	} else 
	{
		$cat_id = DB::table('categories')->where('slug', '=', $type)->select('id')->get();
		$category_id = $cat_id[0]->id;

		$product_inst->select('p.*')
		->leftJoin('products_categories as apc', 'p.id', '=', 'apc.product_id')
		->where(['apc.category_id' => $category_id]);

		if( $sort_by_price == '1' )
			$product_inst->orderByRaw('CAST(trtt_p.price AS DECIMAL(10,2)) DESC');
		else if( $sort_by_price == '2' )
			$product_inst->orderByRaw('CAST(trtt_p.price AS DECIMAL(10,2)) ASC');
		
		if( $sort_by_alpha == '1' )
			$product_inst->orderBy('p.title', 'ASC');
		else if( $sort_by_alpha == '2' )
			$product_inst->orderBy('p.title', 'DESC');
		
		$products = $product_inst->get();

	}
	
	$categories = DB::table('categories')->select()->get();
    return view('categories', [ 
		'reg_types'     => $reg_types,
		'products'      => $products,
		'categories'    => $categories,
		'sort_by_price' => $sort_by_price,
		'sort_by_alpha' => $sort_by_alpha,
		'max'           => $max,
		'min'           => $min
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
		$address_2   = Input::get('xtxtAddress2');;
		$city        = Input::get('xtxtCity');
		$country     = Input::get('xtxtCountry');

		$updation = DB::table('customers')
            ->where('id', Auth::user()->id)
            ->update([
				'first_name'  => $first_name,
				'last_name'   => $last_name,
				'address_1'   => $address_1,
				'address_2'   => $address_2,
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
			DB::table('registeries')->where([
				'id'          => $registry_id,
				'customer_id' => $customer_id
			])->delete();
			DB::table('customers_shipping_info')->where( 'registry_id', $registry_id )->delete();
			DB::table('registeries_products')->where( 'registry_id', $registry_id )->delete();
			DB::table('guests')->where( 'registry_id', $registry_id )->delete();
			DB::table('guest_transactions')->where( 'registry_id', $registry_id )->delete();
			return DB::table('guest_purchase_detail')->where( 'registry_id', $registry_id )->delete();
		}
	}
});

Route::post('/guest/store', function(){
	if ( Auth::check() )
		return Redirect::to('/');

	$registry_id = request('registry_id');

	if ( ! $registry_id )
		return Redirect::to('/');

	// if( ! session()->has('guest_cart') )
	// {
		session()->put('guest_cart', [['registry_id' => $registry_id, 'products' => []]]);
		session()->put('registry_selected', $registry_id);
	// }
	// else
	// {
	// 	$cart_arr = session()->get('guest_cart');
	// 	$reg_ids = [];

	// 	foreach( $cart_arr as $item )
	// 		$reg_ids[] = $item['registry_id'];
		
	// 	if( in_array( $registry_id, $reg_ids ) == false ):
	// 		$cart_arr[count( $cart_arr )] = ['registry_id' => $registry_id, 'products' => []];
	// 		session()->put('guest_cart', $cart_arr);
	// 		session()->put('registry_selected', $registry_id);
	// 	endif;
	// }
	return Redirect::to('/guest/shopping');

});

Route::get('/guest/shopping', function(){
	if ( Auth::check() )
		return Redirect::to('/');

	$guest_cart        = session()->has('guest_cart') ? session()->get('guest_cart') : [];
	$registry_selected = session()->has('registry_selected') ? session()->get('registry_selected') : [];
	$view_id           = $registry_selected;

	$products = [];
	$_pids    = [];
	$cart_pqs = [];

	$registry_detail   = DB::table('registeries')->where('id',$view_id)->select()->get();

	if( count( $registry_detail ) > 0 )
	{
		$reg_types         = DB::table('registry_types')->select()->get();
		$edit_products_ids = DB::table('registeries_products')->where('registry_id', $view_id)->select()->get();

		$qtys     = [];
		$rec_qtys = [];

		if( count( $edit_products_ids ) > 0 )
		{
			foreach( $edit_products_ids as $epid ):
				$_pids[]                     = $epid->product_id;
				$qtys[$epid->product_id]     = $epid->qty;
				$rec_qtys[$epid->product_id] = $epid->received;
			endforeach;
			$products = DB::table('products')->whereIn('id', $_pids)->get();
		}

		if( count( $guest_cart ) > 0 )
		{
			foreach($guest_cart as $item)
			{
				if( $item['registry_id'] == $registry_selected )
				{
					if( count( $item['products'] ) > 0 )
					{
						foreach( $item['products'] as $p )
							$cart_pqs[$p['id']] = $p['qty'];
					}
					break;
				}	
			}	
		}
		return view('guest.shopping', [
			'reg_types'       => $reg_types,
			'products'        => $products,
			'registry_detail' => $registry_detail[0],
			'qtys'            => $qtys,
			'rec_qtys'        => $rec_qtys,
			'cart_pqs'        => $cart_pqs
	    ]);
	} else {
		return response()->view('errors.503',[],503);
	}

});

Route::post('/guest/checkout/process/store', function(){
	
	$post_data  = Input::all();

	$guest_fname = request('xtxtGuestFirstName');
	$guest_lname = request('xtxtGuestLastName');
	$guest_eaddr = request('xtxtGuestEmailAddress');
	$guest_anony = null !== request('xchckAnonymous') ? request('xchckAnonymous') : false;
	$guest_gwrap = null !== request('xchckWrap') ? request('xchckWrap') : false;
	if( ! $guest_gwrap && session()->get('note_for_guest') )
		$guest_gwrap = true;

	$guest_cart = session()->has('guest_cart') ? session()->get('guest_cart') : [];
	if( count( $post_data ) > 0 && $guest_cart )
	{

		foreach( $guest_cart as $item )
		{
			$registry_id = $item['registry_id'];

			$guest_id = DB::table('guests')->insertGetId([
				'first_name'    => $guest_fname,
				'last_name'     => $guest_lname,
				'email_address' => $guest_eaddr,
				'info_secret'   => $guest_anony,
				'wrap_gift'     => $guest_gwrap ? $guest_gwrap : $guest_gwrap,
				'note'          => session()->get('note_for_guest'),
				'registry_id'   => $registry_id
			]);

			$products    = $item['products'];
			$total_product_prices = 0;
			foreach( $products as $product )
			{
				$pd = DB::table('guest_purchase_detail')->insertGetId([
					'guest_id'      => $guest_id,
					'registry_id'   => $registry_id,
					'product_id'    => $product['id'],
					'qty'           => $product['qty']
				]);

				$price   = DB::table('products')->where('id',$product['id'])->select('price')->first();
				
				$received = DB::table('registeries_products')->where('product_id',$product['id'])->where('registry_id',$registry_id)->select('received')->first();
				
				DB::table('registeries_products')->where([
					'registry_id' => $registry_id,
					'product_id'  => $product['id']
				])->update([ 
					'received' => ($product['qty']+$received->received)
				]);

				$total_product_prices += $price->price;
				// var_dump( $pd );
				// var_dump( $total_product_prices );
			}

			$rp_purchased = DB::table('registeries_products')->where('registry_id',$registry_id)->whereRaw('qty = received')->select()->get();
			$rp_all = DB::table('registeries_products')->where('registry_id',$registry_id)->select()->get();

			if( count( $rp_all ) == count( $rp_purchased )  )
			{
				DB::table('registeries')->where([
					'id' => $registry_id
				])->update([ 
					'registry_status_id' => 4
				]);
			}

			$txn = DB::table('guest_transactions')->insertGetId([
				'guest_id'     => $guest_id,
				'registry_id'  => $registry_id,
				'total_amount' => ($total_product_prices + session()->get('applicable_fee'))
			]);

			$registry_customer = DB::table('registeries')->where('id',$registry_id)->select('customer_id')->first();

			$customer_id = $registry_customer->customer_id;

			$customer = DB::table('customers')->where('id',$customer_id)->select('email_address')->first();

			Mail::send('emails.gift_purchased', [$customer], function($message) use ($customer) {
		        $message->from('theregistrytt1@gmail.com');
		        $message->to($customer->email_address);
		        $message->subject('Gift Purchased');
		    });
			//var_dump( $txn );
		}
		
		session()->forget('guest_cart');
		session()->forget('registry_selected');
		session()->put('completed_purchasing', true);
		return Redirect::to('/checkout/process/completed');
	} else
	{
		return response()->view('errors.503',[],503);
	}
	
});

Route::any('/checkout/process/completed', function(){
	$reg_types = DB::table('registry_types')->select()->get();
	if( session()->has('completed_purchasing') )
	{
		return view('guest.cart.complete', [
			'reg_types' => $reg_types
	    ]);
	}
	return response()->view('errors.503',[],503);
});

Route::any('/guest/cart/checkout/view', function(){
	
	$reg_types = DB::table('registry_types')->select()->get();

	$applicable_fee   = 0;
	session()->put('applicable_fee', $applicable_fee );
	$do_gift_wrapping = null !== request('xtxtDoGiftWrapping') ? request('xtxtDoGiftWrapping') : false;
	$note_for_guest   = null !== request('xtxtNoteForGuest') ? request('xtxtNoteForGuest') : false;
	if( $do_gift_wrapping )
	{
		$applicable_fee = 10;
		session()->put('applicable_fee', $applicable_fee );
	}

	session()->put('note_for_guest', $note_for_guest );

	if( session()->has('guest_cart') )
	{

		$guest_cart = session()->get('guest_cart');	
		$pids = [];
		foreach( $guest_cart as $item )
		{	
			$products = $item['products'];
			if( count( $products ) > 0 )
			{
				foreach( $products as $product )
					$pids[] = $product['id'];
			}
		}
		$products = DB::table('products')->whereIn('id', $pids)->get();

		return view('guest.cart.checkout', [
			'reg_types'        => $reg_types,
			'products'         => $products,
			'note_for_guest'   => $note_for_guest,
			'do_gift_wrapping' => $do_gift_wrapping,
			'applicable_fee'   => $applicable_fee
	    ]);
	} else
	{
		return response()->view('errors.503',[],503);
	}

});

Route::get('/guest/cart/index', function(){
	
	$reg_types = DB::table('registry_types')->select()->get();
	
	$guest_cart_data         = session()->has('guest_cart') ? session()->get('guest_cart') : [];
	$guest_selected_registry = session()->has('registry_selected') ? session()->get('registry_selected') : [];

	$cart_synced_data = [];
	$qtys = [];

	foreach($guest_cart_data as $item):
		$pids = [];
		if( count( $item['products'] ) > 0 ):
			foreach( $item['products'] as $pitem ):
				$pids[] = $pitem['id'];
				$qtys[$pitem['id']] = $pitem['qty'];
			endforeach;
			// echo '<pre>';
			// var_dump( $item );
			// echo '</pre>';
			$cart_synced_data[] = DB::select( DB::raw("SELECT b.*, c.title reg_title, c.first_name, c.promo_code FROM `trtt_registeries_products` a LEFT JOIN trtt_products b on a.product_id = b.id LEFT JOIN trtt_registeries c on a.registry_id = c.id WHERE a.registry_id = {$item['registry_id']} and b.id IN (".implode( ',', $pids ).")") );
		endif;
	endforeach;
	
	return view( 'guest.cart.index', [
		'reg_types' => $reg_types,
		'qtys'      => $qtys,
		'data'      => $cart_synced_data
    ]);
	
});

Route::post('/guest/cart/store', function(){
	
	if( count( Input::all() ) > 0 ):
		
		$product_ids  = request('products_id');
		$quantity_ids = request('quantity_id');

		if( $product_ids && $quantity_ids )
		{
			$cart_items   = session()->has('guest_cart') ? session()->get('guest_cart') : [];
			$registry_slc = session()->has('registry_selected') ? session()->get('registry_selected') : [];

			$cart_emptying_items = [];
			foreach( $cart_items as $item ):
				if( $item['registry_id'] == $registry_slc ):
					foreach( $quantity_ids as $pid => $quantity_id ):
						if( $quantity_id ):
							$item['products'] = [];
						endif;
					endforeach;
				endif;
				$cart_emptying_items[] = $item;
			endforeach;

			// emptying products index in cart session array
			session()->put('guest_cart', $cart_emptying_items );
			
			$cart_items   = session()->has('guest_cart') ? session()->get('guest_cart') : [];

			$cart_updated_items = [];
			foreach( $cart_items as $item ):
				if( $item['registry_id'] == $registry_slc ):
					foreach( $quantity_ids as $pid => $quantity_id ):
						if( $quantity_id ):
							$item['products'][] = ['id' => $pid, 'qty' => $quantity_id[0]];
						endif;
					endforeach;
				endif;
				$cart_updated_items[] = $item;
			endforeach;

			session()->put('guest_cart', $cart_updated_items );
			
			return Redirect::to('/guest/cart/index');

		} else
			return response()->view('errors.503',[],503);

	endif;
});

Route::any('/registry/search/', function(){

	$promo_code = request('promo_code');

	if ( ! $promo_code )
		return Redirect::to('/');
	
	$reg_types = DB::table('registry_types')->select()->get();
	$registry  = DB::table('registeries')->where( 'promo_code', $promo_code )->where( 'registry_status_id', '<>', 3 )->select()->first();

	if( $registry ):
		$registry->product_nums = count(DB::table('registeries_products')->where('registry_id', $registry->id )->select('product_id')->get());
		$registry->registry_status = DB::table('registry_status')->where('id', $registry->registry_status_id )->select('name')->get()[0];
		$registry->ocassion = DB::table('ocassions')->where('id', $registry->ocassion_id )->select('title')->get()[0];
	else:
		$registry = false;
	endif;


	return view( 'registry.search', [
		'reg_types' => $reg_types,
		'registry'  => $registry
    ]);

});

Route::get('/registry/index', function(){

	if ( ! Auth::check())
		return Redirect::to('/');
	
	$reg_types   = DB::table('registry_types')->select()->get();
	$registeries = DB::table('registeries')->where('customer_id', Auth::user()->id )->select()->get();

	if( count( $registeries ) > 0 ):
		foreach( $registeries as $reg ):
			$reg->product_nums = count(DB::table('registeries_products')->where('registry_id', $reg->id )->select('product_id')->get());
			$reg->registry_status = DB::table('registry_status')->where('id', $reg->registry_status_id )->select('name')->get()[0];
			$reg->ocassion = DB::table('ocassions')->where('id', $reg->ocassion_id )->select('title')->get()[0];
		endforeach;

	endif;

	return view( 'registry.index', [
		'reg_types'   => $reg_types,
		'registeries' => $registeries
    ]);

});

Route::post('/create/registry/store', function () {

	if ( ! Auth::check())
		return Redirect::to('/');

	

	if( count( Input::all() ) > 0 )
	{

		//exit;

		//var_dump( Input::all() );

		$step = request('step');

		//$latest_registry_id = Cookie::get('latest_registry_id');

		$latest_registry_id = session()->has('latest_registry_id' ) ? session()->get('latest_registry_id') : false;

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
				$shipping_city    = request('xtxtCity');
				$shipping_country = request('xslsCountry');
				$shipping_pnum    = request('xtxtShippingPhoneNumber');
				$customer_id      = Auth::user()->id;
				$registry_title   = request('xtxtRegTitle');

				//var_dump( Auth::user()->id );

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

				//var_dump( $inserted_registry_id );

				if( $del_pref == 1 && $inserted_registry_id )
				{
					$insertion_shippings = DB::table('customers_shipping_info')->insertGetId([ 
						'customer_id'  => $customer_id,
						'registry_id'  => $inserted_registry_id,
						'first_name'   => $shipping_fname,
						'last_name'    => $shipping_lname,
						'address_1'    => $shipping_addr1,
						'address_2'    => $shipping_addr2,
						'city_id'      => $shipping_city,
						'country_id'   => $shipping_country,
						'phone_number' => $shipping_pnum
					]);

					//var_dump( $insertion_shippings );
				}

				//Cookie::queue('latest_registry_id', $inserted_registry_id);
				session()->put('latest_registry_id',$inserted_registry_id);
				return Redirect::to('/create/registry/2');
				
			
			}

			if( $step == 2 )
			{
				

				$product_ids  = request('products_id');
				$quantity_ids = request('quantity_id');

				if( ! $latest_registry_id )
					return Redirect::to('/');

				//var_dump( $product_ids );

				if( count( $quantity_ids ) > 0 )
				{
					foreach( $quantity_ids as $pid => $quantity_id ):
						if( $quantity_id ):							
							DB::table('registeries_products')->insertGetId([ 
								'registry_id' => $latest_registry_id,
								'product_id'  => $pid,
								'qty'         => $quantity_id[0],
							]);
						endif;
					endforeach;
				}

				//Cookie::queue('alot_promo_code',true);
				session()->put('alot_promo_code',true);
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

		// $latest_registry_id = Cookie::get('latest_registry_id');
		// $alot_promo_code    = Cookie::get('alot_promo_code');

		$latest_registry_id = session()->has('latest_registry_id' ) ? session()->get('latest_registry_id') : false;
		$alot_promo_code    = session()->has('alot_promo_code' ) ? session()->get('alot_promo_code') : false;
		
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

		// Cookie::queue(
		// 	Cookie::forget('alot_promo_code')
		// );

		// Cookie::queue(
		// 	Cookie::forget('latest_registry_id')
		// );

		session()->forget("alot_promo_code");
		session()->forget("latest_registry_id");

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
		'cities'        => $cities
    ]);

});

Route::any('/detail/registry/{view_id}', function ($view_id) {

	$products = [];
	$_pids    = [];

	$registry_detail   = DB::table('registeries')->where('id',$view_id)->select()->get();

	if( count( $registry_detail ) > 0 )
	{
		$reg_types         = DB::table('registry_types')->select()->get();
		$edit_products_ids = DB::table('registeries_products')->where('registry_id', $view_id)->select()->get();

		$qtys     = [];
		$rec_qtys = [];

		if( count( $edit_products_ids ) > 0 )
		{
			foreach( $edit_products_ids as $epid ):
				$_pids[]                     = $epid->product_id;
				$qtys[$epid->product_id]     = $epid->qty;
				$rec_qtys[$epid->product_id] = $epid->received;
			endforeach;
			//var_dump( $_pids );
			$products = DB::table('products')->whereIn('id', $_pids)->get();
		}

		// var_dump( $registry_detail[0] );
		// exit;

		return view('registry.detail', [
			'reg_types'       => $reg_types,
			'products'        => $products,
			'registry_detail' => $registry_detail[0],
			'qtys'            => $qtys,
			'rec_qtys'        => $rec_qtys
	    ]);
	} else {
		return response()->view('errors.503',[],503);
	}

});

Route::post('/edit/registry/store/{edit_id}', function ($edit_id) {

	if ( ! Auth::check())
		return Redirect::to('/');

	

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
				$shipping_city    = request('xtxtCity');
				$shipping_country = request('xslsCountry');
				$shipping_pnum    = request('xtxtShippingPhoneNumber');
				$customer_id      = Auth::user()->id;
				$registry_title   = request('xtxtRegTitle');

				//var_dump( Auth::user()->id );

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

				//var_dump( $updated_registry_id );

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
							'city_id'      => $shipping_city,
							'country_id'   => $shipping_country,
							'phone_number' => $shipping_pnum
						]);

					else:
						$updated_shippings = DB::table('customers_shipping_info')->where('registry_id',$edit_id)->update([ 
							'first_name'   => $shipping_fname,
							'last_name'    => $shipping_lname,
							'address_1'    => $shipping_addr1,
							'address_2'    => $shipping_addr2,
							'city_id'      => $shipping_city,
							'country_id'   => $shipping_country,
							'phone_number' => $shipping_pnum,
							'updated_at'   => 'NOW()'
						]);
					endif;

					//var_dump( $updated_shippings );
				}
				//Cookie::queue('edit_registry_id', $inserted_registry_id);
				return Redirect::to('/edit/registry/2/' . $edit_id);
			}

			if( $step == 2 )
			{

				$product_ids  = request('products_id');
				$quantity_ids = request('quantity_id');

				if( count( $quantity_ids ) > 0 )
				{
					DB::table('registeries_products')->where('registry_id',$edit_id)->delete();

					foreach( $quantity_ids as $pid => $quantity_id ):
						if( $quantity_id ):							
							DB::table('registeries_products')->insertGetId([ 
								'registry_id' => $edit_id,
								'product_id'  => $pid,
								'qty'         => $quantity_id[0],
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
	$cities            = [];
	$shipping_detail   = [];
	$edit_products_ids = [];

	$sort_by_cat   = '';
	$sort_by_price = '';
	$sort_by_alpha = '';
	$promo_code    = false;

	if( $step == 1 )
	{
		$ocassions     = DB::table('ocassions')->select()->get();
		$delivery_pref = DB::table('gift_delivery_preference')->select()->get();

		$shipping_detail = DB::table('customers_shipping_info')->where('registry_id', $edit_id)->select()->first();


		$countries = DB::table('countries')->orderBy('name', 'asc')->select()->get();
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

		$rcs = DB::table('registeries')->where(['id' => $edit_id, 'promo_code' => null])->select()->first();
		
		if( $rcs ):
			$promo_code = generate_promo_code();
			DB::table('registeries')->where('id', $edit_id)->update([
				'promo_code'          => $promo_code,
				'registry_status_id'  => 2
			]);
		else:
			DB::table('registeries')->where('id', $edit_id)->update([
				'registry_status_id'  => 2
			]);
		endif;

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
		'cities'        => $cities,
		'edit_details'  => $edit_details[0],
		'shipping_detail' => $shipping_detail,
		'edit_products_ids' => $edit_products_ids
    ]);

});

//