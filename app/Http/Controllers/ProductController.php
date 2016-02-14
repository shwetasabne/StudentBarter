<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Library\MailHelper;
use App\Models\Category;
use App\Logic\ImageRepository;

use Auth;
use Log;
use Response;
use URL;

class ProductController extends Controller
{
    protected $image;
 
    public function __construct(ImageRepository $imageRepository)
    {
        $this->middleware('auth', ['only'=>['create', 'store']]);
        $this->image = $imageRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $product_id = $request->input('item');
        $product = Product::getSingleProduct($product_id);

        $logged_in_user_id = Auth::id();
        $product_owner = $product['item']->user_id;


        //To show edit button
        $show_edit_button = ($logged_in_user_id == $product_owner && 
                ($product['item']->state == 'ACTIVE' || $product['item']->state == 'PRESUBMIT') ) ? 1 : 0;

        // To show delete button
        $show_delete_button = ($logged_in_user_id == $product_owner && $product['item']->state == 'ACTIVE') ? 1 : 0;

        // To show submit button
        $show_submit_button = ($logged_in_user_id == $product_owner && $product['item']->state == 'PRESUBMIT') ? 1 : 0;
        
        // To not show the product itself
        if($logged_in_user_id != $product_owner && $product['item']->state != 'ACTIVE')
        {
            return redirect('results')
                    ->with('status','Sorry! Product  not found');
        }

        $show_expired_div = ($product['item']->state == 'EXPIRED') ? 1: 0;

        
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

        $category_str = '';
        foreach($product['product_categories'] as $key)
        {
            $category_str.=$key->name.' ';
        }
        
        /*Denormalize other params*/
        $delivery = $product['item']->delivery == 1 ? 'Yes' : 'No';
        $pickup   = $product['item']->pickup   == 1 ? 'Yes' : 'No';
        $free     = $product['item']->price <= 0 ? 'FREE' : '$'.$product['item']->price;

        $current_url = URL::current().'/?item='.$product['item']->id;

        return view('product/index',[
            'item'           => $product['item'],
            'images'         => $product['images'],
            'keywords'       => $product['keywords'],
            'has_more_image' => $has_more_image,
            'delivery'       => $delivery,
            'pickup'         => $pickup,
            'free'           => $free,
            'keyword_str'    => $keyword_str,
            'category_str'   => $category_str,
            'show_edit_button' => $show_edit_button,
            'show_delete_button' => $show_delete_button,
            'show_submit_button' => $show_submit_button,
            'show_expired_div' => $show_expired_div,
            'current_url'   => $current_url,
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
        $categories = Category::where('is_active', '=', 1)->get();
        return view('product/create',['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product = $request->all();
//        var_dump($product);
//        exit;
        $this->validate($request, [
            'title' => 'required|max:20',
            'description' => 'max:100',
            'category'  => 'required',
        ]);

        //Transportation
        $delivery = $request->has('delivery') ? 1 : 0;
        $pickup   = $request->has('pickup') ? 1 : 0;
        
        // Price
        if($request->has('price'))
        {
            $price    = $request->input('price');
        }
        else
        {
            $price = 0;
        }
        $free     = $request->has('free') ? 1 : 0;

        // Usage
        if($request->input('usage') == 'new')
        {
            $new = 1;
            $used = 0;
        }        
        else
        {
            $new = 0;
            $used = 1;
    }

        // Keywords
        $input_keywords = $request->input('keywords') ? $request->input('keywords') : "";
        
        // Files
        $input_files = $request->input('filenamestring') ? $request->input('filenamestring') : "";

        $values = [
            'title'         => $request->input('title'),
            'description'   => $request->input('description'),
            'category'      => $request->input('category'),
            'delivery'      => $delivery,
            'pickup'        => $pickup,
            'free'          => $free,
            'price'         => $price,
            'keywords'      => $input_keywords,
            'filenamestring'=> $input_files,
            'new'           => $new,
            'used'          => $used
        ];

        $result = Product::insertProduct($values);
    
        return redirect()
                ->action('ProductController@index', ['item' => $result]);

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
    public function edit(Request $request)
    {
                $categories = Category::where('is_active', '=', 1)->get();
        return view('product/create',['categories' => $categories]);
       
        /*
        $product_id = $request->input('item');
        $product = Product::getSingleProduct($product_id);
        */

        /* Generate keywords string */
        /*
        $keyword_str = '';

        foreach($product['keywords'] as $key)
        {
            $keyword_str.='#'.$key->keyword.' ';
        }

        $categories = Category::where('is_active', '=', 1)->get();

        return view('product/edit',[
            'categories' => $categories,
            'item' => $product['item'],
            'keyword_str' => $keyword_str,
            'product_category' => $product['product_categories']
            ]);
        */
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

    public function uploads(Request $request)
    {
        Log::info(__CLASS__."::".__METHOD__."::"."Received request ");

        $photo = $request->all();
        $response = $this->image->upload($photo);
        return $response;
      
    /*    return Response::json([
            'error' => false,
            'code'  => 200
        ], 200);*/

    }

    public function removeuploads(Request $request)
    {
        $filename = $request->input('id');
 
        if(!$filename)
        {
            return 0;
        }
 
        $response = $this->image->delete( $filename );
 
        return $response;
    }

    public function updatestate (Request $request)
    {
        $id = $request->input('id');
        $state = $request->input('state');

        $values = [
            'id' => $id, 
            'state' => $state
        ];

        Product::updateState($values);
 
        if($state == 'ACTIVE')
        {
            return redirect()
                    ->action('ProductController@index', ['item' => $id]);
        }
        if($state == 'DELETED')
        {
            return redirect('results')
                    ->with('status','Product has been deleted successfully');
        }
    }
}
