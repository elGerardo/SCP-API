<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostTypeRequest;
use App\Models\Type;

class TypeController extends Controller
{
    //
    public function registerType(PostTypeRequest $request)
    {
        Type::register($request);
        return response()->json(["message" => "Success", "status" => 200]);
    }
}
