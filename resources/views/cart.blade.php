
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />
  <meta name="csrf-token" content="{{csrf_token()}}" />
  
		<!-- Bootstrap CSS -->
	    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet"> 
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="{{url('/css/tiny-slider.css')}}" rel="stylesheet">
		<link rel="stylesheet" href="{{url('/css/style_New1.css')}}">
		<link href="{{asset('fontawesome-free-6.5.2-web/css/all.min.css')}}" rel="stylesheet"> 
		<title>Furni </title>
	</head>

	<body>

		<!-- Start Header/Navigation -->
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

<div class="container">
	<a class="navbar-brand" href="index.html">Furni<span>.</span></a>

	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarsFurni">
		<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
			<li class="nav-item ">
				<a class="nav-link" href="{{url('index')}}">Home</a>
			</li>
			@auth
			<li><a class="nav-link" href="{{url('order-history')}}">Order History</a></li>
			@endauth
			<li><a class="nav-link"  href="{{url('/about')}}">About us</a></li>
			<li><a class="nav-link" href="{{url('/services')}}">Services</a></li>
			<li><a class="nav-link" href="{{url('/contact')}}">Contact us</a></li>
			@auth
			
			<li><a class="nav-link" href="{{url('/logout')}}">Logout</a></li>
			@endauth
			@guest
			<li><a class="nav-link" href="{{url('/loginpage')}}">Login</a></li>
			@endguest
	
	
		</ul>

		<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
			<li><a class="nav-link" href="{{url('/profile')}}"><img src="{{asset('images/user.svg')}}"></a></li>
			<li><a class="nav-link" href="{{url('/mycart')}}"><img src="{{asset('images/cart.svg')}}"></a></li>
		</ul>
	</div>
</div>
	
</nav>
		<!-- End Header/Navigation -->

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Cart [{{count($cartitems) }}]</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		
@if($cartitems->count() > 0)
		<div class="untree_co-section before-footer-section">
            <div class="container">
              <div class="row mb-5">
                <form class="col-md-12">
                  <div class="site-blocks-table">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="product-thumbnail">Image</th>
                          <th class="product-name">Product</th>
                          <th class="product-price">Price</th>
                          <th class="product-quantity">Quantity</th>
                          <th class="product-total">Total</th>
                          <th class="product-remove">Remove</th>
                        </tr>
                      </thead>
                      <tbody>
					  <div class="alert alert-success" id="delete_success"  style="display:none;">
						Product removed successfully from your cart
						</div>
						<div class="alert alert-success" id="quantity_updated"  style="display:none;">
						Product updated successfully 
						</div>
						
						@foreach($cartitems as $item)
                        <tr class="cartsection cartRow{{$item->id}}">
                          <td class="product-thumbnail">
                            <img src="{{asset('productImage/'.$item->products->image)}}" alt="Image" class="img-fluid" style="height:150px;width:150px;">
                          </td>
                          <td class="product-name">
                            <h2 class="h5 text-black">{{$item->products->name}}</h2>
                          </td>
						  @if($item->price_after_discount == 0)
                          <td>${{$item->products->price}}.00</td>
						  @else
						<td><h6 style="font-weight:line-throught;display:inline;">${{$item->price_after_discount}}</h6> <span style="text-decoration:line-through;">${{$item->products->price}}.00</span></td>
						  @endif


                          <td>
                            <div class="input-group mb-3 d-flex align-items-center quantity-container quantity" style="max-width: 120px;">
                            
							
							<div class="input-group-prepend quantityChange" product_id="{{$item->products->id}}">
                                <span  class="btn btn-outline-black decrease_btn" >&minus;</sapn>
                              </div>


                              <input type="text" readonly="readonly" class="form-control text-center quantity-amount" value="{{$item->quantity}}" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
							  
							  <div class="input-group-append quantityChange" product_id="{{$item->products->id}}">
                                <span class="btn btn-outline-black increase_btn" >&plus;</span>
                              </div>

                            </div>
        
                          </td>


                          <td id="totalPriceRow{{$item->products->id}}">${{$item->total_price}}</td>
                       
