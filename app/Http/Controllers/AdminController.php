<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Helpers\Registry\Lib;

class AdminController extends Controller
{

    public function index()
    {

        $products = Lib::get_products_list();

        if( ! Auth::check() )
            return Redirect::to('/administrator/login');

        return view('admin.index', [
            'products' => $products
        ]);
    }

    public function login()
    {
        if( Auth::check() )
            return Redirect::to('/administrator');

        return view('admin.login');
    }

    public function logout()
    {
        if( ! Auth::check() )
            return Redirect::to('/administrator/login');

        Auth::logout();
    }

    public function login_process()
    {
        
        $rules = array(
            'email_address' => 'required|email',
            'password'      => 'required|min:3;'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails())
        {

            return Redirect::to('/administrator/login')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        }
        else
        {
            $customer_data = array(
                'email_address' => Input::get('email_address'),
                'password'      => Input::get('password')
            );

            if ( Auth::attempt( $customer_data ) )
            {
                $user = Auth::user();
                Auth::login( $user );
                return Redirect::to('/administrator');
            }
            else
            {
                return Redirect::to('/administrator/login')->withErrors(['Incorrect Email/Password']);
            }

        }
    }

    public function add_products()
    {

        $categories = Lib::get_categories();

        if( ! Auth::check() )
            return Redirect::to('/administrator');

        return view('admin.add_products', [
            'categories' => $categories
        ]);
    }

    public function add_products_process(Request $request)
    {
        $success = false;
        if( count( Input::all() ) > 0 )
        {
            $title       = Input::get('xtxtProductTitle');
            $price       = Input::get('xtxtProductPrice');
            $description = Input::get('xtxtProductDescription');
            $categories  = Input::get('xtxtCategory');
            $file        = $request->file('xFileProductImage');
            $image_path  = '';

            if( null !== $file )
            {
                $destination_path = 'assets/img/uploads';
                $image_path       = config('app.url') . $destination_path . '/' . $file->getClientOriginalName();
                $file->move( $destination_path, $file->getClientOriginalName() );
            }

            $inserted_id = DB::table('products')->insertGetId([ 
                'title'       => $title,
                'price'       => $price,
                'description' => $description,
                'image'       => $image_path
            ]);

            if( $inserted_id )
            {
                if( count( $categories ) > 0 )
                {
                    foreach( $categories as $category )
                    {
                        DB::table('products_categories')->insertGetId([ 
                            'product_id'  => $inserted_id,
                            'category_id' => $category
                        ]);
                    }   
                }
                $success = true;
                return Redirect::to('/administrator/products/add')->with('status', $success);
            }
            else
            {
                return Redirect::to('/administrator/products/add')->withErrors(['Something went wrong']);
            }

        }
        else
        {
            return Redirect::to('/administrator/products/add')->withErrors(['Something went wrong']);
        }
    }

    public function delete_product()
    {
        $product_id = Input::get('product_id');
        return DB::table('products')->where( 'id', $product_id )->delete();
    }

}
