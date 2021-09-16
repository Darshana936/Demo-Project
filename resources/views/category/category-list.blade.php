
 @extends('layouts.master')
 @section('pagename','Category List')

 @section('content')

 

 
    <div class="card" style="width: 80%;" >  
   
    <div class="card-header">
        <h3 class="card-title">Category List</h3>
        <a href='category-create'>
    <button   class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add Category</button></a>
    </div>

  
        <div class="card-body p-0">
            <table class="table table-striped">
            
                <tr>
                    <th>S.no</th>
                    <th>Category Name</th>
                    
                    <th>Parent Category Name</th>
                  
                    <th style="text-align: center;">Action</th>
                </tr>

                @foreach($categories as $key=>$category)
               
                    <tr>
                    <td> {{$key+$categories->firstItem()}} </td>
                    <td> {{$category->name}} </td>
                    <td> 
                    @if($category->parent_id)    
                  
                        {{$category->parent->name}} 
                       
                    @else
                        No Parent category
                    @endif
                </td>
                    
                    <td class="project-actions text-right">
                    <a href="category-edit/{{$category->id}}" class="btn-info btn btn-sm" ><i class="fas fa-pencil-alt">
            </i>Edit</a>
                    <a href="category-delete/{{$category->id}}" onclick="return confirm('Are you sure to delete this item?')" class="btn-danger btn btn-sm" ><i class="fas fa-trash"></i>Delete</a>
                    </td>
                    </tr>                
                @endforeach

            </table>
         
        </div>
        <div class="card-footer clearfix">
            {{$categories->links()}}
          
              </div>
    </div>

@endsection
