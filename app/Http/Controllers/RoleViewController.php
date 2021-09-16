<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\Post;




class RoleViewController extends Controller
{
    //
    public function get_role(){
        $roles = DB::select('select * from roles');
         return view('user_create')->with('roles',$roles); 
    }




 
    public function store(Request $req){
      $req->validate([
        'firstname'=>'required|alpha',
        'lastname'=>'required|alpha',
         'email' => 'required|email',
         'password' => 'required|confirmed|alpha_num|between:8,12',
        'password_confirmation' => 'required|same:password',
          'status'=>'required',
          
    ]);
              
  $post= new Post;
    $post->firstname= $req['firstname'];
    $post->lastname= $req['lastname'];
    $post->email= $req['email'];
    $post->password= $req['password'];
    $post->status= $req['status'];
    if($req['role']==null)
       $post->role= 'Customer';
    else
       $post->role= $req['role'];
      
    $post->save();
  /*  $firstname = $req->input('firstname');
    $lastname = $req->input('lastname');
    
    $email = $req->input('email');
    $password = $req->input('password');
    $status=$req->input('status');
    $role = $req->input('role');
    $data=array('firstname'=>$firstname,"lastname"=>$lastname,"email"=>$email,"password"=>$password,"status"=>$status,"role"=>$role);
    DB::table('posts')->insert($data);
*/
    return redirect('/usershow')->with('success', 'User has been created successfully.');
    

}

public function get_user(){
 //   $users = DB::select('select * from posts');
    $user=Post::paginate(10);
    return view('user_show')->with('users',$user); 
}


public function destroy($id){
   Post::destroy("id",$id);
   return redirect('usershow')->with('success', 'User has been deleted successfully.');
}

public function edit($id){
    $roles = DB::select('select * from roles'); 
    $data=Post::find($id);
    return view('user_edit',['data'=>$data])->with('roles',$roles);
  //return view('user_edit')->with('PostArr',Post::find($id)); 
}



public function update(Request $req){
 
  $req->validate([
    'firstname'=>'required|alpha',
    'lastname'=>'required|alpha',
     'email' => 'required|email',
    // 'password' => 'required|confirmed|alpha_num|between:8,12',
    
      'status'=>'required',
      
]);
   
     $data=Post::find($req->id);
     $data->firstname= $req['firstname'];
    $data->lastname= $req['lastname'];
    $data->email= $req['email'];
   
    $data->role= $req['role'];
    $data->save();

    return redirect('/usershow')->with('success', 'User has been updated successfully.');
}

}