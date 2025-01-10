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

        
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Graphique à barres</h4>
                            <hr class="mt-2">
                            <form class="row d-flex align-items-center" id="editEmployeeForm">
                                @csrf
                                <div class="col-8 col-sm-9 col-md-6">

                                    <div class="form-group">
                                        <small for="mySearchEmployee" class="form-text text-muted">Recherche les statistique de: <span class="text-danger">*</span></small>
                                        <select class="form-control" name="searchEmployee" id="mySearchEmployee" required>

                                            @foreach ($get_liste_employee as $get_liste_employee)
                                                <option value="{{$get_liste_employee['code_employee']}}">
                                                    {{$get_liste_employee['lastname_employee'].' '.$get_liste_employee['firstname_employee']}}
                                                </option>
                                            @endforeach
                                            
                                        </select>
                                    </div>

                                </div>
                                <div class="col-4 col-sm-3 col-md-2 mt-1">
                                    <button type="button" class="btn btn-secondary" id="btnEmployeeForm">
                                        <div class="spinner-border spinner-border-sm" role="status" id="loadingSpinner" style="display: none;">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                        Rechercher
                                    </button>

                                </div>
                            
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Graphique à barres</h4>
                                    <div>
                                        <canvas id="bar-chart" height="150"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Graphique à secteurs</h4>
                                    <div>
                                        <canvas id="pie-chart" height="150"></canvas>
                                    </div>
                                </div>
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