<?php

namespace App\Http\Controllers;

use App\Models\Skills;
use App\Http\Requests\PostSkillRequest;

class SkillController extends Controller
{
    //
    public function registerSkill(PostSkillRequest $request){
        
        Skills::register($request);
        return response()->json(["message" => "Success", "status" => 200]);
    }
}
