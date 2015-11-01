<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product/create');
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
        $this->validate($request, [
            'title' => 'required|max:20',
            'description' => 'required|max:100',
            'category' => 'required',
        ]);

        $delivery = $request->has('delivery') ? 1 : 0;
        $pickup   = $request->has('pickup') ? 1 : 0;
        $free     = $request->has('free') ? 1 : 0;
        $price    = $request->input('price');

        if (is_null($price)) {
            $price = 0;
        }

        $values = [
            'title'         => $request->input('title'),
            'description'   => $request->input('description'),
            'category'      => $request->input('category'),
            'delivery'      => $delivery,
            'pickup'        => $pickup,
            'free'          => $free,
            'price'         => $price,
            'keywords'      => $request->input('keywords')
        ];

        $result = Product::insertProduct($values);
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
