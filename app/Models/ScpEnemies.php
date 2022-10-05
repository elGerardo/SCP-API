<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScpEnemies extends Model
{
    protected $table = 'scp_enemies';
    protected $hidden = ['id','scp_id','scp_enemy_id'];

    public function enemy(){
        return $this->belongsTo(Scp::class, 'scp_enemy_id', 'id');
    }
}
