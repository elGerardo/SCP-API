<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scp;
use App\Models\Classes;
use App\Models\Scrapping;
use App\Models\ScpEnemies;
use App\Models\Interviews;
use App\Http\Requests\GetScpRequest;
use App\Http\Requests\GetRangeRequest;

class ApiController extends Controller
{

    public function formatterJson($data){
        return json_encode( '{"status" : 200, "data": '.$data.' }' );
    }

    public function getAll(){
        $data = Scp::with(['class', 'skills.skill', 'features'])
        ->orderBy('id')
        ->get();
        return response()->json(['status' => 200, 'response' => $data]); 
    }

    public function getOne(GetScpRequest $request){
        $id = $request->scpId;
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
        $scpId = $request->scpId;
        $data = ScpEnemies::where('scp_id', $scpId)
        ->with('enemy', function($query) {
            $query->select('id','name','scp_link');
        })->get();
        if($data->isEmpty()) $data = json_decode('{ "message" : "not enemies found" }');
        return response()->json(['status' => 200, 'response' => $data]); 
    }

    /* --------- INTERVIEWS --------- */
    public function getInterviews(GetScpRequest $request){
        $scpId = $request->scpId;
        $data = Interviews::where('scp_id', $scpId)->get();
        if($data->isEmpty()) $data = json_decode('{ "message" : "not interviews found" }');
        return response()->json(['status' => 200, 'response' => $data]); 
    }


    /* --------- CLASSES --------- */

    public function getAllclasses(){
        $data = Classes::all();
        return response()->json(['status' => 200, 'response' => $data]); 
    }

    /* --------- SCRAPPING --------- */
    public function getScrapping(){
        $scrapping = new Scrapping();

        return $scrapping->scrapping();
    }
}
