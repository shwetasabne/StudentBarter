<?php

namespace App\Services;

use App\Models\Category;
use Log;

class CategoriesService
{
    /**
    *   @name getAllCategories
    *  
    *   @description Returns a list of all categories 
    *    
    *   @params None 
    *
    *   @return Array of categories to be returned
    *
    *   @author Shweta Sabne  
    *
    **/
    public function getAllCategories(Array input)
    {
        $categories =  Category::all();

        return $categories;        
                 
    }
}
