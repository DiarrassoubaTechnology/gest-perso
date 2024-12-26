<?php

namespace App\Http\Controllers\Back;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HourStatisticController extends Controller
{
    //page index
    function pageStatisticHour(){

        $title = "Statistique des heures";

        $under_title = "lorem";

        return view('pages.chat.index', compact('title','under_title'));
    }
}
