<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Log;
use DB;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['title', 'description','image_path','university_id'];

    /*
    * @params : $filter : Integer : id => $product_id
    * 
    */

    public static function getSingleProduct($product_id)
    {
    	Log::info(__CLASS__."::".__METHOD__."::"."Attempting to get single items from database for ".$product_id);

    	$return_object = array();

    	$item = DB::table('products')
    				->join('users', 'users.id', '=', 'products.user_id')
    				->join('university', 'university.id', '=', 'users.university_id')
    				->select('products.*',
    						'users.first_name','users.id as user_id', 'users.last_name', 
    						'university.name as university_name')
    				->where('products.id', $product_id)
    				->first();
    	$return_object['item'] = $item;

    	// Get keywords
    	$keywords = DB::table('keywords')
                                ->join('products_keywords', 'products_keywords.keyword_id','=','keywords.id')
                                ->select('keywords.*')
    							->where('product_id', $product_id)
    							->get();
    	$return_object['keywords'] = $keywords;

    	//Get images
    	if(is_null($item->primary_image_path) || $item->primary_image_path == '' || empty($product_id))
    	{
    		//do nothing and retunr $item from here only    		
    		$return_object['images'] = array();    		
    	}
    	else
    	{
    		$product_images = DB::table('products_images')
    							->where('product_id', $product_id)
    							->get();
    		
    		$return_object['images'] = $product_images;
    	}
    	return $return_object;
    }

    /*
    * @params : $filter : Array : ("delivery" =>1, "category_id" =>143)
    *		  : $order  : Array : ("updated_at" => "asc", "price" => "desc")
    */

    public static function getSearchedItems($filter, $sort, $university_id)
    {
    	Log::info(__CLASS__."::".__METHOD__."::"."Attempting to get the searched items from database");


    	
		$items = DB::table('products');

		if($university_id != 1)
		{
			$items->where('university_id', $university_id);
		}

		if(count($filter) > 0)
		{
			foreach ($filter as $key => $value) {
				$items->where($key, $value);
			}
		}	
		if(count($sort) > 0)
		{
			foreach ($sort as $key => $value) {

				$items->orderBy($key, $value);
			}
		}
		return $items;
    }

    /*
    * @params : $sort : Array : ("updated_at" => "desc")
	* 		  : $user_id : Array : ("user_id" => 1)
    */

    public static function getUserItems($sort, $user_id)
    {
    	Log::info(__CLASS__."::".__METHOD__."::"."Attempting to get the User items from database");

    	
		$items = DB::table('products');

		if(count($user_id) > 0)
		{
			foreach ($user_id as $key => $value) {
				$items->where($key, $value);
			}
		}	
		if(count($sort) > 0)
		{
			foreach ($sort as $key => $value) {
				$items->orderBy($key, $value);
			}
		}
		return $items;
    }

    public static function insertProduct($product)
    {

    	Log::info(__CLASS__."::".__METHOD__."::"."Attempting to insert product data into database");

    	$results = DB::table('products')->insertGetId([
    				'title' => $product['title'],
    				'description'	=> $product['description'],
    				'delivery'	=> $product['delivery'],
    				'pickup'	=> $product['pickup'],
    				'price'	=> $product['price'],
    				'free'		=> $product['free'],
    				'user_id'	=> "1"
    			]);

    	return $results;
    }
}
