<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Log;
use DB;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['title', 'description','image_path'];

    /*
    * @params : $filter : Array : ("delivery" =>1, "category_id" =>143)
    *		  : $order  : Array : ("updated_at" => "asc", "price" => "desc")
    */

    public static function getSearchedItems($filter, $sort)
    {
    	Log::info(__CLASS__."::".__METHOD__."::"."Attempting to get the searched items from database");

    	
		$items = DB::table('products');

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

}
