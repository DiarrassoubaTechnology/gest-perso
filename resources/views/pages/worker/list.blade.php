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
                            
                            <div class="d-flex justify-content-end mb-3">
                                <a href="{{route('page.worker.add')}}" class="btn btn-primary" title="Ajouter un nouvel employé">
                                    <i class="fas fa-plus-circle"></i> Ajout
                                </a>
                            </div>

                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                    <thead>
                                        <tr>
                                            <th>Identifiant</th>
                                            <th>Nom</th>
                                            <th>Prenoms</th>
                                            <th>E-mail</th>
                                            <th>Téléphone</th>
                                            <th>Fonction</th>
                                            <th>Statut</th>
                                            <th>Action</th>
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
                                                    <td>
                                                        <button class="btn btn-sm btn-primary" title="Afficher les données de {{$get_liste_employee['firstname_employee']}}" data-toggle="modal" data-target="#primary-btn-eye-modal{{$get_liste_employee['code_employee']}}">
                                                            <i class="fas fa-eye"></i>
                                                        </button>

                                                        <!-- Eye Header Modal -->
                                                        <div id="primary-btn-eye-modal{{$get_liste_employee['code_employee']}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-btn-eye-modalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header modal-colored-header bg-primary">
                                                                        <h4 class="modal-title text-uppercase" id="primary-btn-eye-modalLabel">
                                                                            <img class="mr-2" src="{{asset('assets/assets/images/hrflow.png')}}" alt="" height="40"> Détails sur {{$get_liste_employee['firstname_employee'].' '.$get_liste_employee['lastname_employee']}}
                                                                        </h4>
                                                                        <button type="button" class="close" data-dismiss="modal"
                                                                            aria-hidden="true">&times;</button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <h4 class="card-title mb-3">Informations de l'employé ici</h4>

                                                                                <hr class="mt-2">
                                                
                                                                                <div class="grid-structure">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-12">
                                                                                            <div class="grid-container text-white {{ $get_liste_employee['role_employee'] == 'admin' ? 'bg-danger' : ($get_liste_employee['role_employee'] == 'manager' ? 'bg-warning' : 'bg-success') }}">
                                                                                                Rôle: {{$get_liste_employee['role_employee']}}
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-lg-12">
                                                                                            <div class="grid-container">
                                                                                                Identifiant: {{$get_liste_employee['code_employee']}}
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-lg-12">
                                                                                            <div class="grid-container">
                                                                                                Nom: {{$get_liste_employee['firstname_employee']}}
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-lg-12">
                                                                                            <div class="grid-container">
                                                                                                Prénom: {{$get_liste_employee['lastname_employee']}}
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-lg-12">
                                                                                            <div class="grid-container">
                                                                                                E-mail: {{$get_liste_employee['email']}}
                                                                                            </div>
                                                                                        </div>
                                                                                        
                                                                                        <div class="col-lg-12">
                                                                                            <div class="grid-container">
                                                                                                Téléphone: {{$get_liste_employee['tel_employee']}}
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-lg-12">
                                                                                            <div class="grid-container">
                                                                                                Service: {{$get_liste_employee['libelle_service']}}
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-lg-12">
                                                                                            <div class="grid-container">
                                                                                                Fonction: {{$get_liste_employee['lib_function_occupied']}}
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-lg-12">
                                                                                            <div class="grid-container">
                                                                                                Date Naissance: {{$get_liste_employee['date_of_birth']}}
                                                                                            </div>
                                                                                        </div>
                                                                                        
                                                                                        <div class="col-lg-12">
                                                                                            <div class="grid-container">
                                                                                                Lieu Naissance: {{$get_liste_employee['place_of_birth']}}
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-lg-12">
                                                                                            <div class="grid-container text-white {{$get_liste_employee['status_id'] == 3 ? 'bg-success' : 'bg-warning'}}">
                                                                                                Statut: {{$get_liste_employee['lib_statut']}}
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div><!-- /.modal-content -->
                                                            </div><!-- /.modal-dialog -->
                                                        </div><!-- /.modal -->

                                                        <button class="btn btn-sm btn-warning" title="Modifier les données de {{$get_liste_employee['firstname_employee']}}" data-toggle="modal" data-target="#warning-btn-edit-modal{{$get_liste_employee['code_employee']}}">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <!-- Edit Header Modal -->
                                                        <div id="warning-btn-edit-modal{{$get_liste_employee['code_employee']}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="warning-btn-edit-modalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <form id="editEmployeeForm">
                                                                        <div class="modal-header modal-colored-header bg-warning">
                                                                            <h4 class="modal-title text-uppercase" id="warning-btn-edit-modalLabel">
                                                                                <img class="mr-2" src="{{asset('assets/assets/images/hrflow.png')}}" alt="" height="40">
                                                                                {{$get_liste_employee['firstname_employee'].' '.$get_liste_employee['lastname_employee']}}
                                                                            </h4>

                                                                            <button type="button" class="close" data-dismiss="modal"
                                                                                aria-hidden="true">&times;</button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <h4 class="card-title mb-3">Modification de l'Employé</h4>

                                                                                    <hr class="mt-2">
                                                                                    <div class="form-group">
                                                                                        <small for="myroleSelect" class="form-text text-muted">Rôle <span class="text-danger">*</span></small>
                                                                                        <select class="form-control" name="myrole" id="myroleSelect" required>
                                                                                            <option value="admin" {{$get_liste_employee['role_employee'] === trim('admin') ? 'selected' : ''}}>Admin</option>
                                                                                            <option value="manager" {{$get_liste_employee['role_employee'] === trim('manager') ? 'selected' : ''}}>Manager</option>
                                                                                            <option value="employé" {{$get_liste_employee['role_employee'] === trim('employé') ? 'selected' : ''}}>Employé</option>
                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <input type="text" required class="form-control" id="firstnametext" name="firstname" value="{{$get_liste_employee['firstname_employee']}}" aria-describedby="firstname" placeholder="First name">
                                                                                        <small id="firstname" class="form-text text-muted">Nom <span class="text-danger">*</span></small>
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <input type="text" required class="form-control" id="lastnametext" name="lastname" value="{{$get_liste_employee['lastname_employee']}}" aria-describedby="lastname" placeholder="Last name">
                                                                                        <small id="lastname" class="form-text text-muted">Prénom <span class="text-danger">*</span></small>
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <input type="email" required class="form-control" id="emailtext" name="emailEmp" value="{{$get_liste_employee['email']}}" aria-describedby="firstname" placeholder="First name">
                                                                                        <small id="firstname" class="form-text text-muted">E-mail <span class="text-danger">*</span></small>
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <input type="tel" required class="form-control" id="teltext" name="phone" value="{{$get_liste_employee['tel_employee']}}" aria-describedby="mytel" placeholder="Number phone">
                                                                                        <small id="mytel" class="form-text text-muted">Téléphone <span class="text-danger">*</span></small>
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <small for="myserviceSelect" class="form-text text-muted">Service <span class="text-danger">*</span></small>

                                                                                        <select class="form-control" id="myserviceSelect" name="myserviceSelect" required>

                                                                                            @if (!empty($get_liste_service))

                                                                                                    @foreach ($get_liste_service as $list_service)
                                                                                                        <option value="{{$list_service['id']}}"
                                                                                                            {{ $list_service['id'] == $get_liste_employee['service_id'] ? 'selected' : ''}}>
                                                                                                            {{$list_service['libelle_service']}}
                                                                                                        </option>
                                                                                                    @endforeach                                                                                                
                                                                                                
                                                                                            @else
                                                                                                
                                                                                                <option value="{{$get_liste_employee['service_id']}}">{{$get_liste_employee['libelle_service']}}</option>

                                                                                            @endif

                                                                                        </select>
                                                                                        
                                                                                    </div>
                                                                                    
                                                                                    <div class="form-group">
                                                                                        <small for="myfonctionSelect" class="form-text text-muted">Fonction <span class="text-danger">*</span></small>
                                                                                        
                                                                                        <select class="form-control" name="myfonctionSelect" id="myfonctionSelect" required>

                                                                                            @if (!empty($get_liste_fonction))

                                                                                                @foreach ($get_liste_fonction as $list_fonction)
                                                                                                    <option value="{{$list_fonction['id']}}" {{($list_fonction['id'] == $get_liste_employee['fonction_employee'])?'selected':''}}>
                                                                                                        {{$list_fonction['lib_function_occupied']}}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                                
                                                                                            @else
                                                                                                
                                                                                                <option value="{{$get_liste_employee['fonction_employee']}}">{{$get_liste_employee['lib_function_occupied']}}</option>

                                                                                            @endif

                                                                                        </select>
                                                                                    </div>
                                                                                    
                                                                                    <div class="form-group">
                                                                                        <input type="date" required class="form-control" id="datetimelocal" name="datetimelocal"
                                                                                            value="{{ $get_liste_employee['date_of_birth'] }}" 
                                                                                            aria-describedby="mydatebirth" placeholder="Date of birth">
                                                                                        <small id="mydatebirth" class="form-text text-muted">Date Naissance <span class="text-danger">*</span></small>
                                                                                    </div>
                                                                                    
                                                                                    
                                                                                    <div class="form-group">
                                                                                        <input type="text" required class="form-control" id="locationbirthtext" name="locationbirth" value="{{$get_liste_employee['place_of_birth']}}" aria-describedby="mylocation" placeholder="Location birth">
                                                                                        <small id="mylocation" class="form-text text-muted">Lieu Naissance <span class="text-danger">*</span></small>
                                                                                    </div>
                                                
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <input type="hidden" name="employee" value="{{$get_liste_employee['code_employee']}}">
                                                                    
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" id="btnEmployeeForm">
                                                                                <div class="spinner-border spinner-border-sm" role="status" id="loadingSpinner" style="display: none;">
                                                                                    <span class="sr-only">Loading...</span>
                                                                                </div>
                                                                                Enregistrer
                                                                            </button>
                                                                        </div>
                                                                        
                                                                    </form>
                                                                </div><!-- /.modal-content -->
                                                            </div><!-- /.modal-dialog -->
                                                        </div><!-- /.modal -->

                                                        <button class="btn btn-sm btn-secondary" title="Nouveau mot de passe de {{$get_liste_employee['firstname_employee']}}" data-toggle="modal" data-target="#mynewpasswordModal{{$get_liste_employee['code_employee']}}">
                                                            <i class="fas fa-key"></i>
                                                        </button>

                                                        <!-- New password modal content -->
                                                        <div id="mynewpasswordModal{{$get_liste_employee['code_employee']}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header modal-colored-header bg-secondary">
                                                                        <h4 class="modal-title text-uppercase" id="mynewpasswordModalLabel{{$get_liste_employee['code_employee']}}">
                                                                            <img class="mr-2" src="{{asset('assets/assets/images/hrflow.png')}}" alt="" height="40"> Changement de mot de passe
                                                                        </h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <small>
                                                                            Pour des raisons de sécurité, nous vous informons qu'il est nécessaire de générer un nouveau mot de passe pour accéder à votre compte. 
                                                                            Nous vous recommandons de ne pas partager votre mot de passe avec d'autres et de le conserver dans un endroit sûr. Cliquez ici pour générer un nouveau mot de passe.
                                                                        </small>
                                                                        <form>                                                                        
                                                                            <hr>
                                                                            <div class="form-group">
                                                                                <label for="password">Mot de passe <span class="text-danger">*</span></label>
                                                                                <div class="input-group">
                                                                                    <input type="password" required class="form-control" id="password" placeholder="Enter your password">
                                                                                    <div class="input-group-append">
                                                                                        <span class="input-group-text" onclick="togglePassword()">
                                                                                            <i id="eye-icon" class="fas fa-eye"></i>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <button type="button" class="btn btn-primary" onclick="generatePassword()">Générer</button>
                                                                            <button type="button" class="btn btn-success">Enregistrer</button>
                                                                        
                                                                        </form>

                                                                    </div>
                                                                </div><!-- /.modal-content -->
                                                            </div><!-- /.modal-dialog -->
                                                        </div><!-- /.modal -->

                                                        @if ($get_liste_employee['status_id'] == 3)

                                                            <button class="btn btn-sm btn-danger" title="Supprimer de {{$get_liste_employee['firstname_employee']}}" data-toggle="modal" data-target="#deleteEmployemodal{{$get_liste_employee['code_employee']}}">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                            
                                                            <!-- delete modal content -->
                                                            <div class="modal fade" id="deleteEmployemodal{{$get_liste_employee['code_employee']}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-danger text-white">
                                                                            <h4 class="modal-title" id="myCenterModalLabel">
                                                                                <img class="mr-2" src="{{asset('assets/assets/images/hrflow.png')}}" alt="" height="40"> Confirmation du statut de compte
                                                                            </h4>
                                                                            <button type="button" class="close" data-dismiss="modal"
                                                                                aria-hidden="true">×</button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form id="deleteEmployeeForm">
                                                                                <input type="hidden" name="employee" value="{{$get_liste_employee['code_employee']}}">
                                                                            </form>
                                                                            <p>Voulez-vous desactiver le compte de <strong>{{$get_liste_employee['firstname_employee']}}</strong> ? Si Oui veuillez confirmer.</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" id="deleteEmployeeBtn">
                                                                                <div class="spinner-border spinner-border-sm" role="status" id="loadingSpinnerDelete" style="display: none;">
                                                                                    <span class="sr-only">Loading...</span>
                                                                                </div>
                                                                                Desactiver
                                                                            </button>
                                                                        </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div><!-- /.modal -->
                                                            
                                                        @else

                                                            <button class="btn btn-sm btn-success" title="Activation de {{$get_liste_employee['firstname_employee']}}" data-toggle="modal" data-target="#enableEmployemodal{{$get_liste_employee['code_employee']}}">
                                                                <i class="fas fa-check"></i>
                                                            </button>
                                                            
                                                            <!-- delete modal content -->
                                                            <div class="modal fade" id="enableEmployemodal{{$get_liste_employee['code_employee']}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-success text-white">
                                                                            <h4 class="modal-title" id="myCenterModalLabel">
                                                                                <img class="mr-2" src="{{asset('assets/assets/images/hrflow.png')}}" alt="" height="40"> Confirmation du statut de compte
                                                                            </h4>
                                                                            <button type="button" class="close" data-dismiss="modal"
                                                                                aria-hidden="true">×</button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form id="enableFormEmployee">
                                                                                <input type="hidden" name="employee" value="{{$get_liste_employee['code_employee']}}">
                                                                            </form>
                                                                            <p>Voulez-vous activer le compte de <strong>{{$get_liste_employee['firstname_employee']}}</strong> ? Si Oui veuillez confirmer.</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" id="enableBtnEmployee">
                                                                                <div class="spinner-border spinner-border-sm" role="status" id="loadingSpinnerEnable" style="display: none;">
                                                                                    <span class="sr-only">Loading...</span>
                                                                                </div>
                                                                                Activer
                                                                            </button>
                                                                        </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div><!-- /.modal -->
                                                            
                                                        @endif
                                                    </td>
                                                </tr>

                                            @endforeach

                                        @endif
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Identifiant</th>
                                            <th>Nom</th>
                                            <th>Prenoms</th>
                                            <th>E-mail</th>
                                            <th>Téléphone</th>
                                            <th>Fonction</th>
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