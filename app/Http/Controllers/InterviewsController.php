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
        $data = Interviews::find($request);
        if($data->isEmpty()) $data = json_decode('{ "message" : "not interviews found" }');
        return response()->json(['status' => 200, 'response' => $data]); 
    }
}
