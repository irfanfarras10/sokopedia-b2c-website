<?php

namespace App\Http\Controllers;
use App\User;
use App\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
    }

    public function index(){
        $userId = auth()->user()->id;
        $histories = Transaction::where('user_id',$userId)->get();
        return view('member.transaction_history')->with(compact('histories'));
    }    

    public function detail($id){
        $transactions = Transaction::find($id);
        return view('member.detail_transaction')->with(compact('transactions'));
    }

    public function checkOut(Request $request){
        $userId = auth()->user()->id;
        $items = json_decode($request->cart);

        date_default_timezone_set('Asia/Jakarta');
        //insert to transaction 
        $transactionDate = date('Y-m-d H:i:s');
        $transaction = new Transaction;
        $transaction->user_id = $userId;
        $transaction->date = $transactionDate;
        $transaction->save();
        
        //get latest transaction id
        $transactionId = $transaction->id;
        $userTransaction = Transaction::find($transactionId);
        
        //insert to transaction detail
        foreach($items as $item){
            $quantity = $item->pivot->quantity;
            $productId = $item->pivot->product_id;
            $userTransaction->products()->attach($productId, ['quantity' => $quantity]);
        }

        //remove all cart item
        $carts = User::find($userId);
        $carts->products()->detach();

        //refresh count cart item
        $carts = DB::table('carts')->where('user_id', $userId)->count();
        Session::put('carts', $carts);

        //return back to cart page
        return redirect()->back();
    }

}
