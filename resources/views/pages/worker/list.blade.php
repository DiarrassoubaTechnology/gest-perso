@extends('layouts.main')

@section('menu')

    <!-- Header  -->
    @include('components.header')
    <!-- END Header  -->

    <!-- Header  -->
    @include('components.sidebar')
    <!-- END Header  -->

@endsection

@section('contain')

    <!-- Page wrapper  -->
    <div class="page-wrapper">

        <!-- Bread crumb and right sidebar toggle -->
        @include('components.breadcrumb')
        <!-- End Bread crumb and right sidebar toggle -->


        <!-- Container fluid  -->
        <div class="container-fluid">
            <!-- Start Page Content -->
            <!-- basic table -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Liste des employés</h4>
                            <h6 class="card-subtitle">Cette table affiche la liste des employés de l'entreprise. Vous pouvez facilement naviguer et trouver des informations sur chaque employé.</h6>
                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                    <thead>
                                        <tr>
                                            <th>Identifiant</th>
                                            <th>Nom</th>
                                            <th>Prenoms</th>
                                            <th>E-mail</th>
                                            <th>Téléphone</th>
                                            <th>Service</th>
                                            <th>Fonction</th>
                                            <th>Date Naissance</th>
                                            <th>Lieu Naissance</th>
                                            <th>Statut</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (empty($get_liste_employee))
                                            <tr>
                                                <td colspan="9">Aucune donnée disponible.</td>
                                            </tr>
                                        @else
                                            <tr {{$get_liste_employee['role_employee'] == 'admin' ? 'class="bg-danger"' : ''}}>
                                                <td>{{$get_liste_employee['code_employee']}}</td>
                                                <td>{{$get_liste_employee['firstname_employee']}}</td>
                                                <td>{{$get_liste_employee['lastname_employee']}}</td>
                                                <td>{{$get_liste_employee['email']}}</td>
                                                <td>{{$get_liste_employee['tel_employee']}}</td>
                                                <td>{{$get_liste_employee['libelle_service']}}</td>
                                                <td>{{$get_liste_employee['fonction_employee']}}</td>
                                                <td>{{$get_liste_employee['date_of_birth']}}</td>
                                                <td>{{$get_liste_employee['place_of_birth']}}</td>
                                            </tr>
                                        @endif
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Identifiant</th>
                                            <th>Nom et prenoms</th>
                                            <th>E-mail</th>
                                            <th>Service</th>
                                            <th>Fonction</th>
                                            <th>Date Naissance</th>
                                            <th>Lieu Naissance</th>
                                            <th>Statut</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer  -->
        @include('components.footer')
        <!-- END Footer  -->
        
    </div>

@endsection