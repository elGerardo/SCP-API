<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scp extends Model
{
    protected $table = 'scp';
    protected $hidden = ['class_id','feature_id','type_id'];
    public $timestamps = false;

    public static function register($request){        
        $scp = new Scp();
        $scp->id = $request->id;
        $scp->scp_link = 'SCP-'.$request->id;
        $scp->name = $request->name;
        $scp->feeling = $request->feeling;
        $scp->class_id = $request->class_id;
        $scp->type_id = $request->type_id;
        $scp->picture = $request->picture;
        $scp->save();
    }

    public static function get($request){
        $limit = $request->limit;
        if($limit == null) $limit = 10;
        $data = Scp::with(['class', 'skills.skill', 'features'])
        ->orderBy('id')
        ->take($limit)
        ->get();
        return $data;
    }

    public static function getRange($request){
        $first = $request->first;
        $last = $request->last;
        $limit = $request->limit;
        if($limit == null) $limit = 10;
        $data = Scp::with(['class', 'skills.skill', 'features'])
        ->whereBetween('id',[$first, $last])
        ->take($limit)
        ->get();
        return $data;
    }

    public static function getScpEnemies($request){
        $id = $request->scp;
        $data = ScpEnemies::where('scp_id', $id)
        ->with('enemy', function($query) {
            $query->select('id','name','scp_link');
        })->get();
        return $data;
    }

    public static function find($request){
        $id = $request->scp;
        $data = Scp::with(['class', 'skills.skill', 'features'])->find($id);
        return $data;
    }

    public function class(){
        return $this->belongsTo(Classes::class, 'class_id', 'id');
    }

    public function skills(){
        return $this->hasMany(ScpSkills::class, 'scp_id', 'id');
    }

    public function features(){
        return $this->belongsTo(Features::class, 'id', 'scp_id');
    }
}
