@extends('layouts.print')



@section('contain')

<div class="container mt-5 d-flex justify-content-center">

    <div class="row d-flex justify-content-center">

        <div class="col-12 col-sm-10 col-6">

            <div class="card p-4">

                <div class="card-header bg-transparent pl-0">

                    <img src="https://www.barakaconsulting.ci/front/logo/baraka-logo.png" class="image-fluid p-0 m-0 col-5 col-sm-2" alt="Baraka consulting" >

                </div>



                @php

                    use Carbon\Carbon;

                    $date = Carbon::parse($marchand['created_at']);



                    $numfacture = $date->format('YmdHis');

                    

                    $formattedDate = $date->format('d/m/Y');



                    $code = explode('.', $marchand['code_paiement']);

                @endphp 



                <p class="text-left">

                    Référence paiement: {!! $code[0] !!} - 

                    N° Commande: {!! $code[1] !!} - 

                    Montant payé: {{ $marchand['total_paiement']}} XOF

                </p>



                <small class="text-right">

                    {!! $formattedDate !!}

                </small>

        

                <h5 class="mt-3 text-center text-white p-2 bg-success">

                    Nouveau paiement effectué sur BARAKA CONSULTING pour le service suivant:

                </h5>



                <h5 class="mt-3 mb-3">

                    @if (!empty($marchand['entreprises_id']))

                    CREATION D'ENTREPRISE - SARLU/P.

                    @endif



                    @if (!empty($marchand['assitance_visa_id']))

                        DEMANDE ASSISTANCE VISA pour {{$marchand['libelle_tarification_service']}}

                    @endif

                </h5>



                <h6>Information sur le client</h6>

                <p>Nom et prénoms: {!! $marchand['lastname_customer_visa'].' '.$marchand['firstname_customer_visa'] !!}</p>

                <p>Date Naissance: {!! $marchand['birthday_customer_visa'] !!}</p>

                <p>Lieu Naissance: {!! $marchand['location_birthday_customer_visa'] !!}</p>

                <p>Type de pièces: {!! $marchand['types_pieces'] !!}</p>

                <p>N° de pièces: {!! $marchand['num_piece_customer_visa'] !!}</p>

                <p>Téléphone: {!! $marchand['tele_customer_visa'] !!}</p>

                <p>E-mail: {!! $marchand['email_customer_visa'] !!}</p>



                <hr class="last">

                <h6>Information sur le Service</h6>

                @if (!empty($marchand['entreprises_id']))

                    <p>Type de service: CREATION D'ENTREPRISE</p>

                    <p>Nom du service: SARLU/P</p>

                @endif



                @if (!empty($marchand['assitance_visa_id']))

                    <p>Type de service: DEMANDE ASSISTANCE VISA</p>

                    <p>Nom du service: {{$marchand['libelle_tarification_service']}}</p>

                    <p>Nom du pays: {{$marchand['libelle_tarification_service']}}</p>

                    <p>Motif du séjour:{{$marchand ['motif']}}</p>

                    <p>Certificat d'accueil: {{ (1)? 'Oui':'Non'}}</p>

                    <p>Statut d'emploi: xxxxxxx</p>

                    <p>Registre commerce: xxxxxxx</p>

                    <p>Objectif Salon: xxxxxxx</p>

                    <p>Type de Salon: xxxxxxx</p>

                    <p>Montant à payer pour le salon : xxxxxxx</p>

                    <p>Description période salon : <br> xxxxxxx</p>



                    @if (!empty($marchand['assitance_visa_id']))

                        <hr class="last">

                        <h6>Information sur le Rendez-Vous</h6>



                        <p>Date: xxxxxxxxxxxx</p>

                        <p>Heure: xxxxxxxxxxxx</p>

                        <p>Type de consulation: xxxxxxxxxxxx</p>

                        <p>Réseau: xxxxxxxxxxxx</p>

                    @endif

                

                @endif



                

                

                {{-- <p>Nom du service: {!! $code[0] !!}</p>

                <p>Nom du service: {!! $code[0] !!}</p> --}}

                <hr class="last">

                <div class="row justify-content-center">

                    <small class="text-center"><i><strong>BARAKA CONSULTING - Abidjan cocody angré programme 6 les rosiers 6 Lot 4 Ilot 02 - Côte d'Ivoire 23 BP 147 ABIDJAN 23</strong></i></small>

                    <small class="text-center"><i>SARLU au capital de 1 000 000 F CFA / +225 07 78 74 55 47 - +225 27 22 47 92 11 <br> info@barakaconsulting.ci</i></small>

                </div>



            </div>



        </div>

        

        <div class="col-12 mt-3 d-flex justify-content-center">

            <a href="{{route('page.index')}}" class="btn btn-primary">Retour sur le site</a>

        </div>

    </div>

</div>

@endsection