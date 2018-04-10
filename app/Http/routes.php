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

Route::get('/product-checker', function () {
	$products = DB::table('products')->orderBy('title', 'asc')->select()->get();
?>
	<table border="1" width="100%">
		<thead>
			<tr>
				<!-- <th>S.NO</th> -->
				<th>ID</th>
				<th>Title</th>
				<th>price</th>
				<th>Image</th>
			</tr>
		</thead>
		<tbody>
			<?php $c=0; foreach( $products as $product ): $c++;?>
				<tr>
					<!-- <td align="center"><?= $c ?></td> -->
					<td align="center"><?= $product->id ?></td>
					<td align="left"><?= $product->title ?></td>
					<td align="center"><?= $product->price ?></td>
					<td align="center"><img src="<?= $product->image ?>" width="100" height="100" /></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
<?php
});

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

Route::any('/create/registry/{step}', function ($step) {

	if ( ! Auth::check())
		return Redirect::to('/');
	
	$reg_types  = DB::table('registry_types')->select()->get();

	$products    = [];
	$categories  = [];
	$sortByCat   = '';
	$sortByPrice = '';
	$sortByAlpha = '';
	$promo_code  = '';

	if( $step == 2 )
	{

		$categories = DB::table('categories')->select()->get();

		if( count( Input::all() ) > 0 )
		{
			$sortByCat   = request('xslcCat');
			$sortByPrice = request('xslcSortByPrice');
			$sortByAlpha = request('xslcSortByAlpha');

			$product_inst = DB::table('products as p')
			->select('p.*')
			->leftJoin('products_categories as apc', 'p.id', '=', 'apc.product_id');

			if( strlen( $sortByCat ) > 0 )
			{
				$category_id = $sortByCat;
				$product_inst->where(['apc.category_id' => $category_id]);
			}
			//var_dump( $sortByPrice );
			if( $sortByPrice == '1' )
				$product_inst->orderByRaw('CAST(trtt_p.price AS DECIMAL(10,2)) DESC');
			else if( $sortByPrice == '2' )
				$product_inst->orderByRaw('CAST(trtt_p.price AS DECIMAL(10,2)) ASC');

			if( $sortByAlpha == '1' )
				$product_inst->orderBy('p.title', 'ASC');
			else if( $sortByAlpha == '2' )
				$product_inst->orderBy('p.title', 'DESC');

			$products = $product_inst->get();
			// var_dump( $products );
			// exit;
			
		} else 
		{
			$products   = DB::table('products')->orderBy('title', 'asc')->select()->get();	
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
	}

	return view('create-registry-' . $step, [
		'reg_types'   => $reg_types,
		'products'    => $products,
		'categories'  => $categories,
		'sortByCat'   => $sortByCat,
		'sortByPrice' => $sortByPrice,
		'sortByAlpha' => $sortByAlpha,
		'promo_code'  => $promo_code
    ]);

});

//