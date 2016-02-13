<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Log;
use DB;

class University extends Model
{
    protected $table = 'university';
    
    //protected $fillable = ['name', 'city'];

    public static function getUniversityIdByName($university_name)
    {
    	Log::info(__CLASS__."::".__METHOD__."::"."Attempting to get university_id from database for $university_name");
        $university_id  = DB::table('university')
                    ->select('id')
                    ->where('name', $university_name)
                    ->first();
        return $university_id->id;
    }
}
