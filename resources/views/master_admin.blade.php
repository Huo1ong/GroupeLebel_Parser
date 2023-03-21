<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('../images/Logo_small.png') }}" >
    <!--Page title-->
    <title>Compte Administrateur</title>
    <!--bootstrap-->
    <link rel="stylesheet" href="{{ asset('panel/assets/css/bootstrap.min.css') }}">
    <!--font awesome-->
    <link rel="stylesheet" href="{{ asset('panel/assets/css/all.min.css') }}">
    <!-- metis menu -->
    <link rel="stylesheet" href="{{ asset('panel/assets/plugins/metismenu-3.0.4/assets/css/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('panel/assets/plugins/metismenu-3.0.4/assets/css/mm-vertical-hover.css') }}">
    <!-- chart -->

    <!-- <link rel="stylesheet" href="assets/plugins/chartjs-bar-chart/chart.css"> -->
    <!--Custom CSS-->
    <link rel="stylesheet" href="{{ asset('panel/assets/css/style.css') }}">
</head>
<body id="page-top">
<!-- preloader -->
<div class="preloader">
    <img src="panel/assets/images/preloader.gif" alt="">
</div>
<!-- wrapper -->
<div class="wrapper2">
    <!-- header area -->
    <header class="header_area">
        <!-- logo -->
        <div class="sidebar_logo">
            <a>
                <img src="{{ asset('../images/Logo.png') }}" alt="" class="img-fluid logo1">
                <img src="{{ asset('../images/Logo_small.png') }}" alt="" class="img-fluid logo2">
            </a>
        </div>
        <div class="sidebar_btn">
            <button class="sidbar-toggler-btn"><i class="fas fa-bars"></i></button>
        </div>
        <ul class="header_menu">
            <li><a href="#" class="search_btn" data-toggle="modal" data-target="#myModal"><i class="fas fa-search"></i></a>
                <div class="modal fade search_box" id="myModal">
                    <button type="button" class="close m-2 text-white float-right" data-dismiss="modal">&times;</button>
                    <form action="#" class="modal-dialog modal-lg">
                        <div class="modal-content bg-transparent">
                            <!-- Modal body -->
                            <div class="modal-body">
                                <input class="form-control bg-transparent text-white form-control-lg"  type="text" placeholder="Search...">
                                <button class="btn btn-lg submit-btn" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
            <li><a data-toggle="dropdown" href="#"><i class="far fa-user"></i></a>
                <div class="user_item dropdown-menu dropdown-menu-right">
                    <ul>
                        <li>
                            <a href="{{ route('admin.logout') }}"><span><i class="fas fa-unlock-alt"></i></span> Déconnexion</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
            <a class="responsive_menu_toggle" href="#"><i class="fas fa-bars"></i></a></li>
        </ul>
    </header><!-- / header area -->
    <!-- sidebar area -->
    <aside class="sidebar-wrapper ">
        <nav class="sidebar-nav">
            <ul class="metismenu" id="menu1">
                <li class="single-nav-wrapper">
                    <a href="dashboard_admin" class="menu-item">
                        <span class="left-icon"><i class="fas fa-home"></i></span>
                        <span class="menu-text">Accueil</span>
                    </a>
                </li>
                <li class="single-nav-wrapper">
                    <a href="import" class="menu-item">
                        <span class="left-icon"><i class="fas fa-file-import"></i></span>
                        <span class="menu-text">Imports/Exports</span>
                    </a>
                </li>
                <li class="single-nav-wrapper">
                    <a class="has-arrow menu-item" href="#" aria-expanded="false">
                        <span class="left-icon"><i class="fas fa-table"></i></span>
                        <span class="menu-text">CRUD</span>
                    </a>
                    <ul class="dashboard-menu">
                        <li><a href="historiques_uploads">Historiques des uploads</a></li>
                        <li><a href="historiques_exports">Historiques des exports</a></li>
                        <li><a href="desjardins">Desjardins</a></li>
                        <li><a href="magikpaie">Magikpaie</a></li>
                        <li><a href="smaat">Smaat</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </aside><!-- /sidebar Area-->
    @yield('admin')
</div><!--/ wrapper -->

<!-- jquery -->
<script src="{{ asset('panel/assets/js/jquery.min.js') }}"></script>
<!-- popper Min Js -->
<script src="{{ asset('panel/assets/js/popper.min.js') }}"></script>
<!-- Bootstrap Min Js -->
<script src="{{ asset('panel/assets/js/bootstrap.min.js') }}"></script>
<!-- Fontawesome-->
<script src="{{ asset('panel/assets/js/all.min.js') }}"></script>
<!-- metis menu -->
<script src="{{ asset('panel/assets/plugins/metismenu-3.0.4/assets/js/metismenu.js') }}"></script>
<script src="{{ asset('panel/assets/plugins/metismenu-3.0.4/assets/js/mm-vertical-hover.js') }}"></script>
<!-- nice scroll bar -->
<script src="{{ asset('panel/assets/plugins/scrollbar/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('panel/assets/plugins/scrollbar/scroll.active.js') }}"></script>
<!-- counter -->
<script src="{{ asset('panel/assets/plugins/counter/js/counter.js') }}"></script>
<!-- chart -->
<script src="{{ asset('panel/assets/plugins/chartjs-bar-chart/Chart.min.js') }}"></script>
<script src="{{ asset('panel/assets/plugins/chartjs-bar-chart/chart.js') }}"></script>
<!-- pie chart -->
<script src="{{ asset('panel/assets/plugins/pie_chart/chart.loader.js') }}"></script>
<script src="{{ asset('panel/assets/plugins/pie_chart/pie.active.js') }}"></script>
<!-- Main js -->
<script src="{{ asset('panel/assets/js/main.js') }}"></script>

</body>
</html>
