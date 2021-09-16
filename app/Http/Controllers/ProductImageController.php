<?php

namespace App\Http\Controllers;

use App\Models\Product_Image;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductImageController extends Controller
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
       $products=Product::all();
       return view('product.product-image.proimg-create',compact('products'));
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
            'selectProduct'=> 'required',
            'product_image'=>'required|image|mimes:jpeg,jpg,png,gif',
            'alt'=>'required'
        ]);
   
        $newImageName= time(). '.' . $req->product_image->getClientOriginalName();
        $req->product_image->move(public_path('dist/images'),$newImageName);
        $data=Product_Image::create([
            'product_id'=>$req->input('selectProduct'),
             'image'=>$newImageName,
             'alt'=>$req->input('alt')
        ]);
        return redirect('image-list')->with('success','Image has been added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product_Image  $product_Image
     * @return \Illuminate\Http\Response
     */
    public function show(Product_Image $product_Image)
    {
        $images=Product_Image::paginate(7);
        return view('product.product-image.proimg-list',compact('images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product_Image  $product_Image
     * @return \Illuminate\Http\Response
     */
    public function edit(Product_Image $product_Image,$id)
    {
        $data=Product_Image::findOrFail($id);
        $products=Product::all();
        return view('product.product-image.proimg-edit',compact('data','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product_Image  $product_Image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, Product_Image $product_Image)
    {
        $req->validate([
            'selectProduct'=>'required',
            'product_image'=>'image|mimes:jpeg,jpg,png,gif',
            'alt'=>'required'
        ]);
 
        $data=Product_Image::findOrFail($req->id);
        $data->product_id=$req->selectProduct;
        if($req->hasFile('product_image')){
            $newImageName= time(). '.' . $req->product_image->getClientOriginalName();
            $req->product_image->move(public_path('dist/images'),$newImageName);
            $data->image= $newImageName;
        }

        $data->alt=$req->alt;
        $data->save();
        return redirect('image-list')->with('success','Image has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product_Image  $product_Image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product_Image $product_Image,$id)
    {
      $data=Product_Image::findOrFail($id);
      $data->destroy('id',$id);
      return back()->with('success','Image has been deleted successfully.');
    }
}
