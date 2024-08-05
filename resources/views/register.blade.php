<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furni </title>
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet"> 
    <link rel="stylesheet" href="{{url('/css/style_New1.css')}}">
    <meta name="csrf-token" content="{{csrf_token()}}" />
 
</head>
<body>
     <!-- Start Hero Section -->
  <div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Create Account</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->
<div class="container">
<form id="registerForm">
  @csrf
  <div class="form-group mt-3">
<label>Name</label>
<input type="text" class="form-control mt-2" placeholder="Enter name" name='name'>
<div class="alert alert-danger mt-3 p-1" id="name_error" style="display:none;"></div>

    </div>
    <div class="form-group mt-5">
<label>Email</label>
<input type="email" class="form-control mt-2" placeholder="Enter email" name='email'>
<div class="alert alert-danger mt-3 p-1" id="email_error" style="display:none;"></div>

    </div>
    <div class="form-group mt-5">
<label>Password</label>
<input type="password" class="form-control mt-2" placeholder="Enter password" name='password'>
<div class="alert alert-danger mt-3 p-1" id="password_error" style="display:none;"></div>

    </div>
    <div class="form-group mt-5">
<label>Phone Number</label>
<input type="text" class="form-control mt-2" placeholder="Enter phone number" name='phone'>
<div class="alert alert-danger mt-3 p-1" id="phone_error" style="display:none;"></div>

    </div>
    <div class="form-group mt-5">
<label>Home Address</label>
<input type="text" class="form-control mt-2" placeholder="Enter home address" name='address'>
<div class="alert alert-danger mt-3 p-1" id="address_error" style="display:none;"></div>

    </div>
    <div class="form-group mt-5">
<label>Your image</label>
<input type="file" class="form-control mt-2" name='image'>
<div class="alert alert-danger mt-3 p-1" id="image_error" style="display:none;"></div>

    </div>

    <div class="form-group mt-5">
<label>City</label>
<input type="text" class="form-control mt-2" placeholder="Enter your city" name='city'>
<div class="alert alert-danger mt-3 p-1" id="city_error" style="display:none;"></div>

    </div>

    <div class="form-group mt-5">
<label>State</label>
<input type="text" class="form-control mt-2" placeholder="Enter your state" name='state'>
<div class="alert alert-danger mt-3 p-1" id="state_error" style="display:none;"></div>

    </div>

    <div class="form-group mt-5">
<label>Country</label>
<input type="text" class="form-control mt-2" placeholder="Enter your country" name='country'>
<div class="alert alert-danger mt-3 p-1" id="country_error" style="display:none;"></div>

    </div>

    <button class="mt-5 mb-4 btn btn-warning text-white w-100 create_account_btn">Create</button>
  </form>
</div>
<script src="{{asset('jquery-3.7.1.min.js')}}"></script>
<script>
    $.ajaxSetup({
		headers:{
"X-CSRF-TOKEN" : $('meta[name="csrf-token"]').attr('content')
		}
	});
$('.create_account_btn').click(function(e){
	
	e.preventDefault();
	$('#name_error').hide();
    $('#city_error').hide();
    $('#state_error').hide();
    $('#country_error').hide();
    $('#email_error').hide();
    $('#password_error').hide();
    $('#address_error').hide();
    $('#image_error').hide();
    $('#phone_error').hide();

    var formData=new FormData($('#registerForm')[0]);
	$.ajax({
	type:"POST",
    
	url:"{{route('register-user')}}",
	data:formData,
    
    processData:false,
    contentType:false,
    cache:false,
	success:function(data){
       if(data.status==true){
        // window.location.href='/index';
        window.location=data.mylocation;
       }else{
        console.log('failed to register');
       }
	}, 
		error:function(reject){
var response=$.parseJSON(reject.responseText);
$.each(response.errors,function(key,val){
    $('#' + key + "_error").show();
    $('#' + key + "_error").text(val[0]);
});
}, 
})
})
    </script>
</body>
</html>
