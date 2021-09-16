
 @extends('layouts.master')
 @section('pagename','Image List')

 @section('content')

 

 
    <div class="card" style="width: 80%;" >  
   
    <div class="card-header">
        <h3 class="card-title">Image List</h3>
        <a href='image-create'>
    <button   class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add Image</button></a>
    </div>

  
        <div class="card-body p-0">
            <table class="table table-striped">
            
                <tr>
                    <th>S.no</th>
                    <th>Product Name</th>               
                    <th>Image</th>
                    <th>Alt</th>
                    <th style="text-align: center;">ACTION</th>
                </tr>

                @foreach($images as $key=>$image)
                    <tr>
                    <td> {{$key+$images->firstItem()}} </td>
                    <td>  @if($image->product_id)    
                  
                             {{$image->product->name}} 
                          @endif 
                     </td>
                    <td> <img src="dist/images/{{$image->image}}" width="75px" height="75px"> </td>
                    <td>{{$image->alt}} </td>
 
                    <td class="project-actions text-right">
                    <a href="image-edit/{{$image->id}}" class="btn-info btn btn-sm" ><i class="fas fa-pencil-alt">
            </i>Edit</a>
                    <a href="image-delete/{{$image->id}}" onclick="return confirm('Are you sure to delete this item?')" class="btn-danger btn btn-sm" ><i class="fas fa-trash"></i>Delete</a>
                    </td>
                    </tr>                
                @endforeach

            </table>
         
        </div>
        <div class="card-footer clearfix">
            {{$images->links()}}
           
              </div>
    </div>

@endsection
