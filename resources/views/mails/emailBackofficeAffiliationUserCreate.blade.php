@extends('layouts.print')



@section('contain')

<div class="container mt-5 d-flex justify-content-center">

    <div class="row d-flex justify-content-center">

        <div class="col-12 col-sm-10 col-6">

            <div class="p-4">

                <div class="card-header bg-transparent pl-0">

                    <img src="https://www.barakaconsulting.ci/front/logo/baraka-logo.png" class="image-fluid p-0 m-0 col-5 col-sm-2" alt="Baraka consulting" >

                </div>



                

                <div class="alert alert-success mt-2 mb-2 text-center">

                    <strong>Votre compte a été enregistré avec succès.</strong>

                </div>  

                

                <h4 class="mt-3">Bonjour {{$infos_user['nom_parrain']}},</h4>

                <p>Nous vous remercions d’avoir créé votre compte chez nous ! Nous tenons à vous informer que votre compte est actuellement en cours d’analyse afin de valider les documents que vous avez fournis.</p>

                <p>Nous vous tiendrons informé(e) dès que cette étape sera terminée. En attendant, n’hésitez pas à nous contacter si vous avez des questions.</p>

        

                <hr class="last">

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

