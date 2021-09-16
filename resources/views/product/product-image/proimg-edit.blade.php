
 @extends('layouts.master')
 @section('pagename','Edit product-image')

 @section('content')

 <div class="card card-primary"style="width:70%" >
 <div class="card-header">
        <h3 class="card-title">Edit product-image</h3>
</div>
        <form method="POST" action="{{route('image-edited')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$data->id}}">
            <div class="card-body">
                <div class="form-group" style="height:75px;">
                    <label for="selectProduct">Select Product</label><br>
                    <select name="selectProduct" class="custom-select" id="selectImgProduct">
                        
                        @foreach($products as $product)
                           <option value="{{$product->id}}" @if($data->product_id==$product->id) selected @endif>{{$product->name}}</option>
                        @endforeach
                    </select>
                <span>@error('selectProduct'){{$message}}@enderror</span>
                <span id="checkselectImgProduct"></span>

                </div>
                
      <div class="form-group" style="height:75px;">
        <label for="product_image">Image</label><br>
       
         <input type="file" name="product_image" class="form-control" id="ProImageEdit">
         <span>@error('product_image'){{$message}}@enderror</span>

         <span id="checkProImageEdit"></span>
      </div>

      <div class="form-group">
       <img src="{{asset('dist/images/'.$data->image)}}" height="75px" width="75px" >
      </div>
      <div class="form-group" style="height:75px;">
                    <label for="name">Alt</label><br>
                    <input type="text" name="alt" class="form-control" id="ProImageAlt" value="{{$data->alt}}">
                <span>@error('alt'){{$message}}@enderror</span>
                <span id="checkProImageAlt"></span>
    </div>
                                      
            </div>
            <div class="card-footer">
            <a href="{{route('image-list')}}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary" id="ProImageEditSubmit">Save Changes</button>
                </div>
        </form>
 

  
        
@endsection