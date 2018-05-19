<?php

namespace App\Helpers\Registry;
 
use Illuminate\Support\Facades\DB;
 
class Lib
{

	public static function get_countries()
	{
		return DB::table('countries')->orderBy('name', 'asc')->select()->get();
	}

	public static function get_country_by_id( $country_id )
	{
		return DB::table('countries')->where('id', $country_id)->select('name')->first();
	}
    
    public static function get_registry_types()
    {
        return DB::table('registry_types')->where('status', 1)->select()->get();
    }

    public static function get_registry_status_by_id( $registry_status_id )
    {
    	return DB::table('registry_status')->where('id', $registry_status_id )->select('name')->get()[0];
    }

    public static function get_ocassions()
    {
    	return DB::table('ocassions')->select()->get();
    }

    public static function get_occassion_by_id( $ocassion_id )
    {
    	return DB::table('ocassions')->where('id', $ocassion_id )->select('title')->get()[0];
    }

    public static function get_gift_delivery_preference()
    {
    	return DB::table('gift_delivery_preference')->select()->get();
    }

    public static function get_gift_delivery_preference_by_id( $pref_id )
    {
    	return DB::table('gift_delivery_preference')->where('id', $pref_id )->select()->first();
    }

    public static function get_categories()
    {
    	return DB::table('categories')->select()->get();
    }

    public static function get_parent_categories()
    {
        return DB::table('categories')->where('parent_id', 0)->select()->get();
    }

    public static function get_category_by_id_or_slug( $col, $val )
    {
    	return DB::table('categories')->where($col, $val)->select()->first();
    }

    public static function get_category_title_n_slug_by_product_id( $product_id )
    {
        $cat = DB::table('products_categories as pc')
            ->select('c.title', 'c.slug')
            ->leftJoin('categories as c', 'pc.category_id', '=', 'c.id')
            ->where(['pc.product_id' => $product_id])->first();
        return $cat;
    }

    // public static function get_category_by_col_vals( $cols, $vals )
    // {
    // 	if( ! is_array( $cols ) && ! is_array( $cols ) )
    // 	{
    // 		$cols[] = $cols;
    // 		$vals[] = $vals;
    // 	}
    // 	$cat_inst = DB::table('categories');
    // 	for( $i=0; $i<count($cols); $i++ )
    // 	{
    // 		$cat_inst->where($cols[$i], $vals[$i]);
    // 	}
    // 	return DB::table('categories')->where('id', $category_id)->select()->first();
    // }

    public static function get_products( $orderBy = 'asc' )
    {
    	return DB::table('products')->orderBy('title', $orderBy)->select()->get();
    }

    public static function get_products_list( $orderBy = 'desc' )
    {
        return DB::table('products')->orderBy('create_datetime', $orderBy)->select()->get();
    }

    public static function get_product_by_id( $id )
    {
        return DB::table('products')->where('id', $id)->select()->get();
    }

    public static function get_product_by_category( $product_id )
    {
        return DB::table('products_categories')->where('product_id', $product_id)->select()->get();
    }

    public static function get_product_by_cat_ids( $product_id )
    {
        return DB::table('products_categories')->where('product_id', $product_id)->select('category_id')->get();
    }

    public static function verify_customer( $column, $value )
    {
        return DB::table('customers')->where( $column, $value )->select()->first();
    }

    public static function get_customer_by_cols( $column_to_verf, $value, $select_column )
    {
        return DB::table('customers')->where( $column_to_verf, $value )->select( $select_column )->first();
    }

    public static function generate_code_for_fp()
    {
        return substr(base64_encode(sha1(mt_rand())), 0, 32);
    }

    public static function verify_pass_code( $code )
    {
        return DB::table('password_forgot_history')->where( 'code', $code )->where( 'status', false )->select()->first();
    }

}