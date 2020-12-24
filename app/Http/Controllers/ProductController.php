<?php

namespace App\Http\Controllers;
use App\Product;
use App\Transaction;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
    }

    public function detail($id){
        $product = Product::find($id);
        Session::put('product', $product);
        return view('member.product')->with(compact('product'));
    }

    
}
