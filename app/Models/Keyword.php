<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Log;
use DB;

class Keyword extends Model
{
    protected $table = 'keywords';
    
    protected $fillable = ['keyword'];

    /**
    *   @name getKeywordsByName
    *  
    *   @description Returns a list of all keywords ids given array of names 
    *    
    *   @params Array of keyword names 
    *
    *   @return Array of keywords id to be returned
    *
    *   @author Shweta Sabne  
    *
    **/
    public static function getKeywordsByName(Array $input)
    {

    	Log::info(__CLASS__."::".__METHOD__."::"."Attempting to get keywords from database for [".implode(",", $input)."]");
       
        $keyword_id  = DB::table('keywords')
                    ->select('id')
                    ->whereIn('keyword', $input)
                    ->get();

        $items = array();

        foreach ($keyword_id as $id)
        {
            array_push($items, $id->id);
        } 
        return $items; 
         
    }
}
