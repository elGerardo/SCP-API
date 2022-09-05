<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScpSkills extends Model
{
    protected $table = 'scp_skills';

    public function skill(){
        return $this->belongsTo(Skills::class, 'skill_id', 'id');
    }
}
