@extends('admin.home')
@section('mybody')
<form class="container mb-5" action="{{url('/category-update',$category->slug)}}" method="POST" enctype="multipart/form-data">
    <!-- @method('PUT') -->
    @csrf
<div class="form-group mt-5">
<label>Category Name</label>
<input type="text" class="form-control mt-2" placeholder="Enter category name" name='name' value="{{$category->name}}">
    </div>
 

    <label class="mt-4">Old Image</label><br><br>
<img src="{{asset('categoryImage/'.$category->image)}}" style="height:100px;width:100px;" >


    <div class="form-group mt-5">
<label>Add New Image</label><br><br>
<input type="file" name='image'>
    </div>
 

    <button type="submit" class=" mt-5 btn btn-danger text-white w-100">Update</button>
</form>
@endsection('mybody')