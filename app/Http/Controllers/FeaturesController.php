<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Features;
use App\Http\Requests\PostFeatureRequest;

class FeaturesController extends Controller
{
    //
    public function registerFeatures(PostFeatureRequest $request){
        Features::register($request);
        return response()->json(["message" => "Success", "status" => "200"]);
    }
}
