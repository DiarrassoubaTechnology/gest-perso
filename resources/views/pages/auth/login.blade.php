@extends('layouts.main_auth')

@section('contain')

    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
            style="background:url(assets/assets/images/big/backgroun-auth-2412231418.jpg) no-repeat center center;">
            <div class="auth-box row">
                <div class="col-lg-6 col-md-5 modal-bg-img" style="background-image: url(assets/assets/images/big/bg-img-auth-login.jpg);">
                </div>
                <div class="col-lg-6 col-md-7 bg-white">
                    <div class="p-3">
                        <div class="text-center">
                            <img src="assets/assets/images/hrflow-logo.png" alt="wrapkit">
                        </div>
                        <h2 class="mt-3 text-center">Bonjour! Commençons</h2>
                        <p class="text-center">Connectez-vous pour continuer.</p>

                        @if ($errors->has('identifiant_user'))
                            <div class="alert alert-danger mt-2 mb-2">
                                <strong>{{ $errors->first('identifiant_user') }}</strong>
                            </div>
                        @endif

                        @if ($errors->has('mypassword'))
                            <div class="alert alert-danger mt-2 mb-2">
                                <strong>{{ $errors->first('mypassword') }}</strong>
                            </div>
                        @endif

                        @if ($errors->has('email'))
                            <div class="alert alert-danger mt-2 mb-2">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif

                        <form class="mt-4" method="POST" action="{{route('login.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="uname">Identifiant</label>
                                        <input class="form-control" name="identifiant_user" id="uname" type="text" placeholder="Entrez votre identifiant">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="pwd">Mot de passe</label>
                                        <input class="form-control" name="mypassword" id="pwd" type="password" placeholder="Entrez votre mot de passe">
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn btn-block btn-dark">Se connecter</button>
                                </div>
                                <div class="col-lg-12 text-center mt-5">
                                    Avez-vous un souci ? <span class="text-danger">Contacter le service Administration</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
    </div>

@endsection