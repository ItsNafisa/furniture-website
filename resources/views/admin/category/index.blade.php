
@extends('admin.home')
@section('mybody')
@if($categories->count() > 0)
@if(Session::has('category_deleted_successfully'))
<div class="alert alert-success">
    {{Session::get('category_deleted_successfully')}}
</div>
@endif
@if(Session::has('category_added_successfully'))
<div class="alert alert-success">
    {{Session::get('category_added_successfully')}}
</div>
@endif
@if(Session::has('category_updated_successfully'))
<div class="alert alert-success">
    {{Session::get('category_updated_successfully')}}
</div>
@endif
<div class="cardHeader">
                        <h2>All Categories</h2>
                        <a href="{{url('/add-category')}}" class="btn">Add Category</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Image</td>
                                <td>Products Number</td>
                                <td>Action</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                               
                                <td>{{$category->name}}</td>
                                <td>
                                    <img src="{{asset('categoryImage/'.$category->image)}}" style="height:170px;width:170px;">
                                    <!-- <object type="image/svg+xml" data="{{asset('categoryImage/'.$category->image)}}" style="height:170px;width:170px;"></object> -->
                                </td>
                                <td>{{$category->products->count()}}</td>
                                <td><a href="{{url('/category-edit',$category->slug)}}"><button class="btn btn-primary" style="background-color:#2a2185;">Edit</button></a>
            <a href="{{url('/category-delete',$category->id)}}"><button class="btn btn-danger">Delete</button></a>
                            </tr>
@endforeach
                         
                        </tbody>
                    </table>
                    @else
<h3>No Category Yet</h3>
                    @endif
@endsection('mybody')  
