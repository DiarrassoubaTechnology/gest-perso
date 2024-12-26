<?php

namespace App\Http\Controllers\Back;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    //page index
    function pageChatTeam(){
        
        $title = "Messagerie";

        $under_title = "Messagerie";

        return view('pages.chat.index', compact('title','under_title'));
    }
}
