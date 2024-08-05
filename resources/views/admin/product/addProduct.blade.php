@extends('admin.home')
@section('mybody')
<form class="container mb-5" action="{{url('/product-store')}}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="form-group mt-5">
<label>Product Name</label>
<input type="text" class="form-control mt-2" placeholder="Enter product name" name='name'>
    </div>
    @error('name')
<div class="alert alert-danger mt-2">{{$message}}</div>
@enderror


    <div class="form-group mt-5">
<label>Product Price</label>
<input type="text" class="form-control mt-2" placeholder="Enter product price" name='price'>
    </div>
    @error('price')
<div class="alert alert-danger mt-2">{{$message}}</div>
@enderror



    <div class="form-group mt-5">
<label>Discount</label>
<input type="text" class="form-control mt-2" placeholder="Enter discount" name='discount'>
    </div>
    @error('discount')
<div class="alert alert-danger mt-2">{{$message}}</div>
@enderror



    <div class="form-group mt-5">
<label>Product image</label>
<input type="file" name='image'>
    </div>
    @error('image')
<div class="alert alert-danger mt-2">{{$message}}</div>
@enderror



    <div class="form-group mt-5">
<label>Product Description</label>
<input type="text" class="form-control mt-2" placeholder="Enter product description" name='description'>
    </div>
    @error('description')
<div class="alert alert-danger mt-2">{{$message}}</div>
@enderror



    <div class="form-group mt-5">
<label>Product Quantity</label>
<input type="number" class="mt-2"  name='quantity' value="1">
    </div>
    @error('quantity')
<div class="alert alert-danger mt-2">{{$message}}</div>
@enderror


    <label class="mb-3 mt-3">Stock Status</label>
<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="stock_status">
<option value="instock">in stock</option>
<option value="outofstock">out of stock</option>
</select>



<label class="mb-3 mt-3">Select Category</label>
<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="category_id">
    @foreach($categories as $category)
    <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
<!-- <option selected>in stock</option> -->

</select>

<button type="submit" class=" mt-5 btn btn-danger text-white w-100">Add</button>
</form>
@endsection('mybody')