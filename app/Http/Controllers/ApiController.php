<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scp;
use App\Models\Classes;
use App\Models\Scrapping;
use App\Models\ScpEnemies;
use App\Models\Interviews;

class ApiController extends Controller
{

    public function formatterJson($data){
        return json_encode( '{"status" : 200, "data": '.$data.' }' );
    }

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
    
    public function getScpEnemies(Request $request){
        $scpId = $request->scpId;
        $data = ScpEnemies::where('scp_id', $scpId)
        ->with('enemy', function($query) {
            $query->select('id','name','scp_link');
        })->get();
        return $data;
    }

    /* --------- INTERVIEWS --------- */
    public function getInterviews(Request $request){
        $scpId = $request->scpId;
        $data = Interviews::where('scp_id', $scpId)->get();
        return $data;
    }


    /* --------- CLASSES --------- */

    public function getAllclasses(){
        $data = Classes::all();
        return $data;
    }

    /* --------- SCRAPPING --------- */
    public function getScrapping(){
        $scrapping = new Scrapping();

        return $scrapping->scrapping();
    }
}