<td><a href="#" item_id="{{$item->id}}" class="btn btn-black btn-sm remove_btn">X</a></td>
                        </tr>
        @endforeach
                      
                      </tbody>
                    </table>
                  </div>
                </form>
              </div>
       
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                  </div>
                </div>
                <div class="col-md-6 pl-5">
                  <div class="row justify-content-end">
                    <div class="col-md-7">
                      <div class="row">
                        <div class="col-md-12 text-right border-bottom mb-5">
                          <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-md-6">
                          <span class="text-black">Subtotal</span>
                        </div>
                        <div class="col-md-6 text-right">
                          <strong class="text-black" id="total_price">${{$sum}}</strong>
                        </div>
                      </div>
                      <div class="row mb-5">
                        <div class="col-md-6">
                          <span class="text-black">Total</span>
                        </div>
                        <div class="col-md-6 text-right">
                          <strong class="text-black" id="sub_total_price">${{$sum}}</strong>
                        </div>
                      </div>
        
                      <div class="row">
                        <div class="col-md-12">
                        <a href="{{url('/checkout')}}"><button class="btn btn-black btn-lg py-3 btn-block">Proceed To Checkout</button></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
		
		  @else
		<h2 class="text-center py-5">No products in your cart</h2>
		@endif
		<!-- Start Footer Section -->
		<footer class="footer-section">
			<div class="container relative">

				<div class="sofa-img">
					<img src="images/sofa.png" alt="Image" class="img-fluid">
				</div>

				<div class="row">
					<div class="col-lg-8">
						<div class="subscription-form">

						</div>
					</div>
				</div>

				<div class="row g-5 mb-5">
					<div class="col-lg-4">
						<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Furni<span>.</span></a></div>
						<p class="mb-4">Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant</p>

						<ul class="list-unstyled custom-social">
							<li><a href="#" onclick="event.preventDefault()"><span class="fa fa-brands fa-facebook-f"></span></a></li>
							<li><a href="#" onclick="event.preventDefault()"><span class="fa fa-brands fa-twitter"></span></a></li>
							<li><a href="#" onclick="event.preventDefault()"><span class="fa fa-brands fa-instagram"></span></a></li>
							<li><a href="#" onclick="event.preventDefault()"><span class="fa fa-brands fa-linkedin"></span></a></li>
						</ul>
					</div>

					<div class="col-lg-8">
						<div class="row links-wrap">
							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li style="color:#2f2f2f;">About us</li>
									<li style="color:#2f2f2f;">Services</li>
									<li style="color:#2f2f2f;">Blog</li>
									<li style="color:#2f2f2f;">Contact us</li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li style="color:#2f2f2f;">Support</li>
									<li style="color:#2f2f2f;">Knowledge base</li>
									<li style="color:#2f2f2f;">Live chat</li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li style="color:#2f2f2f;">Jobs</li>
									<li style="color:#2f2f2f;">Our team</li>
									<li style="color:#2f2f2f;">Leadership</li>
									<li style="color:#2f2f2f;">Privacy Policy</li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li style="color:#2f2f2f;">Nordic Chair</li>
									<li style="color:#2f2f2f;">Kruzo Aero</li>
									<li style="color:#2f2f2f;">Ergonomic Chair</li>
								</ul>
							</div>
						</div>
					</div>

				</div>

				<div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> <!-- License information: https://untree.co/license/ -->
            </p>
						</div>

						<div class="col-lg-6 text-center text-lg-end">
							<ul class="list-unstyled d-inline-flex ms-auto">
								<li class="me-4" style="color:#2f2f2f;">Terms &amp; Conditions</li>
								<li style="color:#2f2f2f;">Privacy Policy</li>
							</ul>
						</div>

					</div>
				</div>

			</div>
		</footer>
		<!-- End Footer Section -->	


		<script src="{{asset('jquery-3.7.1.min.js')}}"></script>
<script>
$.ajaxSetup({
		headers:{
"X-CSRF-TOKEN" : $('meta[name="csrf-token"]').attr('content')
		}
	});
$(document).on('click','.remove_btn',function(e){
e.preventDefault();
var item_id=$(this).attr('item_id');

$.ajax({
	type:"POST",
	url:"{{route('remove')}}",
	data:{
		'item_id':item_id,
		
	},
	success:function(data){
		console.log(data.status);
if(data.status==true){
	 $('#delete_success').show();
	 setTimeout(function(){
		$('#delete_success').hide();
	 },3000);
	 document.getElementById('total_price').innerHTML="$"+data.price;
	document.getElementById('sub_total_price').innerHTML="$"+data.price;
}
$('.cartRow'+data.data).remove();
	}, 
		error:function(reject){

}, 
})
})
//increasing button
$('.increase_btn').click(function (e){
	e.preventDefault();
	var increase_value=$(this).parents('.quantity').find('.quantity-amount').val();
	var value=parseInt(increase_value,10);
	value=isNaN(value) ?0:value;
	if(value<10){
		value++;
		$(this).parents('.quantity').find('.quantity-amount').val(value);
	}
})
//decreasing button
$('.decrease_btn').click(function (e){
	e.preventDefault();
	var increase_value=$(this).parents('.quantity').find('.quantity-amount').val();
	var value=parseInt(increase_value,10);
	value=isNaN(value) ?0:value;
	if(value>1){
		value--;
		$(this).parents('.quantity').find('.quantity-amount').val(value);
	}
})
//quantity change
$('.quantityChange').click(function(e){
	console.log('lllllllll');
	e.preventDefault();
	var quantity=$(this).closest('.cartsection').find('.quantity-amount').val();
	var product_id=$(this).attr('product_id');
	console.log(quantity);
	console.log(product_id);
	$.ajax({
	type:"POST",
	url:"{{route('update-cart')}}",
	data:{
		'quantity':quantity,
		'product_id':product_id
		
	},
	success:function(data){
		console.log(data.status);
if(data.status==true){
	$('#quantity_updated').show();
	 setTimeout(function(){
		$('#quantity_updated').hide();
	 },3000);

	document.getElementById('total_price').innerHTML="$"+data.total_price;
	document.getElementById('sub_total_price').innerHTML="$"+data.total_price;



	document.getElementById('totalPriceRow'+data.product_id).innerHTML="$"+data.price;
	console.log($('.totalPriceRow'+data.product_id));
	console.log('????');
}

	}, 
		error:function(reject){

}, 
})
})
</script>


		<script src="/bootstrap-5.3.3-dist/js/bootstrap.js"></script>
<script src="{{url('/js/tiny-slider.js')}}"></script>
<script src="{{url('/js/custom.js')}}"></script>
	</body>

</html>
