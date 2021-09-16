<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    //
    public function createBanner(){
        return view('banner/banner-create');
    }

    public function storeBanner(Request $req){
        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';

        $req->validate([
             'name'=> 'required',
             'image'=>'required|image|mimes:jpeg,jpg,png,gif',
             'link'=>'required|regex:'.$regex
        ]);
        
       $newImageName= time(). '.' . $req->name . '.' . $req->image->extension();
       $req->image->move(public_path('dist/images'),$newImageName);

       $banner=Banner::create([
          'name' => $req->input('name'),
          'image' => $newImageName,
          'redirection_link' => $req->input('link')
       ]);
       return redirect('/banner-list')->with('success', 'Banner has been created successfully.');
    }

    public function bannerGet(){
           $banner=Banner::paginate(5);
           return view('banner.banner-list')->with('banners',$banner);
    }

    public function bannerEdit($id){
        $data=Banner::find($id);
        return view('banner.banner-edit')->with('data',$data);
    }
    public function bannerUpdate(Request $req){
     $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        $req->validate([
            'name'=> 'required',
            'image'=>'image|mimes:jpeg,jpg,png,gif',
            'link'=>'required|regex:'.$regex
       ]);
       
      
      $data=Banner::find($req->id);
     
      $data->name=$req['name'];
      if($req->hasFile('image')){
        $newImageName= time(). '.' . $req->name . '.' . $req->image->extension();
        $req->image->move(public_path('dist/images'),$newImageName);
  
      $data->image=$newImageName;

      }
      $data->redirection_link=$req['link'];
      $data->save();
      return redirect('/banner-list')->with('success', 'Banner has been updated successfully.');
    }

    public function bannerDestroy($id){
        $data=Banner::destroy('id',$id);
        return redirect('banner-list')->with('success', 'Banner has been deleted successfully.');
    }
}


