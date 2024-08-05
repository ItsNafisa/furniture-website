
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
								<!-- <h1>Cart</h1> -->
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
      <div class="row">
        <div class="col-md-12 text-center pt-5">
          <span class="display-3 thankyou-icon text-primary">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart-check mb-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M11.354 5.646a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708 0z"/>
              <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
            </svg>
          </span>
          <h2 class="display-3 text-black">Thank you!</h2>
          <p class="lead mb-5">You order was successfully completed.</p>
          <p><a href="{{url('/index')}}" class="btn btn-sm btn-outline-black">Back to shop</a></p>
        </div>
      </div>
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


		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
	</body>

</html>
