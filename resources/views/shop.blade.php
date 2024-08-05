
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">
  <link href="{{asset('fontawesome-free-6.5.2-web/css/all.min.css')}}" rel="stylesheet"> 
  
  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />
<meta name="csrf-token" content="{{csrf_token()}}" />
		<!-- Bootstrap CSS -->
	    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet"> 
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="{{url('/css/tiny-slider.css')}}" rel="stylesheet">
		<link rel="stylesheet" href="{{url('/css/style_New1.css')}}">
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
						<li class="nav-item active">
							<a class="nav-link" href="{{url('index')}}">Home</a>
						</li>
						@auth
						<li><a class="nav-link" href="{{url('order-history')}}">Order History</a></li>
						@endauth
						<li><a class="nav-link" href="{{url('/about')}}">About us</a></li>
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
								<h1>{{$categoryName}}</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->
<br><br>
		@if($products->count() > 0)				
		<div class="untree_co-section product-section before-footer-section">
		    <div class="container">
		      	<div class="row">

		      	@foreach($products as $product)
				  <div class="col-12 col-md-4 col-lg-3 mb-5">
						<a class="product-item add_to_btn" href="#" product_id="{{$product->id}}">
							<img src="{{asset('productImage/'.$product->image)}}" class="img-fluid product-thumbnail" style="width:200px;height:200px;">
							<strong class="product-title" style="display:block;">{{$product->name}}</strong>
							@if($product->price_after_discounting != 0 && $product->price_after_discounting != null)
	<h3 class="product-price" style="display:inline-block;">${{$product->price_after_discounting}}</h3><span style="text-decoration:line-through;margin-left:10px;">${{$product->price}}</span>
							@else
							<h3 class="product-price" style="display:inline-block;">${{$product->price}}.00</h3>
							@endif

							<span class="icon-cross">
								<img src="{{asset('images/cross.svg')}}" class="img-fluid">
							</span>
						</a>
						<div class="alert alert-success mt-3" id="{{$product->id}}product_added"  style="display:none;">
						Product added successfully to your shopping cart
						</div>
						<div class="alert alert-danger mt-3" id="{{$product->id}}already_added"  style="display:none;">
						Product already added to your shopping cart
						</div>	
					</div>
				
					@endforeach

		      	</div>
		    </div>
		</div>

		@else
		<h2 class="text-center py-5">No products yet</h2>
		@endif
		<!-- Start Footer Section -->
		<footer class="footer-section">
			<div class="container relative">

				<div class="sofa-img">
					<img src="{{asset('images/sofa.png')}}" alt="Image" class="img-fluid">
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
$(document).on('click','.add_to_btn',function(e){
e.preventDefault();
var product_id=$(this).attr('product_id');


// exsists
$.ajax({
	type:"POST",
	url:"{{route('cart')}}",
	data:{
		'id':product_id,
	
	},
	success:function(data){
		var id=data.product_id;
		if(data.status==true && data.exsists==false){
			// $('#product_added').show();
			$('#' + id + "product_added").show();
			setTimeout(function(){
				$('#' + id + "product_added").hide();
			},4000)
}else if(data.status==true && data.exsists==true){
	// $('#already_added').show();
	$('#' + id + "already_added").show();
	setTimeout(function(){
		$('#' + id + "already_added").hide();
	},4000)
}

	}, 
		error:function(xhr){
			if(xhr.status == 401){
window.location.href='/loginpage';
}
}, 
})
})
</script>


<script src="/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>	
<!-- <script src="/bootstrap-5.3.3-dist/js/bootstrap.bundle.js"></script> -->
<script src="{{url('/js/tiny-slider.js')}}"></script>
<script src="{{url('/js/custom.js')}}"></script>
	</body>

</html>
