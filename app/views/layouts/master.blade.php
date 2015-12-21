<!DOCTYPE html>
<html>
   <head>
        <meta charset="UTF-8">
        <title>@yield('title')|SIM Kinerja LPPM UNESA</title>        
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        {{HTML::style("assets/css/bootstrap.min.css")}}        
        <!-- font Awesome -->
        {{HTML::style("assets/css/font-awesome.min.css")}}        
        <!-- Ionicons -->
        {{HTML::style("assets/css/ionicons.min.css")}}        
        <!-- Theme style -->
        {{HTML::style("assets/css/AdminLTE.css")}}        
        <link rel="stylesheet" href="{{ asset('packages/uikit/css/uikit.almost-flat.min.css')}}" /> 
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->                
        <!--link rel="stylesheet" href="{{ asset('css/app.css')}}" /-->
        @yield('asset')
    </head>
    <body class="skin-blue fixed">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="{{ URL::to('dashboard') }}" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Kinerja LPPM UNESA
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">                                                                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>{{ Sentry::getUser()->first_name }} <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">                                    
                                    <p>
                                        {{ Sentry::getUser()->first_name . ' ' . Sentry::getUser()->last_name }}
                                    </p>
                                    <p>
                                        {{ $jbtn=Jabatan::where('id','=',Sentry::getUser()->jabatan)->first()->nama }}
                                    </p>
                                    <p>
                                        {{ $unit=Unit::where('id','=',Sentry::getUser()->unit)->first()->nama }}
                                    </p>
                                    <p>
                                        {{ $unitkerja=unitkerja::where('id','=',Sentry::getUser()->unit_kerja)->first()->nama }}
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{ URL::to('profile') }}" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ URL::to('logout') }}" class="btn btn-default btn-flat">Logout</a>
                                    </div>
                                    <br>
                                    <div class="pull-left">
                                        <a href="{{ URL::to('editpassword') }}" class="btn btn-default btn-flat">Ubah Password</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">                                                        
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        @if (Sentry::getUser()->hasPermission('admin'))
                        @include('dashboard.navigations.admin')
                        @endif

                        @if (Sentry::getUser()->hasPermission('kepala'))
                        @include('dashboard.navigations.kepala')
                        @endif

                        @if (Sentry::getUser()->hasPermission('kasubbag'))
                        @include('dashboard.navigations.kasubbag')
                        @endif
                        
                        @if (Sentry::getUser()->hasPermission('staff'))
                        @include('dashboard.navigations.staff')
                        @endif

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        @yield('title')
                        @yield('title-button')
                    </h1>
                    <ol class="breadcrumb">
                        @yield('breadcrumb')                        
                    </ol>                    
                </section>

                <!-- Main content -->
                <section class="content">
                    @include('layouts.partial.alert')
                    @include('layouts.partial.validation')
                    @yield('content')
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- jQuery 2.0.2 -->
        {{HTML::script('assets/js/jquery.min.js')}}        
        <!-- jQuery UI 1.10.3 -->
        {{HTML::script('assets/js/jquery-ui-1.10.3.min.js')}}        
        <!-- Bootstrap -->
        {{HTML::script('assets/js/bootstrap.min.js')}}        
        <!-- AdminLTE App -->
        {{HTML::script('assets/js/AdminLTE/app.js')}}                        
        @yield('script')
    </body>
</html>
