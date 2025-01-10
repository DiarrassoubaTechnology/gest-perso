<?php

namespace App\Http\Controllers\Back;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkLeaveController extends Controller
{
    //page demande de congé
    function pageLeaveList(){
        
        if (Auth::check()) {

            $title = "Demande de congé";
            
            $under_title = "Congés";

            $load_leave_list = true;

            return view('pages.workleave.index', compact('title','under_title','load_leave_list'));

        } else {
            // L'utilisateur n'est pas authentifié (déconnecté)
            return redirect()->route('/');
        }
    }

    //page index
    function pageLeaveJustify(){
        
        if (Auth::check()) {
            $title = "Heures Absences";
            
            $under_title = "Justification";

            $load_leave_list = true;

            return view('pages.workleave.justificationLeave', compact('title','under_title','load_leave_list'));

        } else {
            // L'utilisateur n'est pas authentifié (déconnecté)
            return redirect()->route('/');
        }
    }
}
