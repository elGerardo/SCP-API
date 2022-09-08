<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scp;
use App\Models\Classes;

class ApiController extends Controller
{
    public function getAll(){
        $data = Scp::with(['class', 'skills.skill', 'features'])
        ->orderBy('id')
        ->get();
        return $data;
    }

    public function getOne(Request $request){
        $id = $request->id;
        $find = Scp::with(['class', 'skills.skill', 'features'])->find($id);
        $find != null ? $data = $find : $data = json_decode('{ "status": 404,  "message" : "not found" }');
        return $data;
    }

    public function getRange(Request $request){
        $first = $request->first;
        $last = $request->last;
        $data = Scp::with(['class', 'skills.skill', 'features'])
        ->whereBetween('id',[$first, $last])
        ->get();
        return $data; 
    }

    /* --------- CLASSES --------- */

    public function getAllclasses(){
        $data = Classes::all();
        return $data;
    }
}
