<?php

namespace App\Http\Controllers\Back;
use App\Http\Controllers\Controller;
use App\Models\IrEmployee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HourStatisticController extends Controller
{
    //page index
    function pageStatisticHour(){
        if (Auth::check()) {

            $title = "Statistique des heures";

            $under_title = "Pointage";
            
            $load_statistic_hours = true;

            // Recuperons liste des employés
            $get_liste_employee = IrEmployee::where('status_id', 3)->get()->toArray();

            return view('pages.appointment.statistic', compact('title','under_title','load_statistic_hours','get_liste_employee'));

        } else {
            // L'utilisateur n'est pas authentifié (déconnecté)
            return redirect()->route('/');
        }
        
    }
}
