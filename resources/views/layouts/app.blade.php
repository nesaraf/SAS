<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SAS| Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  @section('headsection')
  @show


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ route('home') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>AS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SAS</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
       
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
                
     
                @section('notif_amount')
                  @show

              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
   
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                @if($usr->role==1)
              <img src="../../dist/img/ahmad.jpg" class="user-image" alt="User Image">
                @else
                <img src="../../dist/img/avatar.png" class="user-image" alt="User Image">
                @endif
               
              <span class="hidden-xl">{{ $usr->employee->fname }}{{ " ".$usr->employee->lname }}</span>
                
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                  @if($usr->role==1)
                <img src="../../dist/img/ahmad.jpg" class="img-circle" alt="User Image">
                  @else
                <img src="../../dist/img/avatar.png" class="img-circle" alt="User Image">
                  @endif

                <p>
                  {{ $usr->employee->fname }}{{ "  ".$usr->employee->lname }}@if($usr->role==1) Admin @elseif($usr->role==0) Sales employee @else Staff @endif
                  <small>Since one hour ago</small>
                </p>
              </li>
                
              <!-- Menu Body -->
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}"
      onclick="event.preventDefault();
         document.getElementById('logout-form').submit();"">
                 <i class="btn btn-default btn-flat">Sign out</i></a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     {{ csrf_field() }}
                 </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
        
           @if($usr->role==1)


                       
          <img src="../../dist/img/ahmad.jpg" class="img-circle" alt="User Image">
           @else
                                                                            
  <img src="../../dist/img/avatar.png" class="img-circle" alt="User Image">
                @endif
        </div>
        <div class="pull-left info">
          <p>{{ $usr->employee->fname }}{{ "  ".$usr->employee->lname }} </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>







      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
                          @if($usr->role!=2)
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users" ></i> <span>Employees</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
                                                
          <ul class="treeview-menu">
            <li><a href="{{route ('employee.index')}}"><i class="fa fa-circle-o"></i> Employees</a></li>
              <li><a href="{{route ('user.index')}}"><i class="fa fa-circle-o"></i>Users</a></li>
          </ul>
        </li>

          <li class="treeview">
          <a href="#">
            <i class="fa fa-male" style="color:#00ff80"></i> <span>Customers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
             <li><a href="{{route ('customer.index')}}"><i class="fa fa-circle-o"></i>Customers List</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-product-hunt" style="color:#0080ff"></i> <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route ('product.index')}}"><i class="fa fa-circle-o"></i> Product List</a></li>
          </ul>
        </li>

                <li class="treeview">
          <a href="#">
            <i class="fa fa-file-text" style="color:#fff"></i> <span>Bills</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route ('sale.index')}}"><i class="fa fa-circle-o"></i> bills</a></li>
            <li><a href="{{route ('sale_detail.create')}}"><i class="fa fa-circle-o"></i> Create new bill</a></li>

          </ul>
        </li>

                <li class="treeview">
          <a href="#">
            <i class="fa fa-circle" style="color:#ff8000"></i> <span>Categories</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="{{route ('category.index')}}"><i class="fa fa-circle-o"></i>Categories</a></li>
              
          </ul>
        </li>
        

                <li class="treeview">
          <a href="#">
            <i class="fa fa-circle" style="color:#bfff00" ></i> <span>Units</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="{{route ('unit.index')}}"><i class="fa fa-circle-o"></i>Units</a></li>
          </ul>
        </li>
        
        
        
        
<!--         <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> Slase Chart</a></li>
            <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Purchase Chart</a></li>
            <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Benefit Chart</a></li>
          </ul>
        </li> -->
        
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>



      </ul>
                                                           @endif
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      @section('main_content')
      @show

    <!-- Main content -->
    <section class="content">

 </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2018 <a href="#">Nesar Ahmad Kazemi</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/app.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="{{asset('dist/js/demo.js')}}"></script> -->

@section('footersection')
@show


</body>
</html>