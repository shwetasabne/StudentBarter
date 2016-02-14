<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SearchService;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\University;
use App\Models\Category;
use App\User;
use Auth;
use DB;

class SearchResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ss = new SearchService();
        $output =  $ss->searchItemsAlgoOne($request);
        if(!$output['status'])
        {
            print_r("Error occurred getting results " . $output['data']);
            return;
        }
     
        if($request->has('category_id'))
        {
            $category_id = $request->input('category_id');
        }
        else
        {
            $category_id = -1;
        } 
        // Usage
        if($request->input('usage') == 'new')
        {
            $new = 1;
            $used = 0;
            $all = 0;
        }        
        else if($request->input('usage') == 'used')
        {
            $new = 0;
            $used = 1;
            $all = 0;
        }else{
            $new = 0;
            $used = 0;
            $all = 1;
        }
        $sortfield_value = "";
        if($request->has('sortfield'))
        {
            $sortfield_value = $request->input('sortfield');
        }
        $sort_date = 0; 
        $sort_price_asc = 0;
        $sort_price_desc = 0;

        switch($sortfield_value)
        {
            case "date_desc":
                $sort_date = 1;
                break;
            case "price_asc":
                $sort_price_asc = 1;
                break;
            case "price_desc":
                $sort_price_desc = 1;
                break;
            default:
                $sort_date = 1;
        }
        $items = $output['data']; 
        return view('results.index', [
            'items' => $items->paginate(9),
            'delivery_check' => ($request->has('delivery') ? 1 : 0),
            'pickup_check'   => ($request->has('pickup_check') ? 1 : 0),
            'freeonly_check' => ($request->has('freeonly') ? 1 : 0),
            'searchTerm'     => $request->input('searchTerm'),
            'university_name' => $request->input('university_name'),
            'category_id'    => $category_id,
            'new_check'      => $new,
            'used_check'     => $used,
            'all_check'      => $all,
            'sort_date'      => $sort_date,
            'sort_price_asc' => $sort_price_asc,
            'sort_price_desc' => $sort_price_desc,
            'request'        => $request->all(),
            'university_list' => University::all(),
            'category_list' => Category::all()
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
