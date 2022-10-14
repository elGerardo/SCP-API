<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scp;
use App\Models\Classes;
use App\Models\Scrapping;
use App\Models\ScpEnemies;
use App\Models\Interviews;
use App\Models\Features;
use App\Http\Requests\GetScpRequest;
use App\Http\Requests\GetRangeRequest;

class ApiController extends Controller
{
    /* --------- SCRAPPING --------- */
    public function getScrapping(){
        $scrapping = new Scrapping();

        return $scrapping->scrapping();
    }

    /* --------- POST --------- */
    public function registerScp(Request $request){
        Scp::register($request);
        return "Success";
    }

    public function registerFeatures(Request $request){
        Features::register($request);
        return "Success";
    }
}
