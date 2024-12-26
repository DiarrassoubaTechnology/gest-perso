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
            return redirect()->intended('/dashboard');
        } else {
            // L'utilisateur n'est pas authentifié (déconnecté)
            $title = "IR GROUP";

            return view('pages.auth.login', compact('title'));
        }
    }

    //Function se connecter
    public function connexionUser(Request $request)
    {
        // Validation des champs
        $validated = $request->validate([
            'identifiant_user' => 'required',
            'mypassword' => 'required|min:6',
        ]);

        if ($validated) {

            // Recuperons les infos de l'employé si est actif
            $get_info_employee = DB::table('ir_employees')->where('code_employee', $request->identifiant_user)->where('status_id', 3)->get()->toArray()[0];

            if (!empty($get_info_employee)) {
                // Recuperons email de user actif
                $get_info_users = DB::table('users')->where('employees_id', $get_info_employee->id)->get()->toArray()[0];

                $email_user = $get_info_users->email;
            
                // Tentative de connexion
                if (Auth::attempt(['email' => $email_user, 'password' => $request->mypassword])) {
                    // Rediriger si l'utilisateur est actif
                    return redirect()->intended('/dashboard');
                }
         
                
            } else {
                // En cas d'échec de la connexion
                return back()->withErrors(['email' => 'Votre compte a été désactivé. Merci de votre compréhension']);
            }
            
        }

        // En cas d'échec de la connexion
        return back()->withErrors(['email' => 'Les informations de connexion sont incorrectes.']);
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
