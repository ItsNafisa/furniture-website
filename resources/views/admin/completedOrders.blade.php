@extends('admin.home')
@section('mybody')

<div class="cardHeader">
                        <h2>Completed Orders</h2>
                    </div>
                    @if($orders->count() > 0)
                    <table>
                        <thead>
                            <tr>
                            <td>Order Date</td>
            <td>Total Price</td>
            <td >Order Status</td>
            <td>Action</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($orders as $order)
                            <tr>
     <td>{{date('d-m-y', strtotime($order->created_at))}}</td>
            <td>{{$order->total_price}}</td>
            <td>{{$order->order_status== 0 ? 'Pending' : 'Completed'}}</td>
            <td><a href="{{url('/admin-view-order',$order->id)}}"><button class="btn btn-primary" style="background-color:#2a2185;">View Order</button></a></td>
                            </tr>
@endforeach
                         
                        </tbody>
                    </table>
                    @else
<h3 class="text-center">No Completed Orders</h3>
                    @endif
@endsection('mybody')

