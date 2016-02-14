<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Product;
use Log;
use Auth;

class SearchService
{
    /**
    *   @name searchItemsAlgoOne
    *  
    *   @description Accepts 
    *    
    *   @params Array of inputs
    *           input = {
    *                       "delivery" => 1,
    *                       "terms" => ['cat', 'in', 'a', 'box'],
    *                       "pickup" => 1,
    *                       "university_id" => 1,
    *                       "free" => 1,
    *                       "new" => 1,
    *                       "used" => 1,
    *                   }
    *
    *   @return Array based on outcome
    *           If success $output = ('status' => true, 'data' => $list_of_products)
    *           If failure $output = ('status' => false,'data' => $exception_message)
    *
    *   @author Shweta Sabne  
    *
    **/
    public function searchItemsAlgoOne(Request $request)
    {
        /**          Algorithm
        * First pass the input search string through a profanity filter - TODO
        * Pass above through regular words filter to remove prepositions - TODO
        * Now that we have a much smaller stripped search string, we keep that array of keywords
        * With other input params that are indexable like delivery, free, status, etc we get an array of products from db
        * Now for the keywords, we use php to filter the returned record 

        *          Testing Strategy
        * loadTesting
        **/
    
        $where = array();
        $whereIn = array();
        $sort = array();
        $ultimate_array = array();

        try 
        {
            //  Process keywords
            if($request->has('searchTerm'))
            {
                //$sanitized_keywords = ProfanityFilter::sanitize($request->input('searchTerms'));
                //$removed_regular_list = RegularWordsRemoval::remove($sanitized_keywords);
                $removed_regular_list = explode(" ", $request->input('searchTerm'));

                $ks = new KeywordsService();
                $keyword_id = array();
                $keyword_id = $ks->getKeywordsByName($removed_regular_list);
                $whereIn['keyword_id'] = $keyword_id;
            }
 
            // Process categories
            if($request->has('category_id') && $request->input('category_id') != -1)
            {
                $where['category_id'] = $request->input('category_id');
            }

            // Process university_id
            $us = new UniversitiesService();
            if($request->has('university_name'))
            {
                $university_id = $us->getUniversityIdByName($request->input('university_name')); 
                $where['university_id'] = $university_id;
            }
    
            // Process delivery_only
            if($request->has('delivery'))
            {
                $where['delivery'] = 1;
            }
            
            // Process pickup_only
            if($request->has('pickup'))
            {
                $where['pickup'] = 1;
            }
            
            // Process free_only
            if($request->has('freeonly'))
            {
                $where['free'] = 1;
            }

            // Process usage
            if($request->input('usage') == 'new')
            {
                $where['new'] = 1;
            }   
            else if($request->input('usage') == 'used')
            {
                $where['used'] = 1;
            }

            // Process sort fields
            $sort_date = 0;
            $sort_price_asc = 0;
            $sort_price_desc = 0;
            $sortfield_value = "";
            $sortfield_value = "";
            if($request->has('sortfield'))
            {
                $sortfield_value = $request->input('sortfield');
            }

            switch($sortfield_value)
            {
                case "date_desc":
                    $field = "products.updated_at";
                    $order = "desc";
                    $sort_date = 1;
                    break;
                case "price_asc":
                    $field = "products.price";
                    $order = "asc";
                    $sort_price_asc = 1;
                    break;
                case "price_desc":
                    $field = "products.price";
                    $order = "desc";
                    $sort_price_desc = 1;
                    break;
                default:
                    $field = "products.updated_at";
                    $order = "desc";
                    $sort_date = 1;
            }
            $sort = array();
            $sort[$field] = $order;

            // Now call the DB function...
            $results = Product::getSearchedItems($where, $whereIn, $sort);

            $output['status'] = true;
            $output['data'] = $results;

            return $output;
        }
        catch(Exception $e)
        {
            $output['status'] = true;
            $output['data'] = $e->getMessage();

            return $output;
        }

    }
}
