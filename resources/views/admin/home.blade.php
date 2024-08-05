<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
   
    
	<link rel="stylesheet" href="{{url('/admin/css/style.css')}}">
   
	<link rel="stylesheet" href="{{url('/admin/css/all.min.css')}}">
	<link rel="stylesheet" href="{{url('/admin/css/fontawesome.min.css')}}">
	<link href="{{asset('fontawesome-free-6.5.2-web/css/all.min.css')}}" rel="stylesheet"> 
  
	<link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet"> 
</head>

<body>
 
	@include('admin.sidebar')
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                  
                    <i class="fa fa-bars" style="color:#999;"></i> 
                </div>

            

                <div class="user">
                    <!-- <img src="{{asset('admin/img/1.jpeg')}}" alt=""> -->
                </div>
            </div>

       
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">1,504</div>
                        <div class="cardName">Daily Views</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers" id="salesId">{{$sales}}</div>
                        <div class="cardName">Sales</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers" id="userNumbersId">{{$userCount}}</div>
                        <div class="cardName">Users Number</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">${{$sum_earning}}</div>
                        <div class="cardName">Earning</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>
            <div class="details">

<div class="recentOrders">
               @yield('mybody')
                </div>
</div>
        </div>
    </div>


  
<script src="{{url('/admin/js/main.js')}}"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>