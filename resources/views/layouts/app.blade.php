
<!DOCTYPE html>
<html lang="en">


<!-- index22:59-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('dshb/assets/img/favicon.ico')}}">
    <title>Invoice</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('dshb/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dshb/assets/css/font-awesome.min.css') }}">
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> <link rel="stylesheet" type="text/css" href="{{ asset('dshb/assets/css/style.css') }}">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper">
    
        <div class="header">
			<div class="header-left">
               <a href="index-2.html" class="logo">
               
					<img src="assets/img/logo.png" width="35" height="35" alt=""> <span>Company Name</span>
				</a>
			</div>
			<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown d-none d-sm-block">
                
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span>Notifications</span>
                        </div>
                        <div class="drop-scroll">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
											<span class="avatar">
												<img alt="John Doe" src="assets/img/user.jpg" class="img-fluid">
											</span>
											
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
											<span class="avatar">V</span>
											
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
											<span class="avatar">L</span>
											
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
											<span class="avatar">G</span>
											
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
											<span class="avatar">V</span>
											<div class="media-body">
												
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="activities.html">View all Notifications</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown d-none d-sm-block">
                   
                </li>
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
							<img class="rounded-circle" src="{{ asset('dshb/assets/img/user.jpg')}}" width="24" alt="Admin">
							<span class="status online"></span>
						</span>
						<span>Admin</span>
                    </a>
					<div class="dropdown-menu">
                     <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
					</div>
                   
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
                    <a class="dropdown-item" href="settings.html">Settings</a>
                    <a class="dropdown-item" href="login.html">Logout</a>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Invoice System</li>
                        <li class="active">
                            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="{{ route('newInvoice') }}"><i class="fa fa-money"></i> <span>New Invoice</span></a>
                        </li>
                        <li>
                            <a href="{{route ('offert') }}"><i class="fa fa-book"></i> <span>Offert</span></a>
                        </li>
                        <li>
                            <a href="{{ route('allclient') }}"><i class="fa fa-user"></i> <span>Client</span></a>
                        </li>
                        <li>
                            <a href="{{ route('allinvoice') }}"><i class="fa fa-user"></i> <span>All Invoices</span></a>
                        </li>
                    </ul>  
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content">
                @include('inc.messages')
                @yield('content')
            </div>
        </div>
       
    
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="{{ asset('dshb/assets/js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{ asset('dshb/assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('dshb/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('dshb/assets/js/jquery.slimscroll.js')}}"></script>
    <script src="{{ asset('dshb/assets/js/Chart.bundle.js')}}"></script>
    <script src="{{ asset('dshb/assets/js/chart.js')}}"></script>
    <script src="{{ asset('dshb/assets/js/app.js')}}"></script>

</body>


<!-- index22:59-->
</html>