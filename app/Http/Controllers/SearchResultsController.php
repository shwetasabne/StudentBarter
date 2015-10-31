<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Product;
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

        $delivery_check = $request->has('delivery') ? 1 : 0;
        $pickup_check = $request->has('pickup') ? 1 : 0; 
        $freeonly_check = $request->has('freeonly') ? 1 : 0;

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
                $field = "updated_at";
                $order = "desc";
                $sort_date = 1;
                break;
            case "price_asc":
                $field = "price";
                $order = "asc";
                $sort_price_asc = 1;
                break;
            case "price_desc":
                $field = "price";
                $order = "desc";
                $sort_price_desc = 1;
                break;
            default:
                $field = "updated_at";
                $order = "desc";
                $sort_date = 1;
        }

        
        $sort = array();
        $sort[$field] = $order;

        $filter = array();
        if($delivery_check)
        {
            $filter['delivery'] = 1;
        }
        if($pickup_check)
        {
            $filter['pickup'] = 1;
        }
        if($freeonly_check)
        {
            $filter['free'] = 1;
        }

        
        echo "Filter is \n";
        var_dump($filter);

        echo "Sort is \n";
        var_dump($sort);

        $items = Product::getSearchedItems($filter,$sort);

        return view('results.index', [
            'items' => $items->paginate(9),
            'delivery_check' => $delivery_check,
            'pickup_check'   => $pickup_check,
            'freeonly_check' => $freeonly_check,
            'sort_date'      => $sort_date,
            'sort_price_asc' => $sort_price_asc,
            'sort_price_desc' => $sort_price_desc,
            'request'        => $request->all()
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
