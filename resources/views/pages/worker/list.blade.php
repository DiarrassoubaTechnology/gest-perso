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
                                            <th>Nom et prenoms</th>
                                            <th>E-mail</th>
                                            <th>Service</th>
                                            <th>Fonction</th>
                                            <th>Date Naissance</th>
                                            <th>Lieu Naissance</th>
                                            <th>Statut</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i=1; $i<12; $i++)
                                            
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>System Architect</td>
                                            <td>test@gmail.com</td>
                                            <td>IT</td>
                                            <td>Developpeur</td>
                                            <td>2011/04/25</td>
                                            <td>Abidjan</td>
                                            <td>Actif</td>
                                            <td>$320,800</td>
                                        </tr>
                                        
                                        @endfor
                                        
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