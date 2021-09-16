
 @extends('layouts.master')
 @section('pagename','Add Category')

 @section('content')

 <div class="card card-primary"style="width:70%" >
 <div class="card-header">
        <h3 class="card-title">Add Category</h3>
</div>
        <form method="POST" action="{{route('create-store')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group" style="height:75px;">
                    <label for="name">Name</label><br>
                    <input type="text" name="name" class="form-control" id="catName" value="{{Request::old('name')}}">
                <span style="color: red;">@error('name'){{$message}}@enderror</span>
                <span id="checkCatname"></span>
                </div>
              

                 
                <div class="form-group" style="height:75px;">
                    <label for="subcategory">Subcategory of</label><br>
                    <select name="parent_id" class="custom-select">
                        <option value="">No Subcategory</option>
                        @foreach($categories as $category)
                         <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                   
                </div>
                
                         
            </div>
            <div class="card-footer">
            <a href="{{route('category-list')}}" class="btn btn-secondary">Cancel</a>

                  <button type="submit" class="btn btn-primary" id="CatSubmit">Submit</button>
                </div>
        </form>
 

  
        
@endsection