@extends('master_user')

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
            <h1> Historiques</h1>
            <!-- counter_area -->
            <section class="counter_area">
                <div class="row">
                    <!-- table area -->
                    <section class="table_area">
                        <div class="panel">
                            <div class="panel_header">
                                <div style="text-align: center" class="panel_title"><span>Historiques des exports Smaat</span></div>
                            </div>
                                <div style="text-align: center" class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nom</th>
                                            <th>Date et Horaire</th>
                                        </tr>
                                        </thead>
                                        @foreach($historiquesexports as $historiqueexport)
                                        <tbody>
                                        <tr>
                                            <td>{{$historiqueexport['id']}}</td>
                                            <td>{{$historiqueexport['name']}}</td>
                                            <td>{{$historiqueexport['date']}}</td>
                                        </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                        </div> <!-- /table -->
                    </section>
                </div>
            </section>
            <!--/ counter_area -->
            </section>
        </div><!--/middle content wrapper-->
    </div><!--/ content wrapper -->
@endsection
