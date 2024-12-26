<?php

namespace App\Http\Controllers\Back;
use App\Http\Controllers\Controller;
use App\Models\IrEmployee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkerController extends Controller
{
    //Page add to new worker
    function pageNewWorker(){

        if (Auth::check()) {

            $title = "Formulaire des employés";
        
            $under_title = "Employés";

            return view('pages.worker.index', compact('title','under_title'));

        } else {
            
            // L'utilisateur n'est pas authentifié (déconnecté)
            return redirect()->intended('/');
        }
        
    }

    //Page index
    function pageListWorkers(){
        
        if (Auth::check()) {

            $title = "Gestion des employés";
            
            $under_title = "Employés";
            
            $load_liste_file_employee = true;
            
            // Recuperons liste des employés
            $get_liste_employee = IrEmployee::join('users','users.employees_id','=','ir_employees.id')->
            join('ir_services','ir_services.id','=','ir_employees.service_id')->get()->toArray()[0];

            return view('pages.worker.list', compact('title','under_title','load_liste_file_employee','get_liste_employee'));

        } else {
                
            // L'utilisateur n'est pas authentifié (déconnecté)
            return redirect()->intended('/');
        }
    }
}
