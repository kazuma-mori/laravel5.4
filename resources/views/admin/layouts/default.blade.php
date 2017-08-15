<!DOCTYPE html>
<html>
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <meta name="robots" content="noindex">

   <title>{{ PROJECT_NAME }} | Admin</title>

   <!-- CSS -->
   <link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
   <link rel="stylesheet" href="{{ asset('/font-awesome/css/font-awesome.min.css') }}">
   <link rel="stylesheet" href="{{ asset('/adminlte/dist/css/AdminLTE.min.css') }}">
   <link rel="stylesheet" href="{{ asset('/adminlte/dist/css/skins/_all-skins.min.css') }}">
   <link rel="stylesheet" href="{{ asset('/css/common.css') }}">

   <!-- JS -->
   <script src="{{ asset('/js/jquery-3.2.1.min.js') }}">ver1.0.0</script>
   <script src="{{ asset('/bootstrap/js/popper.min.js') }}"></script>
   <script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
   <script src="{{ asset('/adminlte/dist/js/app.min.js') }}"></script>
   <script src="https://ajaxzip3.github.io/ajaxzip3.js"></script>
 </head>
 <body class="hold-transition skin-black sidebar-mini">
   <div class="wrapper">


     <header class="main-header">
       <!-- Logo -->
       <a href="/{{ ADMIN_URL_PREFIX }}" class="logo">
         <span class="logo-mini"><b>{{ PROJECT_NAME }}</b></span>
         <span class="logo-lg"><b>{{ PROJECT_NAME }}</b></span>
       </a>

       <!-- Header Navbar -->
       <nav class="navbar navbar-static-top justify-content-end" role="navigation">
         <!-- Navbar Right Menu -->
         <div class="navbar-custom-menu">
           <ul class="nav navbar-nav">
             <!-- Login User -->
             <li class="dropdown user user-menu">
               <a href="" class="dropdown-toggle" data-toggle="dropdown">
                 <img src="{{ asset('/img/user.jpg') }}" class="user-image" alt="User Image">
                 @if (Auth::guard('admin')->check())
                 <span class="hidden-xs input-sm">{{ Auth::guard('admin')->getUser()->last_name }} {{ Auth::guard('admin')->getUser()->first_name}}</span>
                 @endif
               </a>
               <ul class="dropdown-menu">
                 <!-- User image -->
                 <li class="user-header">
                   <img src="{{ asset('/img/user.jpg') }}" class="img-circle" alt="User Image">
                   @if (Auth::guard('admin')->check())
                   <p>
                     {{ Auth::guard('admin')->getUser()->last_name}} {{ Auth::guard('admin')->getUser()->first_name}}
                   </p>
                   @endif
                 </li>
                 <!-- Menu Footer-->
                 <li class="user-footer">
                   <div class="pull-right">
                     <a href="/{{ ADMIN_URL_PREFIX }}/logout" class="btn btn-default btn-flat">LOGOUT</a>
                   </div>
                 </li>
               </ul>
             </li>
             <!-- /.user-menu -->
           </ul>
         </div>
         <!-- /.navbar-custom-menu -->
       </nav>
       <!-- /.navbar -->
     </header>


     <!-- Sidebar -->
     <aside class="main-sidebar">
       <section class="sidebar">
         <ul class="sidebar-menu">

           <li class="treeview">
             <a href="">
               <i class="fa fa-users"></i>
               <span>アカウント管理</span>
               <span class="pull-right-container">
                 <i class="fa fa-angle-left pull-right"></i>
               </span>
             </a>
             <ul class="treeview-menu">
               <li><a href="/{{ ADMIN_URL_PREFIX }}/user/list" style="font-size:small;"><i class="fa fa-search"></i>検索・一覧</a></li>
               <li><a href="/{{ ADMIN_URL_PREFIX }}/user/create" style="font-size:small;"><i class="fa fa-plus"></i>新規登録</a></li>
             </ul>
           </li>

       </section>
     </aside>

     <div class="content-wrapper">
       <section class="content-header">
         <h1>
           @yield('titleMain')
           <small>@yield('titleSub')</small>
         </h1>
       </section>

       <section class="content">
         @yield('content')
       </section>
     </div>

     <footer class="main-footer">
       <div class="pull-right hidden-xs"></div>
     </footer>
   </div>
   <!-- /.wrapper -->

   <!-- JS -->
   <script src="/js/common.js"></script>

 </body>
</html>
