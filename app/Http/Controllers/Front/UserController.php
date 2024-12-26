<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function accountPasswdChange(){

        if (Auth::check()) {

            $title = "Mon profil";
            $callprofilpagefile = "true";

            // L'utilisateur est authentifié (connecté)
            $accountUser = Auth::check(); // Informations de l'utilisateur standard
            $user = User::where('user_id', $accountUser->user_id)->first(); // Informations de l'utilisateur de compte

            // Recuperons les infos de user
            $infosUser = User::join('account_users','account_users.user_id','=','users.user_id')
                        ->where('users.user_id', $accountUser->user_id)
                        ->where('account_users.statut', 'Actif')
                        ->get();

            // Recuperons le panier actif
            $panieractif = Cart::where('user_id', $accountUser->user_id)->where('statut', 'En cours')->get();
            // nombre de produits dans le panier
            $countcart = count($panieractif);

            return view('pages.front.infosUser.security', compact('title','Allsouscategorie','infoAbout','infosUser','countcart','user','callprofilpagefile'));
        } else {
            // L'utilisateur n'est pas authentifié (déconnecté)
            return redirect('/');
        }
    }
}
