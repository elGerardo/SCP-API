<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Features extends Model
{
    protected $table = 'features';
    protected $hidden = ['id','scp_id'];
    public $timestamps = false;


    public static function register($request){
        $data = new Features();
        $data->scp_id = $request->scp_id;
        $data->short_description = $request->short_description;
        $data->full_description = $request->full_description;
        $data->color = $request->color;
        $data->height = $request->height;
        $data->width = $request->width;
        $data->weight = $request->weight;
        $data->save();
    }
}
