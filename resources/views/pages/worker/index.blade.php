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
                            <form id="FormAjoutWorker">
                                <div class="form-body">
            
                                    <h4 class="card-title">Informations personnelles</h4>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="first-name">Nom</label>
                                                <input type="text" id="nom" name="nom" class="form-control" placeholder="...">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="last-name">Prénom(s)</label>
                                                <input type="text" id="prenoms" name="prenoms" class="form-control" placeholder="...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="contact">Adresse E-mail</label>
                                                <input type="text" id="email" name="email" class="form-control" placeholder="...">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="contact">Téléphone</label>
                                                <input type="number" id="contact" name="contact" class="form-control" placeholder="...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="birth-date">Date de naissance</label>
                                                <input type="date" id="date_naiss" name="date_naiss" class="form-control" placeholder="...">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="birth-place">Lieu de naissance</label>
                                                <input type="text" id="lieu_naiss" name="lieu_naiss" class="form-control" placeholder="...">
                                            </div>
                                        </div>
                                    </div>
            
                                    <h4 class="card-title">Informations professionnelles</h4>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="department">Service</label>
                                                <select class="custom-select" id="selectService" name="service">
                                                    <option selected>Choisir...</option>
                                                    @foreach ($get_liste_service as $service)
                                                        <option value="{{$service['libelle_service']}}">{{$service['libelle_service']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="position">Fonction</label>
                                                <select class="custom-select" id="selectFonction" name="fonction">
                                                    <option selected>Choisir...</option>
                                                    @foreach ($get_liste_fonction as $fonction)
                                                        <option value="{{$fonction['lib_function_occupied']}}">{{$fonction['lib_function_occupied']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="position">Rôle</label>
                                                <select class="custom-select" id="Statut" name="statut">
                                                    <option>...</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="manager">Manager</option>
                                                    <option value="employé">Employé</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="text-right">
                                        <a href="{{route('page.worker.list')}}" class="btn btn-dark">Voir la liste</a>
                                        <button type="submit" class="btn btn-info">Inscrire</button>
                                    </div>
                                </div>
                            </form>
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