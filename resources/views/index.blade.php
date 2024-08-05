
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
						<li><a class="nav-link" href="{{url('/profile')}}"><img src="images/user.svg"></a></li>
						<li><a class="nav-link" href="{{url('/mycart')}}"><img src="images/cart.svg"></a></li>
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
								<h1>Modern Interior <span clsas="d-block">Design Studio</span></h1>
								<p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.</p>
								<p><a href="#latestsection" style="scroll-behavior: smooth;" class="btn btn-secondary me-2">Shop Now</a><a href="#latestsection" class="btn btn-white-outline">Explore</a></p>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="hero-img-wrap">
								<img src="images/couch.png" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		<!-- Start Product Section -->
		
		<div class="product-section" id="latestsection">
			<div class="container">
			<div class="col-lg-7 mx-auto text-center py-5">
						<h2 class="section-title">Latest <span class="text-danger">Furnitures<span></h2>
					</div>
				<div class="row">
					
				@foreach($latests as $latest)
				<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0 myoop">
	<a href="#" latest_id="{{$latest->id}}"  section_id="latest_product" class="product-item delete_btn">
			
		<img src="{{asset('productImage/'.$latest->image)}}" class="img-fluid product-thumbnail" style="height:200px;width:200px;">
							<strong class="product-title" style="display:block;">{{$latest->name}}</strong>
							@if($latest->price_after_discounting != 0 && $latest->price_after_discounting != null)
	<h3 class="product-price" style="display:inline-block;">${{$latest->price_after_discounting}}</h3><span style="text-decoration:line-through;margin-left:10px;">${{$latest->price}}</span>
							@else
							<h3 class="product-price" style="display:inline-block;">${{$latest->price}}.00</h3>
							@endif
							<span class="icon-cross">
								<img src="images/cross.svg" class="img-fluid">
							</span>
</a>
<div class="alert alert-success mt-3 p-3" id="{{$latest->id}}latest_product_added" style="display:none;">Product added successfully to your shopping cart</div>	
<div class="alert alert-success mt-3 p-1" id="{{$latest->id}}exsist_latest_product_added" style="display:none;">Product already added to your shopping cart</div>					
</div> 
					
					@endforeach
				

				</div>
			</div>
		</div>
		<!-- End Product Section -->


		
			<!-- Start Category Section -->
			<div class="col-lg-7 mx-auto text-center">
						<h2 class="section-title">Featured <span class="text-danger">Categories<span></h2>
					</div>
			<div class="untree_co-section product-section before-footer-section">
		    <div class="container">
		      	<div class="row">

		      	@foreach($categories as $category)
				  <div class="col-12 col-md-4 col-lg-3 mb-5">
						<a class="product-item" href="{{url('category-detail',$category->id)}}">
	<img src="{{asset('categoryImage/'.$category->image)}}" class="img-fluid product-thumbnail" style="width:200px;height:200px;">
					
	<h3 class="product-title">{{$category->name}}</h3>

							<span class="icon-cross">
								<img src="images/cross.svg" class="img-fluid">
							</span>
						</a>
					</div>
					@endforeach

		      	</div>
		    </div>
		</div>
		<!-- End Category Section -->


		<!-- Start Why Choose Us Section -->
		<div class="why-choose-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-6">
						<h2 class="section-title">Why Choose Us</h2>
						<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.</p>

						<div class="row my-5">
							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/truck.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Fast &amp; Free Shipping</h3>
									<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/bag.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Easy to Shop</h3>
									<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/support.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>24/7 Support</h3>
									<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/return.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Hassle Free Returns</h3>
									<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
								</div>
							</div>

						</div>
					</div>

					<div class="col-lg-5">
						<div class="img-wrap">
							<img src="images/why-choose-us-img.jpg" alt="Image" class="img-fluid">
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- End Why Choose Us Section -->

	

		<!-- Start Hot Offer Slider -->
		
		<div class="testimonial-section" id="discountsection">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 mx-auto text-center">
						<h2 class="section-title">Hot <span class="text-danger">Offers<span></h2>
					</div>
				</div>

				<div class="row justify-content-center">
					<div class="col-lg-12">
						<div class="testimonial-slider-wrap text-center">

							<div id="testimonial-nav">
								<span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
								<span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
							</div>

							<div class="testimonial-slider" >
							@foreach($discountedProducts as $product)
							
								<div class="item">
								<div class="alert alert-success" id="{{$product->id}}hot_product_added"  style="display:none;">
						Product added successfully to your shopping cart
						</div>
						<div class="alert alert-success" id="{{$product->id}}exsist_hot_product_added"  style="display:none;">
						Product already added to your shopping cart
						</div>
					<div class="row justify-content-center align-items-center">
							<div class="col-4">
		<img src="{{asset('productImage/'.$product->image)}}" class="img-fluid product-thumbnail" style="height:200px;width:200px;" >
									</div>
									<div class="col-8" >
									<h3 class="section-title">{{$product->name}}</h3>
<span class="position d-block mb-3" style="color:black;">${{$product->price_after_discounting}}<span style="text-decoration:line-through;margin-left:10px;color:grey;"> ${{$product->price}}</span></span>
							<h5 class="position d-block mb-3">{{$product->discount}}% <span class="text-danger">OFF</span></h5>
	<a href="#" latest_id="{{$product->id}}" section_id="hot_product"  class="btn delete_btn" style="letter-space:2px;">BUY NOW</a>	
	
									</div>
									</div>
									
								</div> 
								@endforeach
							

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Hot Offer Slider -->


		<!-- Start Blog Section -->
		<div class="blog-section">
			<div class="container">
				

				<div class="row">

				</div>
			</div>
		</div>
		<!-- End Blog Section -->	

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
$(document).on('click','.delete_btn',function(e){
e.preventDefault();
var latest_id=$(this).attr('latest_id');
var section_id=$(this).attr('section_id');

// exsists
$.ajax({
	type:"POST",
	url:"{{route('cart')}}",
	data:{
		'id':latest_id,
		'section_id':section_id
	},
	success:function(data){
		console.log(data.status);
		var id=data.product_id;
if(data.status==true && data.section=='latest_product' && data.exsists==false){
	
	console.log(id);
	// $('#latest_product_added').show();
	$('#' + id + "latest_product_added").show();
	setTimeout(() => {
		$('#' + id + "latest_product_added").hide();	
	}, 4000);
	console.log('new');
}else if(data.status==true && data.section=='latest_product' && data.exsists==true){
	$('#' + id + "exsist_latest_product_added").show();
	console.log('newone');
	setTimeout(function(){
		$('#' + id + 'exsist_latest_product_added').hide();
	},4000);
}else if(data.status==true && data.section=='hot_product' && data.exsists==false){
	console.log('already');
	$('#' + id + 'hot_product_added').show();
	setTimeout(function(){
		$('#' + id + 'hot_product_added').hide();	
	},4000)
}else if(data.status==true && data.section=='hot_product' && data.exsists==true){
	console.log('already');
	$('#' + id + 'exsist_hot_product_added').show();
	setTimeout(function(){
		$('#' + id + 'exsist_hot_product_added').hide();
	
	},4000);
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
