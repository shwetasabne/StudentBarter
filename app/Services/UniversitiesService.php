<?php

namespace App\Services;

use App\Models\University;
use Log;

class UniversitiesService
{
    /**
    *   @name getAllUniversities
    *  
    *   @description Returns a list of all universities 
    *    
    *   @params None 
    *
    *   @return Array of universities to be returned
    *
    *   @author Shweta Sabne  
    *
    **/
    public function getAllUniversities(Array $input)
    {
        $universities =  University::all();

        return $universities;        
                 
    }
    
    /**
    *   @name getUniversityIdByName
    *  
    *   @description Returns university id given the name 
    *    
    *   @params university_name 
    *
    *   @return Int of university_id 
    *
    *   @author Shweta Sabne  
    *
    **/
    public function getUniversityIdByName($university_name)
    {
        $universities =  University::getUniversityIdByName($university_name);

        return $universities;        
                 
    }
}
