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
                            <h4 class="card-title">Liste des heures de travail</h4>
                            <h6 class="card-subtitle">Cette section présente les heures de travail des employés, avec des informations détaillées pour chaque membre du personnel.</h6>
                            

                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Heure Arrivée</th>
                                            <th>Heure Départ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (empty($get_liste_employee))
                                            <tr>
                                                <td colspan="11" class="text-center">Aucune donnée disponible.</td>
                                            </tr>
                                        @else

                                            @foreach ($get_liste_employee as $get_liste_employee)
                                            
                                                <tr {{$get_liste_employee['role_employee'] == 'admin' ? 'class="bg-danger"' : ''}}>
                                                    <td>{{$get_liste_employee['code_employee']}}</td>
                                                    <td>{{$get_liste_employee['firstname_employee']}}</td>
                                                    <td>{{$get_liste_employee['lastname_employee']}}</td>
                                                    <td>{{$get_liste_employee['email']}}</td>
                                                    <td>{{$get_liste_employee['tel_employee']}}</td>
                                                    <td>{{$get_liste_employee['lib_function_occupied']}}</td>
                                                    <td>
                                                        @if ($get_liste_employee['status_id'] == 3)

                                                            <span class="text-white bg-success btn-sm" title="{{$get_liste_employee['lib_statut']}}">
                                                                <i class="fas fa-lock-open"></i>
                                                            </span>
                                                            
                                                        @else

                                                            <span class="text-white bg-danger btn-sm" title="{{$get_liste_employee['lib_statut']}}">
                                                                <i class="fas fa-lock"></i>
                                                            </span>
                                                            
                                                        @endif
                                                    </td>
                                                </tr>

                                            @endforeach

                                        @endif
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Date</th>
                                            <th>Heure Arrivée</th>
                                            <th>Heure Départ</th>
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