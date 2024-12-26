<?php

namespace App\Http\Controllers\Back;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class WorkerController extends Controller
{
    //Page add to new worker
    function pageNewWorker(){
        
        $title = "Formulaire des employés";
        
        $under_title = "Employés";

        return view('pages.worker.index', compact('title','under_title'));
    }

    //Page index
    function pageListWorkers(){
        
        $title = "Gestion des employés";
        
        $under_title = "Employés";
        
        $load_liste_file_employee = true;

        return view('pages.worker.list', compact('title','under_title','load_liste_file_employee'));
    }
}
