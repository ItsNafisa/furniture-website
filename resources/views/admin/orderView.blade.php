
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet"> 
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="{{url('/css/tiny-slider.css')}}" rel="stylesheet">
		<link rel="stylesheet" href="{{url('/css/style_New1.css')}}">
		<title>Furni Free Bootstrap 5 Template for Furniture and Interior Design Websites by Untree.co </title>
	</head>

	<body>


		

		<div class="untree_co-section">
		    <div class="container">
		     
		      <div class="row">
		        <div class="col-md-6 mb-5 mb-md-0">
		          <h2 class="h3 mb-3 text-black">Billing Details</h2>
                 
		          <div class="p-3 p-lg-5 border bg-white">
					
				  <div class="form-group row">
		              <div class="col-md-12">
		                <label for="c_companyname" class="text-black">Name </label>
		                <div>{{$orders->name}}</div>
		              </div>
		            </div>

                    <div class="form-group row">
		              <div class="col-md-12">
		                <label for="c_companyname" class="text-black">Email Address</label>
		                <div>{{$orders->email}}</div>
		              </div>
		            </div>

                    <div class="form-group row">
		              <div class="col-md-12">
		                <label for="c_companyname" class="text-black">Phone </label>
		                <div class="border p-2">{{$orders->phone}}</div>
		              </div>
		            </div>

                    <div class="form-group row">
		              <div class="col-md-12">
		                <label for="c_companyname" class="text-black">Shipping Address </label>
		                <div>{{$orders->address}}</div>
		              </div>
		            </div>


                    <div class="form-group row">
		              <div class="col-md-12">
		                <label for="c_companyname" class="text-black">City </label>
		                <div>{{$orders->city}}</div>
		              </div>
		            </div>


                    <div class="form-group row">
		              <div class="col-md-12">
		                <label for="c_companyname" class="text-black">State </label>
		                <div>{{$orders->state}}</div>
		              </div>
		            </div>



                    <div class="form-group row">
		              <div class="col-md-12">
		                <label for="c_companyname" class="text-black">Country </label>
		                <div>{{$orders->country}}</div>
		              </div>
		            </div>


		          </div>
		        </div>
		        <div class="col-md-6">


		          <div class="row mb-5">
		            <div class="col-md-12">
		              <h2 class="h3 mb-3 text-black">Your Order</h2>
		              <div class="p-3 p-lg-5 border bg-white">
		                <table class="table site-block-order-table mb-5">
		                  <thead>
		                    <th>Product Name</th>
		                    <th>Quantity</th>
                            <th>Price</th>
		                  </thead>
		                  <tbody>
						@foreach($orders->orderitems as $order)
<tr>
<td>{{$order->products->name}}</td>
<td>{{$order->quantity}}</td>
<td>{{$order->price * $order->quantity}}</td>
</tr>
                        @endforeach
		                  </tbody>
		                </table>
<h4>Grand Total: {{$orders->total_price}}</h4>
<label>Order Status</label>
<form action="{{url('update-order',$orders->id)}}" method="POST"> 
    @csrf
<select class="form-select" name="order_status">             
<option {{$orders->order_status==0 ? 'selected' : ''}} value='0'>Pending</option>
<option {{$orders->order_status==1 ? 'selected' : ''}} value='1'>Completed</option>
</select>
<button class="btn btn-primary" type="submit">Update</button>
</form>

		             

		              </div>
		            </div>
		          </div>

		        </div>
		      </div>
		      <!-- </form> -->
              
		    </div>
		  </div>



		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
	</body>

</html>
