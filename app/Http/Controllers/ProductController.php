<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::whereNotNull('parent_id')->get();
        return view('product.product-create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
      $req->validate([
          'name'=>'required',
          'description'=>'required',
          'category'=>'required',
          'price'=>'required|numeric|gte:0',
          'stock'=>'required|numeric|gte:0'
      ]); 
      
      $product=Product::create([
          'name'=>$req->input('name'),
          'description'=>$req->input('description'),
          'category_id'=>$req->input('category'),
          'price'=>$req->input('price'),
          'stock'=>$req->input('stock')
      ]);

        return redirect('product-list')->with('success', 'Product has been craeted successfully.');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        
        $products=Product::paginate(10);
        return view('product.product-list',compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product,$id)
    {
        $data=Product::findOrFail($id);
        $categories=Category::whereNotNull('parent_id')->get();
        return view('product.product-edit',compact('data','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, Product $product)
    {
        $req->validate([
            'name'=>'required',
            'description'=>'required',
            'category'=>'required',
            'price'=>'required|numeric|gte:0',
            'stock'=>'required|numeric|gte:0'
        ]); 

        $data=Product::findOrFail($req->id);
        
        $data->name=$req->name;
        $data->description=$req->description;
        $data->category_id=$req->category;
        $data->price=$req->price;
        $data->stock=$req->stock;
        $data->save();

        return redirect('product-list')->with('success', 'Product has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product,$id)
    {
        $data=Product::find($id);
        
        $data->destroy('id',$id);
        return back()->with('success', 'Product has been deleted successfully.');
    }
}
