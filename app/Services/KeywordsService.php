<?php

namespace App\Services;

use App\Models\Keyword;
use Log;

class KeywordsService
{
    /**
    *   @name getAllKeywords
    *  
    *   @description Returns a list of all keywords 
    *    
    *   @params None 
    *
    *   @return Array of keywords to be returned
    *
    *   @author Shweta Sabne  
    *
    **/
    public function getAllKeywords(Array $input)
    {
        $keywords =  Keyword::all();

        return $keywords;        
                 
    }
    
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
    public function getKeywordsByName(Array $input)
    {

        /**         Algorithm One TODO
        ** In this algo, I will fetch all keywords from db and do the filtering on the code side
        **          Test
        ** loadTest, unitTest 
        **          Note : will be considered only if the first algo doesn't work satisfactorily
        **/
        
        /**         Algorithm Two
        ** In this algo, I will fetch all keywords from db using where clause 
        **          Test
        ** loadTest, unitTest 
        **
        **/

        $keyword_ids = Keyword::getKeywordsByName($input);       
        return $keyword_ids;        
                 
    }
}
