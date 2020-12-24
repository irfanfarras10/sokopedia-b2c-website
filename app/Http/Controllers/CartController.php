<?php

namespace App\Http\Controllers;
use App\User;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
    }

    public function index(){
        $userId = auth()->user()->id;
        $items = User::find($userId);
        return view('member.cart')->with(compact('items'));
    }

    public function destroy($id){
        $userId = auth()->user()->id;
        DB::table('carts')->where('product_id', $id)->where('user_id', $userId)->delete();
        $carts = DB::table('carts')->where('user_id', $userId)->count();
        Session::put('carts', $carts);
	    return redirect('cart');
    }

    public function showCart($id){
        $product = Product::find($id);
        return view('member.add_to_cart')->with(compact('product'));
    }

    public function addToCart(Request $request){
        $userId = auth()->user()->id;
        $productId = $request->id;
        $quantity = $request->quantity;
        $productCount = DB::table('carts')->where('user_id', $userId)->where('product_id', $productId)->count();
        if($productCount == 1){
            DB::table('carts')->where('user_id', $userId)->where('product_id', $productId)->update(['quantity' => DB::raw('quantity + ' . $quantity)]);
        }
        else{
            DB::table('carts')->insert([
                'user_id' => auth()->user()->id,
                'product_id' => $request->id,
                'quantity' => $request->quantity
            ]);
        }
        return redirect('home');
    }

    public function update(Request $request)
    {
        $userId = auth()->user()->id;
        $productId = $request->id;
        $quantity = $request->quantity;
        DB::table('carts')->where('user_id', $userId)->where('product_id', $productId)->update(['quantity' => $quantity]);
        return redirect('cart');
    }
}
