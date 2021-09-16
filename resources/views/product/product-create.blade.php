
 @extends('layouts.master')
 @section('pagename','Add Product')

 @section('content')

 <div class="card card-primary"style="width:70%" >
 <div class="card-header">
        <h3 class="card-title">Add Product</h3>
</div>
        <form method="POST" action="{{route('productCreate')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
            <div class="form-group" style="height:75px;">
                    <label for="name">Product Name</label><br>
                    <input type="text" name="name" class="form-control" id="ProName" value="{{Request::old('name')}}">
                <span>@error('name'){{$message}}@enderror</span>
                <span id="checkProName"></span>
                </div>

                <div class="form-group" >
                <label for="description">Description</label><br>
                <textarea class="form-control" name="description" id="ProDescription" rows="3" placeholder="Enter ..." value="{{Request::old('description')}}"></textarea>
                <span>@error('description'){{$message}}@enderror</span>
                <span id="checkProDescription"></span>
                </div>

               
   
                <div class="form-group" style="height:75px;">
                    <label for="category">Category</label>
                    <select name="category" class="custom-select" value="{{Request::old('category')}}" id="ProCategory">
                        <option selected disabled value="">--Select Category--</option>
                        @foreach($categories as $category)
                         <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <span>@error('category'){{$message}}@enderror</span>
                    <span id="checkProCategory"></span>
                </div> 
                <div class="form-group" style="height:75px;">
                    <label for="price">Price</label><br>
                    <input type="number" step="any" name="price" min="0" class="form-control" id="ProPrice" value="{{Request::old('price')}}">
                <span>@error('price'){{$message}}@enderror</span>
                <span id="checkProPrice"></span>
                </div>   
            <div class="form-group" style="height:75px;">
                    <label for="stock">Stock</label><br>
                    <input type="number" min="0" name="stock" class="form-control" id="ProStock" value="{{Request::old('stock')}}">
                <span>@error('stock'){{$message}}@enderror</span>
                <span id="checkProStock"></span>
                </div>           
            </div>
            <div class="card-footer">
            <a href="{{route('product-list')}}" class="btn btn-secondary">Cancel</a>
                  <button type="submit" class="btn btn-primary" id="ProSubmit">Submit</button>
                </div>
        </form>
 

  
        
@endsection