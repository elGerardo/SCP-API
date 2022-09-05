<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scp;

class ApiController extends Controller
{
    public function getAll(){
        //TODO dont show certain the columns from scp
        $data = Scp::orderBy('id')->get();
        return $data;
    }

    public function getOne($id){
        //TODO dont show certain the columns from scp_skills
        $find = Scp::with(['classes', 'scp_skills.skill', 'features'])->find($id);
        $find != null ? $data = $find : $data = json_decode('{ "status": 404,  "message" : "not found" }');
        return $data;
    }

    public function getRange($first, $last){
        $data = Scp::whereBetween('id',[$first, $last])->get();
        return $data; 
    }
}
