
 @extends('layouts.master')
 @section('pagename','Banner List')

 @section('content')

 

 
    <div class="card" style="width: 80%;" >  
   
    <div class="card-header">
        <h3 class="card-title">Banner List</h3>
        <a href='banner-create'>
    <button   class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add Banner</button></a>
    </div>

  
        <div class="card-body p-0">
            <table class="table table-striped">
            
                <tr>
                    <th>S.no</th>
                    <th>BANNER NAME</th>
                    
                    <th>IMAGE</th>
                    <th>URL</th>
                    <th style="text-align: center;">ACTION</th>
                </tr>

                @foreach($banners as $key=>$banner)
                    <tr>
                    <td> {{$key+$banners->firstItem()}} </td>
                    <td> {{$banner->name}} </td>
                    <td> <img src="dist/images/{{$banner->image}}" width="60px" height="60px"> </td>
                    <td> <a href="{{$banner->redirection_link}}">{{$banner->redirection_link}}</a> </td>
 
                    <td class="project-actions text-right">
                    <a href="banner-edit/{{$banner->id}}" class="btn-info btn btn-sm" ><i class="fas fa-pencil-alt">
            </i>Edit</a>
                    <a href="banner-delete/{{$banner->id}}" onclick="return confirm('Are you sure to delete this item?')" class="btn-danger btn btn-sm" ><i class="fas fa-trash"></i>Delete</a>
                    </td>
                    </tr>                
                @endforeach

            </table>
         
        </div>
        <div class="card-footer clearfix">
            {{$banners->links()}}
           
              </div>
    </div>

@endsection
