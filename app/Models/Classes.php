<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';
    protected $hidden = ['id'];

    public static function find($request)
    {
        $name = $request->classId;
        $data = Classes::where("name", $name)->first();
        return $data;
    }
}
