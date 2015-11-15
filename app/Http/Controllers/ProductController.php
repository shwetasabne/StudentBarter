<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Library\MailHelper;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $product_id = $request->input('item');
        $product = Product::getSingleProduct($product_id);

        /*Check if there are more images*/
        if(sizeof($product['images']) <= 0)
        {
            $has_more_image =  0;
        }
        else
        {
            $has_more_image = 1;
        }

        /* Generate keywords string */
        $keyword_str = '';

        foreach($product['keywords'] as $key)
        {
            $keyword_str.='#'.$key->keyword.' ';
        }

        /*Denormalize other params*/
        $delivery = $product['item']->delivery == 1 ? 'Yes' : 'No';
        $pickup   = $product['item']->pickup   == 1 ? 'Yes' : 'No';
        $free     = $product['item']->price <= 0 ? 'FREE' : '$'.$product['item']->price;

        return view('product/index',[
            'item'           => $product['item'],
            'images'         => $product['images'],
            'keywords'       => $product['keywords'],
            'has_more_image' => $has_more_image,
            'delivery'       => $delivery,
            'pickup'         => $pickup,
            'free'           => $free,
            'keyword_str'    => $keyword_str
        ]);

    //    $product_view_id = $request->input('item');

    //    $product = Product::getOneProductInfo($product_view_id);

        //Check how many images it has and accordingly set $has_image, $image_count parameters
      //  return view('product/index');
    }

    /**
     * Get the information for sending interested email.
     *
     * @return \Illuminate\Http\Response
     */
    public function interestedmail(Request $request)
    {
		if ($request["subject"])
		{
			$subject = $request["subject"];
		}
		else
		{
			
		}
		if ($request["message"])
		{
			$message = $request["message"];
		}
		else
		{

		}

		$productid = $request["productid"];
		$user_id = Auth::id();
        $mailsent = MailHelper::sendMail($subject, $message, $user_id, $productid);
		echo "<span class=\"alert alert-success\" >Your message has been sent. Thanks!</span><br><br>";
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
