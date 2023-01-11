<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Type;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    //
    public function get()
    {
        $type = Type::select(["id as value", "name as text"])->orderBy("id")->get();
        $classes = Classes::select(["id as value", "name as text"])->orderBy("id")->get();
        $data = ["classes" => $classes, "types" => $type];
        return response()->json(["status" => 200, "response" => $data]);
    }
}
