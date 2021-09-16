@extends('layouts.master')
@section('pagename','Edit Category')

@section('content')

<div class="card card-primary" style="width:70%">
    <div class="card-header">
        <h3 class="card-title">Edit Category</h3>
    </div>
    <form method="POST" action="{{route('category-edited')}}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
        <input type="hidden" name="id" value="{{$category->id}}">
            <div class="form-group" style="height:75px;">
                <label for="name">Name</label><br>
                <input type="text" name="name" class="form-control"  id="catName" value="{{$category->name}}">
                <span style="color: red;">@error('name'){{$message}}@enderror</span>
                <span id="checkCatname"></span>
            </div>



            <div class="form-group" style="height:75px;">
                <label for="subcategory">Subcategory of</label><br>
                <select name="parent_id" class="custom-select">
                    <option value="" @if($category->parent_id==NULL) selected @endif>No Subcategory</option>
                    @foreach($categories as $row)
                    <option value="{{$row->id}}" @if($category->parent_id!=NULL && $category->parent_id==$row->id) selected @endif>{{$row->name}}</option>
                    @endforeach
                </select>

            </div>


        </div>
        <div class="card-footer">
        <a href="{{route('category-list')}}" class="btn btn-secondary">Cancel</a>

            <button type="submit" class="btn btn-primary" id="CatSubmit">Save Changes</button>
        </div>
    </form>




    @endsection