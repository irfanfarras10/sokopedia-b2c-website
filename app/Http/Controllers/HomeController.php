<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $products = Product::all();
        $products = Product::paginate(3);
        $products = Product::where('name', 'like', "%$search%")->paginate(3);

        if(Auth::check()){
            $userId = auth()->user()->id;
                $carts = DB::table('carts')->where('user_id', $userId)->count();

                Session::put('carts', $carts);

                return view('home')->with(compact('products','carts'));
        }
        return view('home')->with(compact('products'));
    }
}
