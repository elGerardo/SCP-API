<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Exception;

class Skills extends Model
{
    protected $table = 'skills';
    protected $hidden = ['id'];
    public $timestamps = false;

    public static function register($request)
    {
        try {
            DB::beginTransaction();
            
            $skill = new Skills();
            $skill->name = $request->description;
            $skill->description = $request->description;
            $skill->save();
            DB::commit();
            return true;

        } catch (Exception $e) {
            
            DB::rollback();
            return $e->getMessage();
        
        }
    }
}
