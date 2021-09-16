@extends('layouts.master')
@section('pagename','Edit Banner')

@section('content')

<div class="card card-primary" style="width:70%">
  <div class="card-header">
    <h3 class="card-title">Edit Banner</h3>
  </div>
  <form method="POST" action="{{route('banner-edited')}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$data->id}}">
    <div class="card-body">
      <div class="form-group" style="height:75px;">
        <label for="name">Name</label><br>
        <input type="text" name="name" class="form-control" id="Bannername" value="{{$data->name}}">
        <span>@error('name'){{$message}}@enderror</span>
        <span id="checkBname"></span>
      </div>

      <div class="form-group">
        <label for="image">Upload Image</label><br>

        <input type="file" name="image" class="form-control" id="BannerImgEdit">
        <span>@error('image'){{$message}}@enderror</span>
        <span id="checkBannerImgEdit"></span>
      </div>

      <div class="form-group">
        <img src="{{asset('dist/images/'.$data->image)}}" height="75px" width="75px" alt="banner">
      </div>
      <div class="form-group" style="height:75px;">
        <label for="link">Redirection Link</label><br>
        <input type="URL" name="link" class="form-control" id="BannerLink" value="{{$data->redirection_link}}">
        <span>@error('link'){{$message}}@enderror</span>
        <span id="checkUrl"></span>
      </div>


    </div>
    <div class="card-footer">
    <a href="{{route('banner-show')}}" class="btn btn-secondary">Cancel</a>

      <button type="submit" class="btn btn-primary" id="submitBannerEdit">Save Changes</button>
    </div>

  </form>





  @endsection