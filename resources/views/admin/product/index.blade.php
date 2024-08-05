@extends('admin.home')
@section('mybody')
@if($products->count() > 0)
@if(Session::has('product_deleted_successfully'))
<div class="alert alert-success">
    {{Session::get('product_deleted_successfully')}}
</div>
@endif
@if(Session::has('product_added_successfully'))
<div class="alert alert-success">
    {{Session::get('product_added_successfully')}}
</div>
@endif
@if(Session::has('product_updated_successfully'))
<div class="alert alert-success">
    {{Session::get('product_updated_successfully')}}
</div>
@endif
<div class="cardHeader">
                        <h2>Products</h2>
                        <a href="{{url('/add-product')}}" class="btn">Add Product</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                            
            <td>Name</td>
            <td >Image</td>
            <!-- <th scope="col">quantity</th> -->
            <td >Product category</td>
            <td >stock_status</td>
            <td >Price</td>
            <td >Discount</td>
            <td >Price after discounting</td>
            <td >Action</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($products as $product)
                            <tr>
                          
            <td>{{$product->name}}</td>
       <td><img src="{{asset('productImage/'.$product->image)}}" style="height:70px;width:70px;border-raduis:50%;"></td>
            <!-- <td>{{$product->quantity}}</td> -->
            <td>{{$product->category->name}}</td>
            <td>{{$product->stock_status}}</td>
            <td>{{$product->price}}</td>
          @if($product->discount)
          <td>{{$product->discount}}%</td>
          @else
        <td>0%</td>
          @endif
          @if($product->price_after_discounting=='' || $product->price_after_discounting=='0' || $product->price_after_discounting=='NULL')
          <td>No discount</td>
          @else
          <td>{{$product->price_after_discounting}}</td>
          @endif
            <td><a href="{{url('/product-edit',$product->slug)}}"><button class="btn btn-primary" style="background-color:#2a2185;">Edit</button></a>
            <a href="{{url('/product-delete',$product->id)}}"><button class="btn btn-danger">Delete</button></a></td>
                            </tr>
@endforeach
                         
                        </tbody>
                    </table>
                    @else
<h3>No Product yet</h3>
                    @endif
@endsection('mybody')

