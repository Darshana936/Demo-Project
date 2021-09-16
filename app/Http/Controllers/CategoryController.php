<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        //
        $category=Category::whereNull('parent_id')->get();
        return view('category.category-create')->with('categories',$category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //
        $regex ='/^[A-Za-z0-9 &]+$/';
        $req->validate([
            'name'=> 'required|regex:'.$regex
            
        ]);

        $category=Category::create([
             'name'=> $req->input('name'),
             'parent_id'=>$req->input('parent_id')
        ]);

        return redirect('category-list')->with('success', 'Category has been craeted successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
        $category=Category::paginate(10);
        return view('category.category-list')->with('categories',$category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, $id)
    {
        //
        $categories=Category::whereNull('parent_id')->get();
        $category=Category::find($id);
        return view('category.category-edit',compact('categories','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        
        $regex ='/^[A-Za-z0-9 &]+$/';

        $req->validate([
            'name'=> 'required|regex:'.$regex
            
        ]);

        $data=Category::find($req->id);
    
        $data->name=$req['name'];
        $data->parent_id=$req['parent_id'];
        $data->save();
         return redirect('category-list')->with('success', 'Category has been updated successfully.');
} 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category,$id)
    {
        $data=Category::find($id);
        if($data->parent_id==null)
            Category::where('parent_id', '=', $id)->delete();
           
        $data->destroy('id',$id);

        return back()->with('success', 'Category has been deleted successfully.');
   }
}
