<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scp extends Model
{
    protected $table = 'scp';
    protected $hidden = ['class_id','feature_id','type_id'];

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
