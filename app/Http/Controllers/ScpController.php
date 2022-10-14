<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scp;
use App\Models\Classes;
use App\Models\Scrapping;
use App\Models\ScpEnemies;
use App\Models\Interviews;
use App\Models\Features;
use App\Http\Requests\GetScpRequest;
use App\Http\Requests\GetRangeRequest;

class ScpController extends Controller
{
    public function get(){
        $data = Scp::with(['class', 'skills.skill', 'features'])
        ->orderBy('id')
        ->get();
        return response()->json(['status' => 200, 'response' => $data]); 
    }

    public function find(GetScpRequest $request){
        $id = $request->scp;
        $data = Scp::with(['class', 'skills.skill', 'features'])->find($id);
        if( $data == null ) $data = json_decode('{ "message" : "scp not found" }');
        return response()->json(['status' => 200, 'response' => $data]); 
    }

    public function getRange(GetRangeRequest $request){
        $first = $request->first;
        $last = $request->last;
        $data = Scp::with(['class', 'skills.skill', 'features'])
        ->whereBetween('id',[$first, $last])
        ->get();
        if($data->isEmpty()) $data = json_decode('{ "message" : "not range found" }');
        return response()->json(['status' => 200, 'response' => $data]); 
    }
    
    public function getScpEnemies(GetScpRequest $request){
        $id = $request->scp;
        $data = ScpEnemies::where('scp_id', $id)
        ->with('enemy', function($query) {
            $query->select('id','name','scp_link');
        })->get();
        if($data->isEmpty()) $data = json_decode('{ "message" : "not enemies found" }');
        return response()->json(['status' => 200, 'response' => $data]); 
    }
}
