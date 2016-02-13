<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Log;
use DB;
use Auth;
use App\User;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['title', 'description', 'delivery', 'pickup', 'price', 'free', 'new', 'used', 'user_id', 'university_id'];

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

        // Get categories
        $categories = DB::table('categories')
                                ->join('products_categories', 'products_categories.category_id','=','categories.id')
                                ->select('categories.*')
                                ->where('product_id', $product_id)
                                ->get();
        $return_object['product_categories'] = $categories;

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

    public static function getSearchedItems($where, $whereIn, $sort)
    {
    	Log::info(__CLASS__."::".__METHOD__."::"."Attempting to get the searched items from database");
    	
		$items = DB::table('products')
                    ->select('products.*');    
        //If where has category_id
        if(isset ($where['category_id']))
        {
            $items
                ->join('products_categories', 'products_categories.product_id','=','products.id');
        }

        // whereIn has searchTerms
        if(isset ($whereIn['keyword_id']))
        {
            $items
                ->join('products_keywords', 'products_keywords.product_id','=','products.id');
        }

        // Add where clause
		if(count($where) > 0)
		{
			foreach ($where as $key => $value) {
				$items->where($key, $value);
			}
		}

        if(count($whereIn) > 0)
        {
            foreach ($whereIn as $key => $value){
                $items->whereIn($key, $value);
            }
        }	
		if(count($sort) > 0)
		{
			foreach ($sort as $key => $value) {

				$items->orderBy($key, $value);
			}
		}
        $items->groupBy('products.id');

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

        #First insert any new keywords
        $keyword_array = explode(" ", $product['keywords']);
        $final_key_array = array();
        foreach ($keyword_array as $key)
        {
            $key = substr($key, 1);
            $inserted_key = Keyword::firstOrCreate(['keyword' => $key]);
            array_push($final_key_array, $inserted_key->id);
        }

        #Now retrieve the keyword ids and save them
        $keywords_from_db = DB::table('keywords')
                                ->whereIn('id', $final_key_array)
                                ->get(); 
   
        # Get all the filenames in form of an array
        $filename_array = explode(":", $product['filenamestring']);
        $primary_image_path='no_image.jpg';
        if(count ($filename_array) > 0)
        {
            $primary_image_path = $filename_array[0];
        } 
        # Now that we have all the information, start transaction
        try {
            
            DB::beginTransaction();

            $logged_in_user = Auth::id();
            $user = User::where('id',$logged_in_user)->first();

            #First insert in the product table
    	    Log::info(__CLASS__."::".__METHOD__."::"."Attempting to insert product data into database");
            $product_id  = DB::table('products')->insertGetId([
                        'title'                     => $product['title'],
                        'description'               => $product['description'],
                        'delivery'                  => $product['delivery'],
                        'pickup'                    => $product['pickup'],
                        'price'                     => $product['price'],
                        'free'		                => $product['free'],
                        'user_id'	                => $logged_in_user, 
                        'primary_image_path'	    => $primary_image_path,
                        'new'                       => $product['new'], 
                        'used'                      => $product['used'],
                        'state'                     => 'PRESUBMIT',
                        'university_id'             => $user->university_id
                    ]);
    	    
            Log::info(__CLASS__."::".__METHOD__."::"."Got product id ".$product_id);

            #Now insert products_categories
            foreach ($product['category'] AS $cat)
            {
                Log::info(__CLASS__."::".__METHOD__."::"."Inserting product category ".$product_id.":".$cat);
                DB::table('products_categories')->insert(
                    ['product_id' => $product_id, 'category_id' => $cat]
                );
            }
        
            # Now insert keywors
            foreach ($keywords_from_db as $keyword_db)
            {

                Log::info(__CLASS__."::".__METHOD__."::"."Inserting product keyword ".$product_id.":".$keyword_db->id);
                DB::table('products_keywords')->insert(
                    ['product_id' => $product_id, 'keyword_id' => $keyword_db->id]
                );
            }

            # Now insert the images

            if(count ($filename_array) > 1)
            {
                for($i = 1; $i < count($filename_array)-1; $i++)
                {
                    
                    Log::info(__CLASS__."::".__METHOD__."::"."Inserting product image ".$product_id.":".$filename_array[$i]);
                    DB::table('products_images')->insert(
                        ['product_id' => $product_id, 'image_path' => $filename_array[$i]]
                    );
                }
            }
            DB::commit();
            return $product_id;
        }
        catch(Exception $e)
        {
            Log::info(__CLASS__."::".__METHOD__."::"."Exception inserting product".$e->message());
            DB::rollBack();
            return $e->message();
        }

    	return $results;
    }

    public static function updateState($values)
    {
        Log::info(__CLASS__."::".__METHOD__."::"."Attempting to update state of "
            .$values['id']." to ".$values['state']);

        DB::table('products')
            ->where('id', $values['id'])
            ->update(['state' => $values['state']]);

        return true;
    }

}
