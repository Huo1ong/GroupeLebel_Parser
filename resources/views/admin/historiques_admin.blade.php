@extends('master_admin')

@section('admin')
    <style>
        * {
            margin: 0px;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .heading {
            display: flex;
            background-color: #232f3e;
            box-shadow: 0px 1px 2px #232f3e;
        }

        h1, p {
            color: #252f27;
            font-weight: bold;
            background: transparent;
            padding: 7px;
        }

        .outer-wrapper {
            margin: 10px;
            margin-left: 20px;
            margin-right: 20px;
            border: 1px solid black;
            border-radius: 4px;
            box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.9);
            max-width: fit-content;
            max-height: fit-content;
        }

        .table-wrapper {
            overflow-y: scroll;
            overflow-x: scroll;
            height: fit-content;
            max-height: 66.4vh;
            margin-top: 22px;
            margin: 15px;
            padding-bottom: 20px;
            color: white !important;
        }

        table {
            min-width: max-content;
            border-collapse: separate;
border-spacing: 0px;
}

table th{
position: sticky;
top: 0px;
background-color: #255e34;
color: rgb(255, 255, 255);
text-align: center;
font-weight: normal;
font-size: 18px;
outline: 0.7px solid white;
border: 1.5px solid white;
}

table th, table td {

padding: 15px;
padding-top: 10px;
padding-bottom: 10px;
}

table td {
text-align: left;
font-size: 15px;
border: 1px solid rgb(177, 177, 177);
padding-left: 20px;
color: white;
}

.texteBlanc {
color: white;
}
</style>

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
    <h1>Historiques des exports Smaat</h1>
    <p>Vous télécharger l'export que vous voulez en cliquant sur son nom.</p>
    <!-- counter_area -->
    <section class="counter_area">
        <div class="row">
            <!-- table area -->
            <section class="table_area">
                <div class="panel">
                    <div class="panel_header">
                        <div style="text-align: center" class="panel_title">
                            <span>Table de données "historiquesexports"</span>
                        </div>
                        <div class="outer-wrapper">
                            <div class="table-wrapper">
                                <table>
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nom</th>
                                        <th>Date et Horaire</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($data as $key=>$items)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td><a class="texteBlanc" href="{{ url('/download/'.$items->id) }}">{{ $items->name }}</a></td>
                                            <td>{{ $items->date }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <!--/ counter_area -->
    </section>
</div><!--/middle content wrapper-->
</div><!--/ content wrapper -->
@endsection
