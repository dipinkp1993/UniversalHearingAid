<!DOCTYPE html>
<?php echo
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-Type: text/html');?>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Universal-Customer Management System</title>
 
   <!-- Bootstrap core JavaScript-->
 

  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ asset('assets/js/jquery.min.js') }}" defer></script>
  <script src="{{ asset('assets/js/popper.min.js') }}" defer></script>
  <script src="{{ asset('assets/js/waves.js') }}" defer></script>
  <script src="{{ asset('assets/js/sidebar-menu.js') }}" defer></script>
  <script src="{{ asset('assets/js/app-script.js') }}" defer></script>
  <script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}" defer></script>
  <script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}" defer></script>
  <script src="{{ asset('assets/plugins/Chart.js/Chart.min.js') }}" defer></script>
  <script src="{{ asset('assets/plugins/Chart.js/Chart.extension.js') }}" defer></script>
  <script src="{{ asset('assets/js/index.js') }}" defer></script>
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" defer> </script>
  <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" defer></script>
  <script src="https://cdn.datatables.net/scroller/2.0.3/js/dataTables.scroller.min.js" defer></script>
  <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/scroller/2.0.3/css/scroller.bootstrap4.min.css"  rel="stylesheet">
  <!--favicon-->
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
  
  <!-- Vector CSS -->
  <link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
  <!-- simplebar CSS-->
  <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="{{ asset('assets/css/animate.css')}}" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="{{ asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="{{ asset('assets/css/sidebar-menu.css')}}" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="{{ asset('assets/css/app-style.css')}}" rel="stylesheet"/>
  <link href="{{ asset('assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet')}}" type="text/css">
  <link href="{{ asset('assets/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
 

</head>

<body>
<!-- Start wrapper-->
 <div id="wrapper">
  <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="index.html">
       <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
       <h5 class="logo-text">Universal</h5>
     </a>
	 </div>
	 <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">MAIN NAVIGATION</li>
      @foreach($pages as $page)
      <li>
        <a href="/{{$page['slug']}}" class="waves-effect">
          <i class="{{$page['icon']}}"></i>
          <span>{{$page['title']}}</span> 
           @if(!empty($page['sublinks']))
          <i class="fa fa-angle-left pull-right"></i>
          @endif
        </a>
        @if(!empty($page['sublinks']))
        <ul class="sidebar-submenu">
        @foreach($page['sublinks'] as $s)
        <li><a href="{{$s['link_slug']}}"><i class="fa fa-circle-o"></i>{{$s['linktitle']}}</a></li>
        @endforeach
        </ul>
        @endif
      </li>
      @endforeach
    </ul>
	 
   </div>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
<header class="topbar-nav">
 <nav class="navbar navbar-expand">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
    <li class="nav-item">
      <form class="search-bar">
        <input type="text" class="form-control" placeholder="Enter keywords">
         <a href="javascript:void();"><i class="icon-magnifier"></i></a>
      </form>
    </li>
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
    
    
   
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <span class="user-profile"><img src="assets/images/avatars/avt.png" class="img-circle" alt="user avatar"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
            <div class="media-body">
            <h6 class="mt-2 user-title">{{ Auth::user()->name }}</h6>
            <p class="user-subtitle">{{ Auth::user()->email }}</p>
            </div>
           </div>
          </a>
        </li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-envelope mr-2"></i> Inbox</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-wallet mr-2"></i> Account</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-settings mr-2"></i> Setting</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-power mr-2"></i> <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
{{ __('Logout') }}</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
</li>
      </ul>
    </li>
  </ul>
</nav>
</header>
<!--End topbar header-->

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">

      <!--Start Dashboard Content-->
      
      @yield('content')
     
	 
	  
       <!--End Dashboard Content-->
      <!--start overlay-->
	  <div class="overlay toggle-menu"></div>
	<!--end overlay-->
    </div>
    <!-- End container-fluid-->
  
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--Start footer-->
	<footer class="footer">
      <div class="container">
        <div class="text-center">
         
        </div>
      </div>
    </footer>
	<!--End footer-->
   
  </div><!--End wrapper-->
 
 
 
  
 
  
 
</body>
</html>
