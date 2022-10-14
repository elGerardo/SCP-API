<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scp extends Model
{
    protected $table = 'scp';
    protected $hidden = ['class_id','feature_id','type_id'];
    public $timestamps = false;

    public function register($request){
        
        $scp = new Scp();
        $scp->id = $request->id;
        $scp->scp_link = 'SCP-'.$request->id;
        $scp->name = $request->name;
        $scp->feeling = $request->feeling;
        $scp->class_id = $request->class_id;
        $scp->type_id = $request->type_id;

        $scp->save();

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
