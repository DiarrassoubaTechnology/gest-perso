<?php

namespace App\Http\Controllers\Back;
use App\Http\Controllers\Controller;
use App\Models\IrEmployee;
use App\Models\IrFunctionOccupied;
use App\Models\IrService;
use App\Models\User;
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

            
            $load_liste_file_employee = true;
            
            // Recuperons liste des Fonction
            $get_liste_fonction = IrFunctionOccupied::where('status_id', 3)->get()->toArray();
            
            // Recuperons liste des services
            $get_liste_service = IrService::where('status_id', 3)->get()->toArray();

            return view('pages.worker.index', compact('title','under_title','get_liste_fonction','get_liste_service','load_liste_file_employee'));

        } else {
            
            // L'utilisateur n'est pas authentifié (déconnecté)
            return redirect()->route('/');
        }
        
    }

    //Page List Workers
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
            ->select('ir_employees.*','users.email','users.role_employee','ir_function_occupied.lib_function_occupied','ir_services.libelle_service','statut.lib_statut')
            ->get()->toArray();

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

    //Page edit Workers
    function pageSaveNewWorker(Request $request)
    {

        if (Auth::check()) {
            
            // Validation des champs
            $validated = $request->validate([
                'myrole' => 'required',
                'fonction' => 'required',
                'nom' => 'required|min:3',
                'prenoms' => 'required|min:3',
                'email' => 'required|email|unique:users,email',
                'contact' => 'required|min:10|unique:ir_employees,tel_employee',
                'service' => 'required',
                'date_naiss' => 'required',
                'lieu_naiss' => 'required|min:3',
                'service' => 'required',
            ], [
                'nom.min' => 'Le mot de passe doit contenir au moins 3 caractères.',
                'prenoms.min' => 'Le mot de passe doit contenir au moins 3 caractères.',
                'lieu_naiss.min' => 'Le mot de passe doit contenir au moins 3 caractères.',
            ]);

            if ($validated) {
                // code employee
                $code_employee = $this->generateCode();

                // password employee
                $pwd_employee = $this->generatePassword();

                // Récupération de id employee et user
                $get_email_employee = IrEmployee::join('users','users.employees_id','=','ir_employees.id')
                ->where('users.email' ,$request->email)
                ->get()->toArray();

                if (!empty($get_email_employee)) {
                    return response()->json([
                        'message' => 'Erreur: E-mail existant dans la base de donnée. Veuillez réessayer en vérifiant les champs.',
                        'status' => "warning",
                    ]);
                }

                $get_tel_employee = IrEmployee::join('users','users.employees_id','=','ir_employees.id')
                ->where('ir_employees.tel_employee', $request->contact)
                ->get()->toArray();

                if (!empty($get_tel_employee)) {
                    return response()->json([
                        'message' => 'Erreur: E-mail existant dans la base de donnée. Veuillez réessayer en vérifiant les champs.',
                        'status' => "warning",
                    ]);
                }

                // inserer Employee
                $insertemployee = IrEmployee::create([

                    'code_employee' => $code_employee,
                    'lastname_employee' => $request->nom,
                    'firstname_employee' => $request->prenoms,
                    'tel_employee' => $request->contact,
                    'service_id' => $request->service,
                    'fonction_employee' => $request->fonction,
                    'date_of_birth' => $request->date_naiss,
                    'place_of_birth' => $request->lieu_naiss,
                    'status_id' => 3,
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s'),
        
                ]);
        
                // Verifions si le employee a été enregistré
                if ($insertemployee) {
        
                    $insertUser = User::create([
        
                        'employees_id' => $insertemployee->id,
                        'email'=> $request->email,
                        'password'=> $pwd_employee,
                        'role_employee'=> $request->myrole,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
        
                    ]);

                    if ($insertUser && $insertemployee) {
                        return response()->json([
                            'message' => 'La demande de création a été envoyé avec succès. Veuillez vérifier votre boîte de réception pour plus de détails.',
                            'status' => "success",
                        ]);
                    } else {
                        return response()->json([
                            'message' => 'Une erreur dans la création du compte. Veuillez réessayer en vérifiant les champs.',
                            'status' => "warning",
                        ]);
                    }
                    

                } else {
                    return response()->json([
                        'message' => 'Une erreur dans la création du compte. Veuillez réessayer en vérifiant les champs.',
                        'status' => "warning",
                    ]);
                }
                
                    
            } else {
                return response()->json([
                    'message' => 'Une erreur dans la création du compte. Veuillez réessayer en vérifiant les champs.',
                    'status' => "warning",
                ]);
            }

        } else {
            // L'utilisateur n'est pas authentifié (déconnecté)
            return redirect()->route('/');
        }
    }

    //Page edit Workers
    function pageEditWorkers(Request $request)
    {

        if (Auth::check()) {

            // Validation des champs
            $validated = $request->validate([
                'myrole' => 'required',
                'firstname' => 'required|min:3',
                'lastname' => 'required|min:3',
                'emailEmp' => 'required|email',
                'phone' => 'required|min:10',
                'myserviceSelect' => 'required',
                'myfonctionSelect' => 'required',
                'datetimelocal' => 'required',
                'locationbirth' => 'required',
            ], [
                'firstname.min' => 'Le mot de passe doit contenir au moins 3 caractères.',
                'lastname.min' => 'Le mot de passe doit contenir au moins 3 caractères.',
            ]);

            if ($validated) {
                // Récupération de id employee et user
                $get_info_employee = IrEmployee::join('users','users.employees_id','=','ir_employees.id')
                ->select('ir_employees.code_employee as code','users.id as user_id')
                ->where('ir_employees.code_employee', $request->employee)
                ->where('ir_employees.status_id', 3)
                ->get()->toArray();

                if (empty($get_info_employee)) {
                    return response()->json([
                        'message' => "Le compte employé doit être actif avant d'être modifier.",
                        'status' => "warning",
                    ]);
                }

                // Mise à jour du compte user
                if(User::whereId($get_info_employee['user_id'])->update(
                    [
                        'email' => $request->emailEmp,
                        'role_employee' => $request->myrole,
                        'updated_at' => date('Y/m/d H:i:s'),
                    ]
                )){
                    
                    // Mise à jour des informations de l'employé
                    if(IrEmployee::where('code_employee', $get_info_employee['code'])->update(
                        [
                            'lastname_employee' => $request->firstname,
                            'firstname_employee' => $request->lastname,
                            'tel_employee' => $request->phone,
                            'service_id' => $request->myserviceSelect,
                            'fonction_employee' => $request->myfonctionSelect,
                            'date_of_birth' => $request->datetimelocal,
                            'place_of_birth' => $request->locationbirth,
                            'updated_at' => date('Y/m/d H:i:s'),
                        ]
                    )){
                        
                        return response()->json([
                            'message' => "Votre compte a été modifié avec succès.",
                            'status' => "success",
                        ]);
                    }
                } else {
                    return response()->json([
                        'message' => "Votre modification n'a pas été traité.",
                        'status' => "warning",
                    ]);
                }
                    
            } else {
                return response()->json([
                    'message' => 'Une erreur dans la modification. Veuillez réessayer en vérifiant les champs.',
                    'status' => "warning",
                ]);
            }

        } else {
            // L'utilisateur n'est pas authentifié (déconnecté)
            return redirect()->route('/');
        }
    }

    //Page delete Workers
    function pageDeleteWorkers(Request $request)
    {

        if (Auth::check()) {

            // Validation des champs
            $validated = $request->validate([
                'employee' => 'required',
            ]);

            if ($validated) {
                // Récupération de id employee et user
                $get_info_employee_delete = IrEmployee::join('users','users.employees_id','=','ir_employees.id')
                ->where('ir_employees.code_employee', $request->employee)
                ->where('ir_employees.status_id', 3)
                ->get()->toArray()[0];

                if (empty($get_info_employee_delete)) {
                    return response()->json([
                        'message' => "L'employé n'a pas de compte Actif.",
                        'status' => "warning",
                    ]);
                }

                // Mise à jour des informations de l'employé
                if(IrEmployee::where('code_employee', $get_info_employee_delete['code_employee'])->update(
                    [
                        'status_id' => 5,
                        'updated_at' => date('Y/m/d H:i:s'),
                    ]
                )){
                        
                        return response()->json([
                            'message' => "Le compte a été suspendu avec succès.",
                            'status' => "success",
                        ]);
                } else {
                    return response()->json([
                        'message' => "Votre demande de suspension n'a pas été traité.",
                        'status' => "warning",
                    ]);
                }
                    
            } else {
                return response()->json([
                    'message' => 'Une erreur dans la modification. Veuillez réessayer en vérifiant les champs.',
                    'status' => "warning",
                ]);
            }

        } else {
            // L'utilisateur n'est pas authentifié (déconnecté)
            return redirect()->route('/');
        }
    }

    //Page enable Workers
    function pageEnableWorkers(Request $request)
    {

        if (Auth::check()) {

            // Validation des champs
            $validated = $request->validate([
                'employee' => 'required',
            ]);

            if ($validated) {
                // Récupération de id employee et user
                $get_info_employee_enable = IrEmployee::join('users','users.employees_id','=','ir_employees.id')
                ->where('ir_employees.code_employee', $request->employee)
                ->where('ir_employees.status_id', 5)
                ->get()->toArray()[0];

                if (empty($get_info_employee_enable)) {
                    return response()->json([
                        'message' => "L'employé n'a pas de compte Actif.",
                        'status' => "warning",
                    ]);
                }

                // Mise à jour des informations de l'employé
                if(IrEmployee::where('code_employee', $get_info_employee_enable['code_employee'])->update(
                    [
                        'status_id' => 3,
                        'updated_at' => date('Y/m/d H:i:s'),
                    ]
                )){
                        
                        return response()->json([
                            'message' => "Le compte a été suspendu avec succès.",
                            'status' => "success",
                        ]);
                } else {
                    return response()->json([
                        'message' => "Votre demande de suspension n'a pas été traité.",
                        'status' => "warning",
                    ]);
                }
                    
            } else {
                return response()->json([
                    'message' => 'Une erreur dans la modification. Veuillez réessayer en vérifiant les champs.',
                    'status' => "warning",
                ]);
            }

        } else {
            // L'utilisateur n'est pas authentifié (déconnecté)
            return redirect()->route('/');
        }
    }

    // Génération du code de l'employé
    function generateCode() {
        // Obtenir les 2 derniers chiffres de l'année courante
        $yearSuffix = date('y');  // Cela renvoie les deux derniers chiffres de l'année (par exemple '25' pour 2025)
        
        // Générer un nombre aléatoire à 6 chiffres
        $randomNumber = str_pad(rand(0, 9999), 6, '0', STR_PAD_LEFT);  // Complète le nombre avec des zéros si nécessaire
        
        // Combiner le nombre aléatoire et les 2 derniers chiffres de l'année
        return $yearSuffix. $randomNumber ;  // Exemple:  25 + 1234 = 123425
    }


    // Function to generate a random password
    function generatePassword($length = 8) {
        // Desired character set for the password
        $charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+";
        
        $password = "";
        
        // Loop to generate a password of the specified length
        for ($i = 0; $i < $length; $i++) {
            // Generate a random index from the charset string
            $randomIndex = rand(0, strlen($charset) - 1);
            $password .= $charset[$randomIndex];  // Append the randomly selected character to the password
        }
        
        return $password;  // Return the generated password
    }
    
}
