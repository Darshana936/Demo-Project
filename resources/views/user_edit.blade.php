
 @extends('layouts.master')
@section('pagename','Edit User')

 @section('content')
    <div class="card card-primary" style="width:70%">
        <div class="card-header">
        <h3 class="card-title">Edit User</h3>
        </div>
    
        <form method="POST" action="{{route('useredited')}}" id="userForm" >
        @csrf
            <div class="card-body">
           
            
                <input type="hidden" name="id" value="{{$data['id']}}">
                <div class="form-group" style="height:75px;">
                    <label for="firstname">First Name</label><br>
                    <input type="text" name="firstname" value="{{$data['firstname']}}" class="form-control" id="firstname">
                    <span style="color: red;">@error('firstname'){{$message}}@enderror</span>
                    <span id="checkFname"></span>
                </div>
                <div class="form-group" style="height:75px;">
                    <label for="lastname">Last Name</label><br>
                    <input type="text" name="lastname" value="{{$data['lastname']}}" class="form-control" id="lastname">
                    <span style="color: red;">@error('lastname'){{$message}}@enderror</span>
                    <span id="checkLname"></span>
                </div>
                <div class="form-group" style="height:75px;">
                    <label for="email">Email</label><br>
                    <input type="text" name="email" value="{{$data['email']}}" class="form-control" id="email">
                    <span style="color: red;">@error('email'){{$message}}@enderror</span>
                    <span id="checkMail"></span>  
                </div>
            <div class="form-group" style="height:75px;">
                    <label>Status</label><br>
                  <input type="radio" value="active" {{ ($data['status']=='active')? "checked" : "" }} name="status" ><label style="margin: 5px; font:inherit;"> Active</label> 


                   <input type="radio" value="inactive" {{ ($data['status']=='inactive')? "checked" : "" }} name="status">
                   <label style="margin: 5px; font:inherit;">Inactive</label>
                  <span style="color: red;">@error('status'){{$message}}@enderror</span>
                  <span id="checkRadio"></span>
                </div>
                
                <div class="form-group" style="height:75px; margin-bottom:0px">
                    <label for="cat">Select role</label><br>

                    <select name="role" id="optcategory" class="form-control" >
                        <option value="{{$data['role']}}">{{$data['role']}}</option>
                        @foreach($roles as $role)
                        @if($role->role_name!==$data['role'])
                        <option>{{$role->role_name}}</option>
                        @endif
                        @endforeach
                        
                    </select>
                </div>          
            </div>
            <div class="card-footer">
            <a href="{{route('user-show')}}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
        </form>
        
    </div>
  
@endsection