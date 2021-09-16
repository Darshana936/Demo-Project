
 @extends('layouts.master')
 @section('pagename','User List')

 @section('content')

 

 
    <div class="card" >  
   
    <div class="card-header">
        <h3 class="card-title">User List</h3>
        <a href='create'>
    <button   class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add User</button></a>
    </div>

  
        <div class="card-body p-0">
            <table class="table table-striped">
            
                <tr>
                    <th>S.no</th>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>EMAIL</th>
                    <th>STATUS</th>
                    <th>ROLE</th>
                    <th>ACTION</th>
                </tr>
                @foreach($users as $key=>$user)
                
                    <tr>
                        
                    <td> {{$key+$users->firstItem()}} </td>
                    <td> {{$user->firstname}} </td>
                    <td> {{$user->lastname}} </td>
                    <td> {{$user->email}} </td>
                    <td> {{$user->status}} </td>
                    <td> {{$user->role}} </td>
                    <td class="project-actions text-right">
                    <a href="useredit/{{$user->id}}" class="btn-info btn btn-sm" ><i class="fas fa-pencil-alt">
            </i>Edit</a>
                    <a href="userdelete/{{$user->id}}" onclick="return confirm('Are you sure to delete this item?')" class="btn-danger btn btn-sm" ><i class="fas fa-trash"></i>Delete</a>
                    </td>
                    </tr>                
                @endforeach

            </table>
         
        </div>
        <div class="card-footer clearfix">
            {{$users->links()}}
             <!--   <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>-->
              </div>
    </div>

@endsection
