<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Http\Requests\GetClassRequest;

class ClassesController extends Controller
{
    //
    public function get(){
        $data = Classes::all();
        return response()->json(['status' => 200, 'response' => $data]); 
    }

    public function find(GetClassRequest $request)
    {
        $data = Classes::find($request);
        return response()->json(['status' => 200, 'response' => $data]); 
    }
}
