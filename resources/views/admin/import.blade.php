@extends('master_admin')

@section('admin')
    <div class="content_wrapper">
        <!--middle content wrapper-->
        <div class="middle_content_wrapper">
            @if(Session::has('error'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong> {{ session::get('error' ) }} </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="panel">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <h1>Imports</h1>
                    @if($errors->any())
                        <h5 style="color: red">Following erros exists in your Excel file</h5>
                        <ol>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ol>
                    @endif
                    @if (\Session::has('success'))
                        <div class="text-success text-center" id="hideMe">
                            <strong id="hideMe" style=" text-align:center !important;">{!! \Session::get('success') !!}</strong>
                        </div>
                    @endif

                    @if (\Session::has('danger'))
                        <div class="text-warning text-center" id="hideMe">
                            <strong id="hideMe" style=" text-align:center !important;">{!! \Session::get('danger') !!}</strong>
                        </div>
                    @endif

                    @if (\Session::has('choose_file'))
                        <div class="text-danger text-center" id="hideMe">
                            <strong id="hideMe" style=" text-align:center !important;">{!! \Session::get('choose_file') !!}</strong>
                        </div>
                    @endif
                    <div class="border p-2 ">
                        <h4>Desjardins</h4>
                        <div class="border p-2 ">
                            <form action="{{ route('import.desjardins') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="desjardins_file" id="desjardins_file" onchange="nomFichierImportDesjardins(this)" accept=".csv" required>
                                <br><br>
                                <button type="submit" class="btn btn-success">Import</button>
                            </form>
                        </div>
                        <br><br>
                        <h4>Magikpaie</h4>
                        <div class="border p-2 ">
                            <form action="{{ route('import.magikpaie') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="magikpaie_file" onchange="nomFichierImportMagikpaie(this)" accept=".csv" required>
                                <br><br>
                                <button type="submit" class="btn btn-success">Import</button>
                            </form>
                        </div>
                    </div>
                    <br><br>
                    <h1>Export des données SMAAT</h1>
                    @if (\Session::has('success2'))
                        <div class="text-success text-center" id="hideMe">
                            <strong id="hideMe" style=" text-align:center !important;">{!! \Session::get('success2') !!}</strong>
                        </div>
                    @endif
                    @if (\Session::has('delete'))
                        <div class="text-danger text-center" id="hideMe">
                            <strong id="hideMe" style=" text-align:center !important;">{!! \Session::get('delete') !!}</strong>
                        </div>
                    @endif
                    @if (\Session::has('dl_CSV'))
                        <div class="text-danger text-center" id="hideMe">
                            <strong id="hideMe" style=" text-align:center !important;">{!! \Session::get('dl_CSV') !!}</strong>
                        </div>
                    @endif
                    <div class="border p-2 ">
                        <p>Vous pouvez exporter les données choisies sous l'extension désirée :</p>
                        <h5><a class="colorgreen" href="/export-excel">Exporter la BDD sous excel</a></h5>
                        <br>
                        <h5><a class="colorgreen" href="/export-csv">Exporter la BDD sous CSV</a></h5>
                    </div>
                </div><!--/middle content wrapper-->
            </div>
        </div>
    </div><!--/ content wrapper -->
@endsection
