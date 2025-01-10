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
                <div class="col-12 col-sm-4">
                    <div class="card bg-dark text-white h-100">
                        <div class="card-header bg-clock text-white text-center">
                            <h3 class="card-title">Solution de systeme de pointage du personnel</h3>
                        </div>
                        <div class="card-body text-center">
                            @if (isset($pointageDay) && !empty($pointageDay))

                                <h3 class="card-title text-date mb-5 mt-3">
                                    Bonjour KARA !
                                </h3>

                                <img class="img-fluid text-center" src="{{asset('assets/assets/images/icon/smile-icon.png')}}" alt="" style="width:40px; display:block; margin-left:auto; margin-right:auto; filter: invert(100%);">

                                <p class="mt-2 mb-2">Votre arrivée a bien été enregistrée à</p>

                                <div class="row m-3">
                                    <div class="col-12">
                                        <div class="container d-flex justify-content-center align-items-center">
                                            <h2 class="bg-clock p-2 text-white">{{$pointageDay['start_time']->format('H:i')}}</h2>
                                        </div>
                                    </div>
                                </div>

                                @if ($retardFormate == 0)
                                    <h4 class="mt-2 mb-2 text-date border border-secondary">
                                        Merci pour votre ponctualité constante. Elle contribue grandement à l’efficacité de l’équipe et reflète votre professionnalisme. Continuez ainsi !
                                    </h4>
                                @else
                                    <h4 class="mt-2 mb-2 text-date border border-secondary">
                                        Vous êtes en retard de <span class="text-danger">{{$retardFormate}}</span>
                                    </h4>
                                @endif

                                <small>Nous vous souhaitons une excellente journée pleine de succès et de productivité. Merci pour votre engagement et votre travail acharné. Ensemble, nous faisons avancer nos projets !</small>
                                
                                @if (!empty($pointageDay['end_time']) && $pointageDay['end_time']->format('H:i'))
                                    <p class="mt-2 mb-2">Merci pour votre travail et votre implication aujourd'hui. Votre contribution est très appréciée.</p>
                                @else

                                    <div class="row d-flex justify-content-around mt-4">
                                        <button type="button" class="btn btn-info bg-clock" id="outTime">
                                            <div class="spinner-border spinner-border-sm" role="status" id="loadingSpinnerOutTime" style="display: none;">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                            <i class="fas fa-sign-out-alt"></i> Départ
                                        </button>
                                    </div>
                                    
                                @endif
                                

                            @else
                                <img class="img-fluid text-center" src="{{asset('assets/assets/images/icon/clock-icon.png')}}" alt="" style="width:40px; display:block; margin-left:auto; margin-right:auto; filter: invert(100%);">

                                {{-- Afficher la date --}}
                                <h3 class="card-title text-date text-center mb-5 mt-3" id="date"></h3>

                                {{-- Afficher l'heure --}}
                                <div class="row mb-5">
                                    <div class="col-12">
                                        <div class="container d-flex justify-content-center align-items-center">
                                            <div id="clock" class="clock">
                                                <h2 id="heure"></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row d-flex justify-content-around mt-4">
                                    <a href="{{route('page.appoint.history')}}" class="btn btn-outline-light">
                                        Historique
                                    </a>
                                    
                                    <button class="btn btn-info bg-clock" data-toggle="modal" data-target="#clock-btn-modal{{Auth::user()['employees_id']}}">
                                        Pointer heure
                                    </button>
                                </div>
                            
                            @endif

                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-8">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="card-title">Tâches à faire</h4>
                            <hr>
                            <div class="mt-4 activity">
                                <div class="d-flex align-items-start border-left-line pb-3">
                                    <div>
                                        <a href="javascript:void(0)" class="btn btn-cyan btn-circle mb-2 btn-item">
                                            <i data-feather="monitor"></i>
                                        </a>
                                    </div>
                                    <div class="ml-3 mt-2">
                                        <h5 class="text-dark font-weight-medium mb-2">Créas pour IRMEDIA</h5>
                                        <p class="font-14 mb-2 text-muted">Réalisation de créas pour les fëtes des fins d'année
                                        </p>
                                        <span class="font-weight-light font-14 text-muted">10 Minutes Ago</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start border-left-line pb-3">
                                    <div>
                                        <a href="javascript:void(0)"
                                            class="btn btn-cyan btn-circle mb-2 btn-item">
                                            <i data-feather="monitor"></i>
                                        </a>
                                    </div>
                                    <div class="ml-3 mt-2">
                                        <h5 class="text-dark font-weight-medium mb-2">Elaboration de Calendrier éditorial pour AMA</h5>
                                        <p class="font-14 mb-2 text-muted">Mise en place du calendrier pour AMA</p>
                                        <span class="font-weight-light font-14 text-muted">25 Minutes Ago</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start border-left-line pb-3">
                                    <div>
                                        <a href="javascript:void(0)"
                                            class="btn btn-cyan btn-circle mb-2 btn-item">
                                            <i data-feather="monitor"></i>
                                        </a>
                                    </div>
                                    <div class="ml-3 mt-2">
                                        <h5 class="text-dark font-weight-medium mb-2">Elaboration de Calendrier éditorial pour AMA</h5>
                                        <p class="font-14 mb-2 text-muted">Mise en place du calendrier pour AMA</p>
                                        <span class="font-weight-light font-14 text-muted">25 Minutes Ago</span>
                                    </div>
                                </div>
                                
                                <div class="d-flex align-items-start border-left-line">
                                    <div>
                                        <a href="javascript:void(0)" class="btn btn-cyan btn-circle mb-2 btn-item">
                                            <i data-feather="monitor"></i>
                                        </a>
                                    </div>
                                    <div class="ml-3 mt-2">
                                        <h5 class="text-dark font-weight-medium mb-2">Création du site web de NZCONSEILS
                                        </h5>
                                        <p class="font-14 mb-2 text-muted">Réalisons le site web pour toucher plus de clients</p>
                                        <span class="font-weight-light font-14 mb-1 d-block text-muted">2 Hours
                                            Ago</span>
                                        <a href="javascript:void(0)" class="font-14 border-bottom pb-1 border-info">Lire plus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Header Modal -->
        <div id="clock-btn-modal{{Auth::user()['employees_id']}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="clock-btn-modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header modal-colored-header bg-clock">
                        <h4 class="modal-title text-uppercase" id="clock-btn-modalLabel">
                            <img class="mr-2" src="{{asset('assets/assets/images/hrflow.png')}}" alt="" height="40">
                            Pointage de l'heure
                        </h4>

                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="card-title mb-3">Heure d'arrivée:</h4>

                                <hr class="mt-2">

                                {{-- Afficher l'heure --}}
                                <div class="row mb-5">
                                    <div class="col-12">
                                        <div class="container d-flex justify-content-center align-items-center">
                                            <h2 class="bg-success p-2 text-white" id="heureModal"></h2>
                                        </div>
                                    </div>
                                </div>

                                <p>En cliquant sur le bouton <strong>Pointer</strong>, Marquera votre présence dans notre registre des horaires du jour.</p>

                            </div>
                        </div>
                    </div>
                
                    <div class="modal-footer">

                        <button type="button" class="btn btn-info bg-clock" id="btnClockForm">
                            <div class="spinner-border spinner-border-sm" role="status" id="loadingSpinnerClock" style="display: none;">
                                <span class="sr-only">Loading...</span>
                            </div>
                            Pointer
                        </button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <!-- Footer  -->
        @include('components.footer')
        <!-- END Footer  -->
        
    </div>

    <style>
        .clock {
            width: 150px;
            height: 150px;
            background-color: #114747; /* Couleur primary */
            color: white;
            border: 5px solid #2aa1a1; /* Couleur primary */
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .text-date {
            color: #2aa1a1 !important; /* Couleur primary */
        }
        .bg-clock {
            background-color: #2aa1a1; /* Couleur primary */
            border-color: #2aa1a1
        }
        .bg-clock:hover {
            background-color: #2aa1a1; /* Couleur primary */
            border-color: #2aa1a1
        }
    </style>

@endsection