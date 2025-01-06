<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //Page index
    function pageIndex(){

        if (Auth::check()) {
            
            $load_liste_file_dashboard = true;

            $title = "Tableau de bord";
        
            $under_title = "Bonjour IR GROUP!";

            return view('pages.dashboard.index', compact('title','under_title'));

        } else {
            
            // L'utilisateur n'est pas authentifié (déconnecté)
            return redirect()->intended('/');
        }
        
    }
}
