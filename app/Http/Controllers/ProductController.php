<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Product;
use App\Models\Order;
use App\Http\Requests\Productrequest;
use App\Rules\Uppercase;

class ProductController extends Controller

{
    public function countProduct()
    {
        $product = Product::where('stock','>',0)->count();
        $running = Product::where('category', 'running')->count(); 
        $fotball = Product::where('category', 'football')->count(); 
        $cricket = Product::where('category', 'cricket')->count(); 
        $category = Product::distinct('category')->count(); 
        $order = Order::count(); 
        return view('welcome',compact('product','fotball','category','cricket','running','order'));
    }    
     public function index()
    { 
        $products = Product::all();
        return view('productdata',['data'=>$products]);     
    }
    public function showRunning()
    {
        $products = Product::where('category', 'running')->get();
        return view('running', compact('products'));
    }
    public function showFootball()
    {
        $products = Product::where('category', 'football')->get();
        return view('football', compact('products'));
    }   
    public function store(Productrequest $request)
    {
        $products = new Product;
        $products->name = $request->name;
        $products->price = $request->price;
        $products->size = $request->size;
        $products->stock = $request->stock;
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/products/', $filename);
            $products->image = $filename;
        }
        $products->brand = $request->brand;
        $products->category = $request->category;
        $products->description = $request->description;
        $products->star = implode(',', $request->input('star', []));
        $products->save();
        return redirect('index')->with('status','Product Added Successfully');
    }
    public function edit($id)
    {
        $product = Product::find($id);
        return view('editproduct',['data' => $product]);
    }  
    public function update(Request $request, $id)
   {
    $products = Product::find($id);
    $products->name = $request->name;
    $products->price = $request->price;
    $products->size = $request->size;
    $products->stock = $request->stock;
    $products->brand = $request->brand;
    $products->category = $request->category;
     if($request->hasfile('image'))
    {
        $file = $request->file('image');
        $extention = $file->getClientOriginalExtension();
        $filename = time().'.'.$extention;
        $file->move('uploads/products/', $filename);
        $products->image = $filename;
    }
    $products->save(); 
    return redirect('index')->with('status','Product Added Successfully');
}

public function destroy($id)
{
    $product = Product::find($id);
    $product->delete();
   // return alert('deleted');
   return redirect('index')->with('status','delete Successfully');

}

}



