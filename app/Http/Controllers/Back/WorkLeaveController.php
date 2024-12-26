<?php

namespace App\Http\Controllers\Back;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class WorkLeaveController extends Controller
{
    //page index
    function pageLeaveList(){
        $title = "Liste des congés";
        
        $under_title = "Messagerie";

        return view('pages.workleave.index', compact('title','under_title'));
    }

    //page index
    function pageLeaveJustify(){
        $title = "Justification des heures Absences";
        
        $under_title = "Messagerie";

        return view('pages.workleave.justificationLeave', compact('title','under_title'));
    }
}
