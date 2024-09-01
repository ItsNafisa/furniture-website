
<div class="mycontainer">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="logo-apple"></ion-icon>
                        </span>
                        <span class="title">FURNI</span>
                    </a>
                </li>

                <li class="{{Request::is('users') ? 'active-li':''}}">
                    <a href="{{url('/users')}}">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title {{Request::is('users') ? 'active-a':''}}">Users</span>
                    </a>
                </li>

                <li class="{{Request::is('products') ? 'active-li':''}}">
                    <a href="{{url('/products')}}">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title {{Request::is('products') ? 'active-a':''}}">Products</span>
                    </a>
                </li>

                <li class="{{Request::is('categories') ? 'active-li':''}}">
                    <a href="{{url('/categories')}}">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title {{Request::is('categories') ? 'active-a':''}}" >Categories</span>
                    </a>
                </li>

                <li class="{{Request::is('orders') ? 'active-li':''}}">
                    <a href="{{url('/orders')}}">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title {{Request::is('orders') ? 'active-a':''}}">Pending Orders</span>
                    </a>
                </li>

                <li class="{{Request::is('completed-orders') ? 'active-li':''}}">
                    <a href="{{url('/completed-orders')}}">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title {{Request::is('completed-orders') ? 'active-a':''}}">Completed Orders</span>
                    </a>
                </li>

                <li class="{{Request::is('admin-profile') ? 'active-li':''}}">
                    <a href="{{url('/admin-profile')}}">
                        <span class="icon">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                        <span class="title {{Request::is('admin-profile') ? 'active-a':''}}">Profile</span>
                    </a>
                </li>

                <li class="{{Request::is('logout') ? 'active-li':''}}">
                    <a href="{{url('/logout')}}">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title {{Request::is('logout') ? 'active-a':''}}">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- <script src="{{url('/admin/js/main.js')}}"></script>
</body>
</html> -->