<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scp;
use App\Models\Features;
use App\Http\Requests\GetScpRequest;
use App\Http\Requests\GetRangeRequest;
use App\Http\Requests\PostScpRequest;

class ScpController extends Controller
{
    /* --------- POST --------- */
    public function registerScp(PostScpRequest $request){
        Scp::register($request);
        return response()->json(["message" => "Success", "status" => "200"]);
    }

    /* --------- GET --------- */
    public function get(Request $request){
        $data = Scp::get($request);
        return response()->json(['status' => 200, 'response' => $data]); 
    }

    public function find(GetScpRequest $request){
        $data = Scp::find($request);
        if($data == null) $data = json_decode('{ "message" : "scp not found" }');
        return response()->json(['status' => 200, 'response' => $data]); 
    }

    public function getRange(GetRangeRequest $request){
        $data = Scp::getRange($request);
        if($data->isEmpty()) $data = json_decode('{ "message" : "not range found" }');
        return response()->json(['status' => 200, 'response' => $data]); 
    }
    
    public function getScpEnemies(GetScpRequest $request){
        $data = Scp::getScpEnemies($request);
        if($data->isEmpty()) $data = json_decode('{ "message" : "not enemies found" }');
        return response()->json(['status' => 200, 'response' => $data]); 
    }
}
