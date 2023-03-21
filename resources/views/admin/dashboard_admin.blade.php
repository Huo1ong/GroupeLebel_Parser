@extends('master_admin')

@section('admin')
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
        <div class="middle_content_wrapper">
            <h1> Accueil</h1>
            <p>Bonjour {{ Auth::guard('web')->user()->name }}.
                Bon retour sur votre compte administrateur.</p>
            <!-- counter_area -->
            <section class="counter_area">
                <div class="row">
                </div>
            </section>
            <!--/ counter_area -->
            </section>
        </div><!--/middle content wrapper-->
    </div><!--/ content wrapper -->
@endsection
