<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
//         $test = Hash::make('123456789');
// dd($test);
class AuthController extends Controller
{
    //Page index
    function userLogin(){

        if (Auth::check()) {
            // L'utilisateur est authentifié (connecté)
            return redirect()->route('page.dashboard');
        } else {
            // L'utilisateur n'est pas authentifié (déconnecté)
            $title = "IR GROUP";

            return view('pages.auth.login', compact('title'));
        }
    }

    //Function se connecter
    public function connexionUser(Request $request)
    {
        if (Auth::check()) {
            // L'utilisateur est authentifié (connecté)
            return redirect()->route('page.dashboard');
        } else {
            // Validation des champs
            $validated = $request->validate([
                'identifiant_user' => 'required',
                'mypassword' => 'required|min:6',
            ], [
                'mypassword.min' => 'Le mot de passe doit contenir au moins 6 caractères.',
            ]);

            if ($validated) {

                // Recuperons les infos de l'employé si est actif
                $verif_identifiant_employee = DB::table('ir_employees')->where('code_employee', $request->identifiant_user)->get()->toArray();
                $verif_statut_employee = DB::table('ir_employees')->where('code_employee', $request->identifiant_user)->where('status_id', 3)->get()->toArray();

                if (!empty($verif_identifiant_employee)) {

                    if (!empty($verif_statut_employee)) {

                        if (!empty($verif_identifiant_employee) && !empty($verif_statut_employee)) {
                            $get_info_employee = DB::table('ir_employees')->where('code_employee', $request->identifiant_user)->where('status_id', 3)->get()->toArray()[0];
                            // Recuperons email de user actif
                            $get_info_users = DB::table('users')->where('employees_id', $get_info_employee->id)->get()->toArray()[0];
            
                            $email_user = $get_info_users->email;
                        
                            // Tentative de connexion
                            if (Auth::attempt(['email' => $email_user, 'password' => $request->mypassword])) {
                                // Rediriger si l'utilisateur est actif
                                return redirect()->route('page.dashboard');
                            }
                    
                            
                        } else {
                            // En cas d'échec de la connexion
                            return back()->withErrors(['email' => "Votre compte n'est pas actif. Veuillez contacter l'administrateur pour plus d'informations."]);
                        }

                    } else {
                        // En cas d'échec de la connexion
                        return back()->withErrors(['email' => 'Votre compte a été désactivé. Merci de votre compréhension']);
                    }

                } else {
                    // En cas d'échec de la connexion
                    return back()->withErrors(['email' => 'Identifiant non trouvé. Veuillez vérifier votre identifiant et réessayer.']);
                }

                
            }

            // En cas d'échec de la connexion
            return back()->withErrors(['email' => 'Les informations de connexion sont incorrectes.']);
        }
    }

    public function accountLogout(){
        if (Auth::check()) {
            // L'utilisateur est authentifié (connecté)
            Auth::logout();
            return redirect('/');
        }else{
            // L'utilisateur n'est pas authentifié (déconnecté)
            return redirect('/');
        }
        
    }
}
