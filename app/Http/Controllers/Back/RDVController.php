<?php

namespace App\Http\Controllers\Back;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class RDVController extends Controller
{
    //page index
    function pageRdvTeam(){

        $title = "Rendez-vous";

        $under_title = "Liste des creneaux occupés";

        return view('pages.timeclock.index', compact('title','under_title'));
    }
}
