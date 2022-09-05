<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scp extends Model
{
    protected $table = 'scp';

    public function classes(){
        return $this->belongsTo(Classes::class, 'class_id', 'id');
    }

    public function scp_skills(){
        return $this->hasMany(ScpSkills::class, 'scp_id', 'id');
    }

    public function features(){
        return $this->belongsTo(Features::class, 'feature_id', 'id');
    }
}
