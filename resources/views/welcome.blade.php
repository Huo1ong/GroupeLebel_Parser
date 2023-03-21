@extends('master')

@section('master')
    <!-- header area -->
    <header class="header_area">
        <!-- logo -->
        <div class="sidebar_logo">
            <a href="index.html">
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
            <li>

                <a class="responsive_menu_toggle" href="#"><i class="fas fa-bars"></i></a></li>
        </ul>
    </header><!-- / header area -->
    <!-- sidebar area -->
    <aside class="sidebar-wrapper ">
        <nav class="sidebar-nav">
            <ul class="metismenu" id="menu1">
                <li class="single-nav-wrapper">
                    <a href="/" class="menu-item">
                        <span class="left-icon"><i class="fas fa-home"></i></span>
                        <span class="menu-text">Accueil</span>
                    </a>
                </li>
                <li class="single-nav-wrapper">
                    <a href="connexion" class="menu-item">
                        <span class="left-icon"><i class="fas fa-home"></i></span>
                        <span class="menu-text">Connexion</span>
                    </a>
                </li>
                <li class="single-nav-wrapper">
                    <a href="register" class="menu-item">
                        <span class="left-icon"><i class="fas fa-registered"></i></span>
                        <span class="menu-text">Enregistrement</span>
                    </a>
                </li>
                <li class="single-nav-wrapper">
                    <a href="https://groupelebel.com/" class="menu-item">
                        <span class="left-icon"><i class="fas fa-id-badge" aria-hidden="true"></i></span>
                        <span class="menu-text">Groupe Lebel</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside><!-- /sidebar Area-->

    <div class="content_wrapper">
        <!--middle content wrapper-->

        @if(Session::has('error'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong> {{ session::get('error' ) }} </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
            <div id="particles-js">
                <div class="container">
                    <div class="row top">
                        <div class="twelve column">
                            <h1 class="grosh1">GROUPE LEBEL</h1>
                            <h2 class="petith1">Rivière-du-Loup</h2>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="one-half column">
                        <div class="posts pulled">
                            <h1><a class="h1_1" href="connexion">Connexion</a></h1>
                            <br>
                            <br>
                            <h1><a class="h1_1" href="register">Inscription - Enregistrement</a></h1>
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br>
            <div class="container ">
                <div class="footer">
                    <p>Projet Groupe Lebel - <a class="colorwhite" href="https://groupelebel.com/">Site web de l'entreprise</a></p>
                </div>
            </div>
        </div><!--/middle content wrapper-->
    </div><!--/ content wrapper -->
@endsection
