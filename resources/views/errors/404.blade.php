<!DOCTYPE html>
<html lang="fr">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="generator" content="Baraka Consulting v1.0">

        <!-- theme meta -->
        <meta name="theme-name" content="Baraka Consulting"/>

        <meta name="csrf_token" content="{{ csrf_token() }}" />

        <title>BARAKA - ERREUR 404</title>

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('favicon_io/favicon.ico')}}" />

        <link href="{{asset('favicon_io/apple-touch-icon.png')}}" rel="apple-touch-icon">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- 
        Essential stylesheets
        =====================================-->
        <link rel="stylesheet" href="{{asset('front/plugins/bootstrap/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/plugins/slick-carousel/slick/slick.css')}}">
        <link rel="stylesheet" href="{{asset('front/plugins/slick-carousel/slick/slick-theme.css')}}">

        <!-- Main Stylesheet -->
        <link rel="stylesheet" href="{{asset('front/css/style.css')}}">

    </head>

    <body>

        <section class="section-sm page_404">
            <div class="container">
                <div class="row d-flex align-items-center justify-content-center">	
                    <div class="col text-center">
                        <div class="four_zero_four_bg">
                            <h1 class="text-center">404</h1>
                        </div>
                        
                        <div class="contant_box_404">
                            <h3 class="h2">
                                On dirait que vous êtes perdu
                            </h3>
                            
                            <p>
                                La page que vous recherchez n'est pas disponible. Si vous avez besoin d'aide, n'hésitez pas à demander ! 
                                <a href="{{route('page.contact')}}" style="text-decoration: none;">Contactez-nous</a>
                            </p>
                            
                            <a href="{{route('page.index')}}" class="btn btn-primary" style="text-decoration: none;">Allez à l'Accueil</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <style>
            .section-sm {
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh; /* Centrer verticalement */
            }
            
            .four_zero_four_bg {
                margin-bottom: 20px; /* Espacement sous le titre */
            }
        </style>
        
    
        <!-- 
        Essential Scripts
        =====================================-->
        <script src="{{asset('front/plugins/jquery/jquery.js')}}"></script>
        <script src="{{asset('front/plugins/bootstrap/bootstrap.min.js')}}"></script>
        <script src="{{asset('front/plugins/slick-carousel/slick/slick.min.js')}}"></script>
        <script src="{{asset('front/plugins/shuffle/shuffle.min.js')}}"></script>
    </body>
</html>