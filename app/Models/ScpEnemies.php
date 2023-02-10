<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Exception;

class ScpEnemies extends Model
{
    protected $table = 'scp_enemies';
    protected $hidden = ['id', 'scp_id', 'scp_enemy_id'];
    public $timestamps = false;

    public static function registerEnemies($request)
    {
        try {
            DB::beginTransaction();

            foreach ($request->enemies as $enemy) {
                $scpEnemy = new ScpEnemies();
                $scpEnemy->scp_id = $request->scp_id;
                $scpEnemy->scp_enemy_id = $enemy;
                $scpEnemy->save();
            }

            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }

    public function enemy()
    {
        return $this->belongsTo(Scp::class, 'scp_enemy_id', 'id');
    }
}
