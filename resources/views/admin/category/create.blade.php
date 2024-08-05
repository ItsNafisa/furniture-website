@extends('admin.home')
@section('mybody')
<form class="container mb-5" action="{{url('/category-store')}}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="form-group mt-5">
<label>Category Name</label>
<input type="text" class="form-control mt-2" placeholder="Enter category name" name='name'>
    </div>
    @error('name')
<div class="alert alert-danger mt-2">{{$message}}</div>
@enderror



    <div class="form-group mt-5">
<label>Category Image</label><br><br>
<input type="file" name='image'>
    </div>
    @error('image')
<div class="alert alert-danger mt-2">{{$message}}</div>
@enderror
    <button type="submit" class=" mt-5 btn btn-danger text-white w-100">Add</button>
</form>
@endsection('mybody')