<?php

namespace App\Http\Controllers\Back;
use App\Http\Controllers\Controller;
use App\Models\IrAppointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RDVController extends Controller
{
    //page index
    function pageRdvTeam(){

        if (Auth::check()) {

            $title = "Rendez-vous";

            $under_title = "Liste des creneaux occupés";

            
            $under_title = "Rendez-vous";
            
            $load_liste_file_appointment = true;
            
            // Recuperons liste des rdv
            $get_list_appointment = IrAppointment::join('ir_team_for_appointment','ir_team_for_appointment.appointment_id','=','ir_appointment.id')
            ->get()->toArray();

            return view('pages.timeclock.index', compact('title','under_title','get_list_appointment','load_liste_file_appointment'));

        } else {
                
            // L'utilisateur n'est pas authentifié (déconnecté)
            return redirect()->route('/');
        }
    }
}
