<?php

namespace App\Http\Controllers\Back;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class WorkingHourController extends Controller
{
    //page index
    function pageHourAppointment(){
        $title = "Pointer votre présence";
        
        $under_title = "Messagerie";

        return view('pages.appointment.index', compact('title','under_title'));
    }

    //page history
    function pageHistoryHour(){
        $title = "Pointer votre présence";
        
        $under_title = "Messagerie";

        return view('pages.appointment.history', compact('title','under_title'));
    }

    //page index
    function pageReportAppointment(){
        $title = "Pointer votre présence";
        
        $under_title = "Messagerie";

        return view('pages.appointment.index', compact('title','under_title'));
    }
}
