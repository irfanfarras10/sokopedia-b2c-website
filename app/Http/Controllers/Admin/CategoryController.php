<?php

namespace App\Http\Controllers\Admin;
use App\Category;
use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    public function input(Request $request){
        $validator=Validator::make($request->all(),[
            'categoryname'=>'required|unique:categories,name',
        ]);
        
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors());
        }
        $category = new Category;
        $category->name = $request->categoryname;
        $category->save();
        return back();
    }

    public function showcategory(){
        $category = Category::all();
        $details = Category::join('products','categories.id','=', 'products.category_id')->where('products.id','=','0')->get();
        // $product = Product::join('categories','products.categoryid', '=', 'categories.id')->get();
        // $product = Product::where('categoryid','=',$category->id)->get();
        // $product = Category::where('categoryid','=',$category->id)->get();
        return view('admin/showcategory',compact('category','details'));
        
    }

    // public function categorydetail(){
    //     $category = Category::all();
    //     return view('admin/categorydetail',compact('category'));
    // }

    public function showproduct($categoryid){
        $category = Category::all();
        $details = Category::where('id','=', $categoryid)->get();
        $details = Category::join('products','categories.id','=', 'products.category_id')->where('categories.id','=', $categoryid)->get();
        //$details = Product::join('categories','products.categoryid','=', 'categories.id')->where('categoryid','=',$category->id)->get();
        // $product = Product::join('categories','products.categoryid', '=', 'categories.id')->get();
        // $product = Product::where('categoryid','=',$category->id)->get();
        // $product = Category::where('categoryid','=',$category->id)->get();
        //return dd($category);
        // dd($details);
        return view('admin/showcategory',compact('category','details'));
    }
}
