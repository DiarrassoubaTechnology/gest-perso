<?php

namespace App\Http\Controllers\Back;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    //page index
    function pageChatTeam(){

        if (Auth::check()) {
            
            $title = "Messagerie";

            $under_title = "Messagerie";

            return view('pages.chat.index', compact('title','under_title'));

        } else {
                
            // L'utilisateur n'est pas authentifié (déconnecté)
            return redirect()->route('/');
        }
    }
}
