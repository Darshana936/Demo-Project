
 @extends('layouts.master')
 @section('pagename','Add User')

 @section('content')

 <div class="card card-primary"style="width:70%" >
 <div class="card-header">
        <h3 class="card-title">Add User</h3>
</div>
        <form method="POST" action="{{route('creat-user')}}" >
            @csrf
            <div class="card-body">
                <div class="form-group" style="height:75px;">
                    <label for="firstname">First Name</label><br>
                    <input type="text" name="firstname" class="form-control" id="firstname" value="{{Request::old('firstname')}}">
                <span style="color: red;">@error('firstname'){{$message}}@enderror</span>
                <span id="checkFname"></span>
                </div>
                <div class="form-group" style="height:75px;">
                    <label for="lastname">Last Name</label><br>
                    <input type="text" name="lastname" class="form-control" id="lastname" value="{{Request::old('lastname')}}">
                    <span style="color: red;">@error('lastname'){{$message}}@enderror</span>
                    <span id="checkLname"></span>

                </div>
                <div class="form-group" style="height:75px;">
                    <label for="email">Email</label><br>
                    <input type="email" name="email" class="form-control" id="email" value="{{Request::old('email')}}">
                    <span style="color: red;">@error('email'){{$message}}@enderror</span>
                    <span id="checkMail"></span>
                </div>
                <div class="form-group" style="height:75px;">
                    <label for="password">Password</label><br>
                    <input type="password" name="password" class="form-control" id="password" value="{{Request::old('password')}}">
                    <span style="color: red;">@error('password'){{$message}}@enderror</span>
                    <span id="checkPass"></span>
                </div>
                <div class="form-group" style="height:75px;">
                    <label for="conf-password">Confirm Password</label><br>
                    <input type="password" name="password_confirmation" class="form-control" id="conf-password" value="{{Request::old('password_confirmation')}}">
                <span style="color: red;">@error('password_confirmation'){{$message}}@enderror</span>  
            <span id="checkConpass"></span>              
        </div>
                <div class="form-group" style="height:75px;">
                    <label>Status</label><br>
                 <input type="radio" value="active" {{Request::old('status')=='active' ? 'checked':''}} name="status" class="" >
                  <label style="margin: 5px; font:inherit;"> Active</label>

                   <input type="radio" value="inactive"  {{Request::old('status')=='inactive' ? 'checked':''}} name="status" class="">
                   <label style="margin: 5px; font:inherit;">Inactive</label><br>
            <span style="color: red;">@error('status'){{$message}}@enderror</span>
            <span id="checkRadio"></span>
                        </div>
                
                <div class="form-group" style="height:75px; margin-bottom:0px;">
                    <label for="cat">Select Role</label><br>

                    <select name="role" id="optcategory" class="custom-select" value="{{Request::old('role')=='$role->role_name'?'selected':''}}">
                        <option value="" selected disabled >--select--</option>
                        @foreach($roles as $role)
                       
                        <option value="{{$role->role_name}}" >{{$role->role_name}}</option>
                        
                        @endforeach
                        
                    </select>
                    </div>          
            </div>
            <div class="card-footer">
                  <a href="{{route('user-show')}}" class="btn btn-secondary">Cancel</a>
                  <button type="submit" class="btn btn-primary" id="submitbtn">Submit</button>
                </div>
        </form>
 

    </div>
  
@endsection

