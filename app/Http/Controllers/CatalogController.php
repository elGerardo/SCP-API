<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Scp;
use App\Models\Type;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    //
    public function get()
    {
        $types = Type::select(["id as value", "name as text"])->orderBy("id")->get();
        $classes = Classes::select(["id as value", "name as text"])->orderBy("id")->get();
        $scp = Scp::select(["scp.id as value","scp.id as text","features.scp_id as feature_id"])->leftjoin("features","features.scp_id","scp.id")->whereNull("features.scp_id")->orderBy("id")->get();
        $data = ["scps" => $scp, "classes" => $classes, "types" => $types];
        return response()->json(["status" => 200, "response" => $data]);
    }
}
