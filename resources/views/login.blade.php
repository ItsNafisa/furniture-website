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
								<h1>Login</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->
<div class="container">

  <div class="alert alert-danger mt-4" id="login_fail"  style="display:none;">
  Email or password is incorrect
						</div>

<form class="mb-5" id="loginForm">
  @csrf

    <div class="form-group mt-5">
<label>Email</label>
<input type="email" class="form-control mt-2" placeholder="Enter email" name='email'>

    </div>
    <div class="alert alert-danger mt-3 p-1" id="email_error" style="display:none;"></div>
    <div class="form-group mt-5">
<label>Password</label>
<input type="password" class="form-control mt-2" placeholder="Enter password" name='password'>
    </div>
    <div class="alert alert-danger mt-3 p-1" id="password_error" style="display:none;"></div>

<p class="mt-1" style="color:grey;">Don't Have Account? <a href="{{url('/register')}}" style="color:grey;text-decoration:none;border-bottom:1px solid grey;font-weight:bold;">Create Account<a></p>
<button type="submit" class=" mt-5 btn btn-warning text-white w-100 login_btn">Login</button>
  </form>
</div>
<script src="{{asset('jquery-3.7.1.min.js')}}"></script>
<script>
    $.ajaxSetup({
		headers:{
"X-CSRF-TOKEN" : $('meta[name="csrf-token"]').attr('content')
		}
	});
$('.login_btn').click(function(e){
	
	e.preventDefault();

    $('#email_error').hide();
    $('#password_error').hide();


    $('#login_fail').hide();

    var formData=new FormData($('#loginForm')[0]);
	$.ajax({
	type:"POST",
    
	url:"{{route('login-user')}}",
	data:formData,
    
    processData:false,
    contentType:false,
    cache:false,
	success:function(data){
    console.log('hi');
       if(data.status==true && data.role=="user"){
        console.log('use///////////r');
     
       
        window.location=data.mylocation;
       }
       else if(data.status==true && data.role=="admin"){
        console.log('admin');
        window.location.href='/users';
       }else if(data.status==false){
        $('#login_fail').show();
       }
	}, 
		error:function(reject){
      console.log('reject');
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




