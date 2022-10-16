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
    public function get(Request $request){
        $limit = $request->limit;
        if($limit == null) $limit = 10;
        $data = Scp::with(['class', 'skills.skill', 'features'])
        ->orderBy('id')
        ->take($limit)
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
        $limit = $request->limit;
        if($limit == null) $limit = 10;
        $data = Scp::with(['class', 'skills.skill', 'features'])
        ->whereBetween('id',[$first, $last])
        ->take($limit)
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
