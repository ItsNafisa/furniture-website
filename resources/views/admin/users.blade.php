@extends('admin.home')
@section('mybody')
<div class="cardHeader">
                        <h2>All Users</h2>
                       
                    </div>
                    @if($users->count() > 0)
                    <table>
                        <thead>
                            <tr>
                           
            <td>Name</td>
            <td>Image</td>
            <td>Address</td>
            <td>Orders Number</td>
           
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($users as $user)
                            <tr>
                           
            <td>{{$user->name}}</td>
            <td><img src="{{asset('userImage/'.$user->image)}}" style="height:70px;width:70px;border-radius:50%;"></td>
            <td>{{$user->address}}</td>
            <td>{{$user->orders->count()}}</td>
          
                            </tr>
@endforeach
                         
                        </tbody>
                    </table>
                    @else
<h3 class="text-center">No Available User</h3>
                    @endif
@endsection('mybody')

