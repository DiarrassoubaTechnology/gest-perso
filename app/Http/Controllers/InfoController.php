<?php

namespace App\Http\Controllers;

use App\Models\IrFunctionOccupied;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function getListFunction(Request $request)
    {
        $serviceId = $request->input('service');
        $fonctions = IrFunctionOccupied::where('service_id', $serviceId)->get(['id', 'lib_function_occupied']);
        return response()->json($fonctions);
    }
}
