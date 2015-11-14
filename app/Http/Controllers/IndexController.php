<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Models\Product;
use App\Models\University;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = -1;
        $is_active = 0;
        if(Auth::check())
        {
            $user_id = Auth::id();
            $user    = User::getUserInfo($user_id);
            $first_name = $user->first_name;
            $active  = $user->is_active;
            $is_active  = $user->is_active;
            if($active) {
                return redirect()->intended('/results');
            }
            else
            {
                #return view('master.default', ['user_id' => $user_id]);
                #return view('auth/login', ['user_id' => $user_id]);
                Auth::logout();
                return view('master/default', 
                    ['user_id' => $user_id,
                     'is_active' => $is_active
                    ]
                );
            }
        }
        $field = "updated_at";
        $order = "desc";
        $sort = array();
        $sort[$field] = $order;
        $filter = array();
        $university_id = 1;
        $items = Product::getSearchedItems($filter, $sort, $university_id);
        $sort_date = 1;
        return view('master/default', [
            'items' => $items->paginate(8),
            'sort_date' => $sort_date,
#            'request'        => $request->all(),
            'user_id' => $user_id,
            'is_active' => $is_active,
            "university_list" => University::all(),
        ]);
        
    }
}
