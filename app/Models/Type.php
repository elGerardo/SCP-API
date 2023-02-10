<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model    
{
    protected $table = "types";
    public $timestamps = false;

    public static function register($request)
    {
        $type = new Type();
        $type->name = $request->name;
        $type->description = $request->description;
        $type->save();
    }
}
