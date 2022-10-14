<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $name = $request->classId;
        $data = Classes::where("name", $name)->first();
        return $data;
    }
}
