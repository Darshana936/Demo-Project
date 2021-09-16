
 @extends('layouts.master')
 @section('pagename','Add Banner')

 @section('content')

 <div class="card card-primary"style="width:70%" >
 <div class="card-header">
        <h3 class="card-title">Add Banner</h3>
</div>
        <form method="POST" action="{{route('bannerCreate')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group" style="height:75px;">
                    <label for="name">Name</label><br>
                    <input type="text" name="name" class="form-control" id="Bannername" value="{{Request::old('name')}}">
                <span style="color: red;">@error('name'){{$message}}@enderror</span>
                <span id="checkBname"></span>
                </div>
                
                <div class="form-group">
        <label for="image">Upload Image</label><br>
       
    <input type="file" name="image" class="form-control" id="BannerImg" >
        <span style="color: red;">@error('image'){{$message}}@enderror</span>
        <span id="checkImg"></span>
      </div>

                 
                <div class="form-group" style="height:75px;">
                    <label for="link">Redirection Link</label><br>
                    <input type="URL" name="link" class="form-control" id="BannerLink" value="{{Request::old('link')}}">
                    <span style="color: red;">@error('link'){{$message}}@enderror</span>
                    <span id="checkUrl"></span>
                </div>
                
                         
            </div>
            <div class="card-footer">
            <a href="{{route('banner-show')}}" class="btn btn-secondary">Cancel</a>

           <button type="submit" class="btn btn-primary" id="submitBanner">Submit</button>
                </div>
        </form>
 

  
        
@endsection