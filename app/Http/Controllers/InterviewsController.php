<?php

namespace App\Http\Controllers;

use App\Models\Interviews;
use App\Http\Requests\GetScpRequest;

class InterviewsController extends Controller
{
    //

    public function get()
    {
        $data = Interviews::all();
        return $data;
    }

    public function find(GetScpRequest $request){
        $id = $request->scp;
        $data = Interviews::where('scp_id', $id)->get();
        if($data->isEmpty()) $data = json_decode('{ "message" : "not interviews found" }');
        return response()->json(['status' => 200, 'response' => $data]); 
    }
}
