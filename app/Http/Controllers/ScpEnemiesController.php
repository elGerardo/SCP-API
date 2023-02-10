<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostScpEnemiesRequest;
use App\Models\ScpEnemies;

class ScpEnemiesController extends Controller
{
    //
    public function registerScpEnemies(PostScpEnemiesRequest $request){
        ScpEnemies::registerEnemies($request);
        return response()->json(["message" => "Success", "status" => 200]);    
    }
}
