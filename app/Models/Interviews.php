<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interviews extends Model
{
    protected $table = 'interviews';
    protected $hidden = ['id'];

    public static function find($request)
    {
        $id = $request->scp;
        $data = Interviews::where('scp_id', $id)->get();
        return $data;
    }
}
