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
        h1 {
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
            outline: 0.7px solid black;
            border: 1.5px solid black;

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
            <h1>Desjardins</h1>
            <!-- counter_area -->
            <section class="counter_area">
                <div class="row">
                    <!-- table area -->
                    <section class="table_area">
                        <div class="panel">
                            <div class="panel_header">
                                <div style="text-align: center" class="panel_title"><span>Table de données "Desjardins"</span></div>
                            </div>
                            <div class="outer-wrapper">
                                <div class="table-wrapper">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Matricule</th>
                                            <th>Prénom</th>
                                            <th>Nom</th>
                                            <th>Sexe</th>
                                            <th>Date de Naissance</th>
                                            <th>Adresse</th>
                                            <th>Ville</th>
                                            <th>Province</th>
                                            <th>Pays</th>
                                            <th>Code Postal</th>
                                            <th>Tél. Résidence</th>
                                            <th>Tél. Cellulaire</th>
                                            <th>Courriel Pro.</th>
                                            <th>Description Fr.</th>
                                            <th>Description An.</th>
                                            <th>Statut Employé</th>
                                            <th>Date d'embauche</th>
                                            <th>Compagnie</th>
                                            <th>Taux</th>
                                        </tr>
                                        </thead>
                                        @foreach($desjardins as $desjardin)
                                            <tbody>
                                            <tr>
                                                <td>{{$desjardin['id']}}</td>
                                                <td>{{$desjardin['matricule']}}</td>
                                                <td>{{$desjardin['prenom']}}</td>
                                                <td>{{$desjardin['nom']}}</td>
                                                <td>{{$desjardin['sexe']}}</td>
                                                <td>{{$desjardin['date_naissance']}}</td>
                                                <td>{{$desjardin['adresse']}}</td>
                                                <td>{{$desjardin['ville']}}</td>
                                                <td>{{$desjardin['province']}}</td>
                                                <td>{{$desjardin['pays']}}</td>
                                                <td>{{$desjardin['cp']}}</td>
                                                <td>{{$desjardin['tel_res']}}</td>
                                                <td>{{$desjardin['tel_cel']}}</td>
                                                <td>{{$desjardin['courriel_pro']}}</td>
                                                <td>{{$desjardin['desc_fr']}}</td>
                                                <td>{{$desjardin['desc_an']}}</td>
                                                <td>{{$desjardin['statut_employe']}}</td>
                                                <td>{{$desjardin['date_embauche']}}</td>
                                                <td>{{$desjardin['compagnie']}}</td>
                                                <td>{{$desjardin['taux']}}</td>
                                            </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
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
