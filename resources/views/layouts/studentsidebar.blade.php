{{-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title></title>
  <link href={{asset("assets/vendor/fontawesome-free/css/all.min.css")}} rel="stylesheet" type="text/css">
  <link href={{asset("assets/vendor/bootstrap/css/bootstrap.min.css")}} rel="stylesheet" type="text/css">
  <link href={{asset("assets/css/ruang-admin.min.css")}} rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <!--<img src={{asset("assets/img/logo/logo2.png")}}>-->
        </div>
        <div class="sidebar-brand-text mx-3"><b style="letter-spacing:5px;">STUDENT</b></div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link " href={{route("student.profile")}}> <i class="fa fa-user" aria-hidden="true"></i>
           <span> PROFILE </span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href={{route("student.upload")}}><i class="fa fa-upload" aria-hidden="true"></i>
          <span>UPLOAD DOCUMENT</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fa fa-eye" aria-hidden="true"></i>
          <span>VIEW SUPERVISOR</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ui-colors.html">
          <i class="fa fa-eye" aria-hidden="true"></i>
          <span>VIEW NOTICEBOARD</span>
        </a>
      </li>
 
      <li class="nav-item">
        <a class="nav-link " href="#">
          <i class="fa fa-calendar" aria-hidden="true"></i>
          <span>REQUEST APPOINTMENT</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fa fa-sign-out-alt" aria-hidden="true"></i>
          <span>LOGOUT</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>
    
</body>

</html> --}}


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>RuangAdmin - Dashboard</title>
  <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/css/ruang-admin.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
          <div class="sidebar-brand-icon">
           <!--<img src={{asset("assets/img/logo/admin.png")}} width="200px" height="200px">-->
          </div>
          <div class="sidebar-brand-text mx-3"><b style="letter-spacing:5px;">ADMIN</b></div>
        </a>
        <hr class="sidebar-divider my-0">
        <li class="nav-item active">
          <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>
        <hr class="sidebar-divider">
        <li class="nav-item">
          <a class="nav-link " href={{route("admin.dashboard")}}> <i class="far fa-fw fa-window-maximize"></i>
             <span> DASHBOARD </span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href={{route("admin.manage_student")}}><i class="fab fa-fw fa-wpforms"></i>
            <span>MANAGE STUDENT</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href={{route("admin.manage_lecturer")}}>
            <i class="fa fa-edit"></i>
            <span>MANAGE LECTURER</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href={{route("admin.manage_project")}}>
            <i class="fa fa-book"></i>
            <span>MANAGE PROJECT</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href={{route("admin.post")}}>
            <i class="fas fa-fw fa-palette"></i>
            <span>NOTICE BOARD</span>
          </a>
        </li>
   
        <li class="nav-item">
          <a class="nav-link " href="#">
              <i class="fa fa-book" aria-hidden="true"></i>
            <span>PUBLISH PROJECT</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="charts.html">
            <i class="fa fa-sign-out-alt"></i>
            <span>LOGOUT</span>
          </a>
        </li>
        <hr class="sidebar-divider">
        <div class="version" id="version-ruangadmin"></div>
      </ul>
  
    <!-- Sidebar -->
    {{-- <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-1 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
        </nav>
        <!-- Container Fluid-->
      </div>
    </div> --}}
  {{-- </div> --}}

  <script src="{{asset('assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{asset ('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{asset('assets/js/ruang-admin.min.js') }}"></script>
  <script src="{{asset('assets/vendor/chart.js/Chart.min.js') }}"></script>
  <script src="{{asset('assets/js/demo/chart-area-demo.js') }}"></script> 
</body>
</html>