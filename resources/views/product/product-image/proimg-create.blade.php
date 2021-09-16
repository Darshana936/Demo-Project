
 @extends('layouts.master')
 @section('pagename','Add product-image')

 @section('content')

 <div class="card card-primary"style="width:70%" >
 <div class="card-header">
        <h3 class="card-title">Add product-image</h3>
</div>
        <form method="POST" action="{{route('imageCreate')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group" style="height:75px;">
                    <label for="selectProduct">Select Product</label><br>
                    <select name="selectProduct" class="custom-select" value="{{Request::old('selectProduct')}}" id="selectImgProduct">
                        <option selected disabled>--select--</option>
                        @foreach($products as $product)
                           <option value="{{$product->id}}">{{$product->name}}</option>
                        @endforeach
                    </select>
                <span>@error('selectProduct'){{$message}}@enderror</span>
                <span id="checkselectImgProduct"></span>
                </div>
                
      <div class="form-group" style="height:75px;">
        <label for="product_image">Image</label><br>
       
         <input type="file" name="product_image" class="form-control" id="ProImage" >
         <span>@error('product_image'){{$message}}@enderror</span>
         <span id="checkProImage"></span>
      </div>
      <div class="form-group" style="height:75px;">
                    <label for="name">Alt</label><br>
                    <input type="text" name="alt" class="form-control" id="ProImageAlt" value="{{Request::old('alt')}}">
                <span>@error('alt'){{$message}}@enderror</span>
                <span id="checkProImageAlt"></span>
    </div>
                                      
            </div>
            <div class="card-footer">
            <a href="{{route('image-list')}}" class="btn btn-secondary">Cancel</a>
                  <button type="submit" class="btn btn-primary" id="ProImageSubmit">Submit</button>
                </div>
        </form>
 

  
        
@endsection