<?php

namespace App\Http\Controllers;

use App\Models\Features;
use App\Http\Requests\PostFeatureRequest;
use Illuminate\Support\Facades\Log;

class FeaturesController extends Controller
{
    //
    public function registerFeatures(PostFeatureRequest $request){
        Features::register($request);
        return response()->json(["message" => "Success", "status" => 200]);
    }
}
