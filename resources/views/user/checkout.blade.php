
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
								<h1>Checkout</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		<div class="untree_co-section">
		    <div class="container">
		      <div class="row mb-5">
		        <div class="col-md-12">
		        </div>
		      </div>
		      <div class="row">
		        <div class="col-md-6 mb-5 mb-md-0">
		          <h2 class="h3 mb-3 text-black">Billing Details</h2>
		          <div class="p-3 p-lg-5 border bg-white">
					<form action="{{url('/order')}}" method="POST">
						@csrf
				  <div class="form-group row">
		              <div class="col-md-12">
		                <label for="c_companyname" class="text-black">Name </label>
		                <input type="text" class="form-control" id="c_companyname" name="name" value="{{Auth::user()->name}}">
		              </div>
		            </div>
		        

		            <div class="form-group row">
		              <div class="col-md-6">
		                <label for="c_fname" class="text-black">City <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="c_fname" name="city" value="{{Auth::user()->city}}">
		              </div>
		              <div class="col-md-6">
		                <label for="c_lname" class="text-black">State <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="c_lname" name="state" value="{{Auth::user()->state}}">
		              </div>
		            </div>

		            <div class="form-group row">
		              <div class="col-md-12">
		                <label for="c_companyname" class="text-black">Country </label>
		                <input type="text" class="form-control" id="c_companyname" name="country" value="{{Auth::user()->country}}">
		              </div>
		            </div>

		            <div class="form-group row">
		              <div class="col-md-12">
		                <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="c_address" name="address" placeholder="Street address" value="{{Auth::user()->address}}">
		              </div>
		            </div>

		           

		          

		            <div class="form-group row mb-5">
		              <div class="col-md-6">
		                <label for="c_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="c_email_address" name="email" value="{{Auth::user()->email}}">
		              </div>
		              <div class="col-md-6">
		                <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="c_phone" name="phone" placeholder="Phone Number" value="{{Auth::user()->phone}}">
		              </div>
		            </div>

		            <div class="form-group">
		              <label for="c_order_notes" class="text-black">Order Notes</label>
		              <textarea name="message" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Write your notes here..."></textarea>
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
		                    <th>Product</th>
		                    <th>Total</th>
		                  </thead>
		                  <tbody>
							@foreach($cartsitem as $item)
		                    <tr>
		                      <td>{{$item->products->name}}<strong class="mx-2">x</strong> {{$item->quantity}}</td>
		                      <td>${{$item->total_price}}</td>
		                    </tr>
							@endforeach
		                    <tr>
		                      <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
		                      <td class="text-black">${{$sum}}</td>
		                    </tr>
		                    <tr>
		                      <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
		                      <td class="text-black font-weight-bold"><strong>${{$sum}}</strong></td>
		                    </tr>
		                  </tbody>
		                </table>


		                <div class="form-group">
		                  <button class="btn btn-black btn-lg py-3 btn-block" type="submit">Place Order</button>
		                </div>

		              </div>
		            </div>
		          </div>

		        </div>
		      </div>
		      </form>
		    </div>
		  </div>

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

<script>
window.history.pushState(null,"",window.location.href);
window.onpopstate=function(){
	window.history.pushState(null,"",window.location.href);
}
</script>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
	</body>

</html>
