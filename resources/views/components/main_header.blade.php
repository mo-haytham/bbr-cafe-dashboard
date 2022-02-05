<header class="main-header">
    <a href="{{ route('d.index') }}" class="logo"><b>BBR</b> Cafe</a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span id="notification_icon" class="label label-warning">
                            <i class="fa fa-certificate"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <ul id="notifications_list" class="menu">
                                <li>
                                    <a href="{{ route('get.orders.list', ['status' => 'pending']) }}">
                                        <i class="fa fa-shopping-cart text-green"></i> You have new order requests
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('get.reservations.list', ['status' => 'pending']) }}">
                                        <i class="fa fa-users text-aqua"></i> You have new reservation requests
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('assets/img/avatar.png') }}" class="user-image" alt="User Image" />
                        <span class="hidden-xs">{{ auth()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{{ asset('assets/img/user2-160x160.jpg') }}" class="img-circle"
                                alt="User Image" />
                            <p>{{ auth()->user()->name }}</p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('d.logout') }}" class="btn btn-default btn-flat">Logout</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
