
 @extends('layouts.master')
 @section('pagename','Edit Product')

 @section('content')

 <div class="card card-primary"style="width:70%" >
 <div class="card-header">
        <h3 class="card-title">Edit Product</h3>
</div>
        <form method="POST" action="{{route('product-edited')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$data->id}}">
            <div class="card-body">
            <div class="form-group" style="height:75px;">
                    <label for="name">Product Name</label><br>
                    <input type="text" name="name" class="form-control" id="ProName" value="{{$data->name}}">
                <span>@error('name'){{$message}}@enderror</span>
                <span id="checkProName"></span>

                </div>

                <div class="form-group" >
                <label for="description">Description</label><br>
                <textarea class="form-control" type="text" name="description" rows="3" id="ProDescription">{{$data->description}}</textarea></textarea>
                <span>@error('description'){{$message}}@enderror</span>
                <span id="checkProDescription"></span>

                </div>

               
                
                <div class="form-group" style="height:75px;">
                    <label for="category">Category</label>
                    <select name="category" class="custom-select" id="ProCategory">
                       
                        @foreach($categories as $category)
                         <option value="{{$category->id}}" @if($data->category_id==$category->id) selected @endif>{{$category->name}}</option>
                        @endforeach
                    </select>
                    <span>@error('category'){{$message}}@enderror</span>
                    <span id="checkProCategory"></span>

                </div> 
                <div class="form-group" style="height:75px;">
                    <label for="price">Price</label><br>
                    <input type="number" step="any" name="price" class="form-control" id="ProPrice" value="{{$data->price}}">
                <span>@error('price'){{$message}}@enderror</span>
                <span id="checkProPrice"></span>

                </div>   
            <div class="form-group" style="height:75px;">
                    <label for="stock">Stock</label><br>
                    <input type="number" name="stock" class="form-control" id="ProStock" value="{{$data->stock}}">
                <span>@error('stock'){{$message}}@enderror</span>
                <span id="checkProStock"></span>

                </div>           
            </div>
            <div class="card-footer">
            <a href="{{route('product-list')}}" class="btn btn-secondary">Cancel</a>

                  <button type="submit" class="btn btn-primary" id="ProSubmit">Save Changes</button>
                </div>
        </form>
 

  
        
@endsection