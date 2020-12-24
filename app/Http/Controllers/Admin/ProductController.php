<?php

namespace App\Http\Controllers\Admin;
use App\Category;
use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    //menampilkan halaman input product
    public function add(){
        $category = Category::all();
        return view('admin/addProduct', compact('category'));
    }

    //fungsi admin
    //fungsi input data ke database
    public function input (Request $request){
        $validator=Validator::make($request->all(),[
            'productname'=>'required|unique:products,name',
            'categoryid'=>'required|not_in:0',
            'description'=>'required',
            'price'=>'required|numeric|min:3',
            'gambar'=> 'required|max:5000|mimes:jpeg,bmp,png,jpg'
        ]);
        
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors());
        }

        $productimage = $request->file('gambar')->store('product_images','public'); 

        $product = new Product;
        $product->name = $request->productname;
        $product->category_id = $request->categoryid;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = $productimage;
        $product->save();



        // Product::create([
        //     'name' => $request->productname,
        //     'category_id' => $request->categoryid,
        //     'description' => $request->description,
        //     'price' => $request->price,
        //     'image' => $productimage
        // ]);
        return redirect('admin/list-product');
    }

    //show category pada show product admin
    public function showimage(){
        // $product = Product::join('categories', 'products.categoryid', '=', 'categories.id')->get();
        $products = Product::all();
        // $syrup = Product::where('categoryId', '=', '2')->get();

        return view('admin/showproduct', compact('products'));
    }

    //fungsi delete
    public function delete(Request $request){
        $this->Validate($request,[
            'id' => 'required|exists:products,id',
        ]);
        Product::find($request->id)->delete();
        return redirect('admin/list-product');
        
    }
}
