
 @extends('layouts.master')
 @section('pagename','Product List')

 @section('content')

 

 
    <div class="card" >  
   
    <div class="card-header">
        <h3 class="card-title">Product List</h3>
        <a href='product-create'>
    <button   class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add Product</button></a>
    </div>

  
        <div class="card-body p-0">
            <table class="table table-striped">
            
                <tr>
                    <th>S.no</th>
                    <th>Product Name</th>
                    <th style="width: 250px;">Description</th>
                    <th>Category Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                  
                    <th style="text-align: center;">Action</th>
                </tr>

                @foreach($products as $key=>$product)
               
                    <tr>
                    <td> {{$key+$products->firstItem()}} </td>
                    <td> {{$product->name}} </td>
                    <td> {{$product->description}} </td>
                    <td> 
                    @if($product->category_id)    
                  
                        {{$product->category->name}} 
                       
                    @endif
                </td>
                <td> {{$product->price}} </td>
                <td> {{$product->stock}} </td>
                    
                    <td class="project-actions text-right">
                    <a href="product-edit/{{$product->id}}" class="btn-info btn btn-sm" ><i class="fas fa-pencil-alt">
            </i>Edit</a>
                    <a href="product-delete/{{$product->id}}" onclick="return confirm('Are you sure to delete this item?')" class="btn-danger btn btn-sm" ><i class="fas fa-trash"></i>Delete</a>
                    </td>
                    </tr>                
                @endforeach

            </table>
         
        </div>
        <div class="card-footer clearfix">
            {{$products->links()}}
          
              </div>
    </div>

@endsection
