<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('../images/Logo_small.png') }}" >
    <!--Page title-->
    <title>Enregistrement</title>
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
    <img src="{{ asset('panel/assets/images/preloader.gif') }}" alt="">
</div>

<div class="wrapper without_header_sidebar">
    <!-- content wrapper -->
    <div class="content_wrapper">
        <!-- page content -->
        <div class="registration_page center_container">
            <div class="center_content">
                <div class="header">
                    <h1 style="color: white; text-align: center">Groupe Lebel</h1>
                    <h3 style="color: white; text-align: center">Inscription</h3>
                </div>
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="form-group icon_parent">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control" name="name" value=" " placeholder="nom et prénom">
                        <span class="icon_soon_bottom_right"><i class="fas fa-user"></i></span>
                    </div>
                    <div class="form-group icon_parent">
                        <label for="email">Mail</label>
                        <input type="email" class="form-control" name="email" value=" " placeholder="adresse mail">
                        <span class="icon_soon_bottom_right"><i class="fas fa-envelope"></i></span>
                    </div>
                    <div class="form-group icon_parent">
                        <label for="password">Mot de Passe</label>
                        <input type="password" class="form-control" name="password" placeholder="mot de passe">
                        <span class="icon_soon_bottom_right"><i class="fas fa-unlock"></i></span>
                    </div>
                    <div class="form-group icon_parent">
                        <label for="rtpassword">Vérification mot de passe</label>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="confirmer mot de passe" required autocomplete="new-password">
                        <span class="icon_soon_bottom_right"><i class="fas fa-unlock"></i></span>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <a class="registration" href="{{ route('connexion') }}">Se connecter</a><br>


                        <button class="btn btn-blue">
                            {{ __('Valider inscription') }}
                        </button>
                    </div>
                </form>
                <div class="footer">
                    <p>Copyright &copy; 2022 <a href="https://groupelebel.com/">Groupe Lebel</a>. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div><!--/ content wrapper -->
</div><!--/ wrapper -->

<!-- jquery -->
<script src="{{ asset('panel/assets/js/jquery.min.js') }}"></script>
<!-- popper Min Js -->
<script src="{{ asset('panel/assets/js/popper.min.js') }}"></script>
<!-- Bootstrap Min Js -->
<script src="{{ asset('panel/assets/js/bootstrap.min.js') }}"></script>
<!-- Fontawesome-->
<script src="{{ asset('panel/assets/js/all.min.js') }}'"></script>
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
