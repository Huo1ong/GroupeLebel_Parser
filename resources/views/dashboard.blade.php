@extends('master')

@section('user')
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
            <h1>Bienvenue {{ Auth::guard('web')->user()->name }}</h1>
            <p>Vous avez validé votre adresse mail. Il vous suffit maintenant de vous déconnecter et de vous reconnecter pour avoir accès à votre rôle.</p>
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
