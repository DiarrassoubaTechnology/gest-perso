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

                

                <h1 class="text-center mt-3">BARAKA CONSULTING</h1>

        

                <h6 class="mt-3">Détails de l'enregistrement avec paiement</h6>

                <hr>

                <div class="row">

                    <div class="col-6">

                        <p><strong>Payé le:</strong> {!! $formattedDate !!}</p>

                        

                        <p><strong>Mode de réglement:</strong> {!! empty($marchand['mode_paiement'])? 'Néant': $marchand['mode_paiement'] !!}</p>

                        <p><strong>Référence :</strong> {!! $code[0] !!}</p>

                        <p><strong>Commande : </strong> {!! $code[1] !!}</p>

                        

                    </div>

                    <div class="col-6 text-end">

                        @if (!empty($marchand['entreprises_id']))

                        <p><strong>Type de facture:</strong> CREATION D'ENTREPRISE</p>

                        <p><strong>Service Baraka:</strong> SARLU/P</p>

                        @endif



                        @if (!empty($marchand['assitance_visa_id']))

                        <p><strong>Type de facture:</strong> ASSISTANCE VISA</p>

                        <p><strong>Service Baraka:</strong> {{$marchand['libelle_tarification_service']}}</p>

                        <p><strong>Motif de demande:</strong> {{$marchand['libelle_details_services']}}</p>

                        <p><strong>Pays:</strong> {{$marchand['liste_pays_visa']}}</p>

                        @endif

                    </div>

                </div>

                <div class="alert alert-success text-center">

                    <strong>Votre paiement a été enregistré avec succès.</strong>

                </div>  

                <div class="row mt-3">

                    <table class="table">

                        <thead>

                        <tr class="table-primary">

                            <th colspan="3" scope="col">Facture n°{{ $numfacture }}</th>

                        </tr>

                        </thead>

                        <tbody>

                        <tr class="border-bottom">

                            <td colspan="2">Total de la facture H</td>

                            <td>{{ $marchand['total_paiement'] - $marchand['frais_tva']}} XOF</td>

                        </tr>

                        <tr class="border-top">

                            <td colspan="2">TVA ({{$tva}}%)</td>

                            <td>{{ $marchand['frais_tva']}} XOF</td>

                        </tr>

                        <tr class="table-secondary">

                            <td colspan="2"><strong>Total de la facture TTC</strong> </td>

                            <td><strong>{{ $marchand['total_paiement']}} XOF</strong></td>

                        </tr>

                        </tbody>

                    </table>



                    <div class="card col-12 p-2">

                        <p><h6>Adresse URL:</h6> https://barakaconsulting.com</p>

                        <p><h6>Identifiant du marchand:</h6> 5879755</p>

                    </div>

                </div>

        

                <hr class="last">

                <small>Facture {{ $numfacture }} </small>

                <div class="row justify-content-center">

                    <small class="text-center"><i><strong>BARAKA CONSULTING - Abidjan cocody angré programme 6 les rosiers 6 Lot 4 Ilot 02 - Côte d'Ivoire 23 BP 147 ABIDJAN 23</strong></i></small>

                    <small class="text-center"><i>SARLU au capital de 1 000 000 F CFA / +225 07 78 74 55 47 - +225 27 22 47 92 11 <br> info@barakaconsulting.ci</i></small>

                </div>

                

            </div>



        </div>

    </div>

</div>

@endsection



<style>

    .card {

        border: 1px solid #dee2e6;

    }



    h4 {

        font-weight: bold;

    }



    hr {

        margin: 0 0 20px 0 !important;

        border-top: 1px solid #dee2e6;

    }



    .last {

        margin: 50px 0 0 0 !important;

        border-top: 1px solid #dee2e6;

    }



    @media print {

        /* Print styles */

        .print{

            opacity: 0;

        }



        .container {

            margin: 0; /* Remove margins for printing */

        }



        /* Adjust the layout as necessary for printing */

        .card {

            border: none; /* Remove borders for print view */

            box-shadow: none; /* Remove shadows */

        }



        /* Additional styles */

        h1, h6, p {

            color: black; /* Ensure text is black */

        }

    }

</style>

