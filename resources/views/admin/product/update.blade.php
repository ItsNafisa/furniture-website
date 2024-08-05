@extends('admin.home')
@section('mybody')
<form class="container mb-5" action="{{url('/product-update',$product->slug)}}" method="POST" enctype="multipart/form-data">
    <!-- @method('PUT') -->
    @csrf
<div class="form-group mt-5">
<label>Product Name</label>
<input type="text" class="form-control mt-2" placeholder="Enter category name" name='name' value="{{$product->name}}">
    </div>
 

    <div class="form-group mt-5">
<label>Product Price</label>
<input type="text" class="form-control mt-2" placeholder="Enter category price" name='price' value="{{$product->price}}">
    </div>

    <div class="form-group mt-5">
<label>Product Discount</label>
<input type="text" class="form-control mt-2" placeholder="Enter category discount" name='discount' value="{{$product->discount}}">
    </div>


    <label class="mt-4">Old Image</label><br><br>
<img src="{{asset('productImage/'.$product->image)}}" style="height:100px;width:100px;" >


    <div class="form-group mt-5">
<label>Add New Image</label><br><br>
<input type="file" name='image'>
    </div>
 
    <div class="form-group mt-5">
<label>Product Description</label>
<input type="text" class="form-control mt-2" placeholder="Enter category description" name='description' value="{{$product->description}}">
    </div>


    <div class="form-group mt-5">
<label>Product Quantity</label>
<input type="text" class="form-control mt-2" placeholder="Enter category name" name='quantity' value="{{$product->quantity}}">
    </div>


    <label class="mb-3 mt-3">Stock Status</label>
<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="stock_status">
<option value="instock">in stock</option>
<option value="outofstock">out of stock</option>
</select>


<label class="mb-3 mt-3">Select Category</label>
<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="category_id">
    @foreach($categories as $category)
    <option value="{{$category->id}}" {{$product->category_id == $category->id?'selected':''}}>{{$category->name}}</option>
    @endforeach
<!-- <option selected>in stock</option> -->

</select>


    <button type="submit" class=" mt-5 btn btn-danger text-white w-100">Update</button>
</form>
@endsection('mybody')