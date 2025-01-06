<?php

namespace App\Http\Controllers\Back;
use App\Http\Controllers\Controller;
use App\Models\IrEmployee;
use App\Models\IrFunctionOccupied;
use App\Models\IrService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkerController extends Controller
{

    // Constructeur du contrôleur
    public function __construct()
    {
        // Ajoute un middleware qui s'assure que l'utilisateur est authentifié avant d'accéder aux autres méthodes, sauf 'userLogin'
        
    }


    //Page add to new worker
    function pageNewWorker(){

        if (Auth::check()) {

            $title = "Formulaire des employés";
        
            $under_title = "Employés";
            
            // Recuperons liste des Fonction
            $get_liste_fonction = IrFunctionOccupied::where('status_id', 3)->get()->toArray();
            
            // Recuperons liste des services
            $get_liste_service = IrService::where('status_id', 3)->get()->toArray();

            return view('pages.worker.index', compact('title','under_title','get_liste_fonction','get_liste_service'));

        } else {
            
            // L'utilisateur n'est pas authentifié (déconnecté)
            return redirect()->route('/');
        }
        
    }

    //Page index
    function pageListWorkers(){
        
        if (Auth::check()) {

            $title = "Gestion des employés";
            
            $under_title = "Employés";
            
            $load_liste_file_employee = true;
            
            // Recuperons liste des employés
            $get_liste_employee = IrEmployee::join('users','users.employees_id','=','ir_employees.id')
            ->join('ir_services','ir_services.id','=','ir_employees.service_id')
            ->join('ir_function_occupied','ir_function_occupied.id','=','ir_employees.fonction_employee')
            ->join('statut','statut.id','=','ir_employees.status_id')
            ->get()->toArray()[0];
            // dd($get_liste_employee);
            // Recuperons liste des Fonction
            $get_liste_fonction = IrFunctionOccupied::where('status_id', 3)->get()->toArray();
            
            // Recuperons liste des services
            $get_liste_service = IrService::where('status_id', 3)->get()->toArray();

            return view('pages.worker.list', 
                compact('title','under_title','load_liste_file_employee','get_liste_employee','get_liste_fonction','get_liste_service')
            );

        } else {
            // L'utilisateur n'est pas authentifié (déconnecté)
            return redirect()->route('/');
        }
    }
}
