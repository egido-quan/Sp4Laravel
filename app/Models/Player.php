<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Player extends Model
{
    use HasFactory;
    
    protected $table = 'players';   
    
    public function challenges_1()
    {
        return $this->hasMany(Challenge::class, 'player1_id', 'id');

    }

    public function challenges_2()
    {
        return $this->hasMany(Challenge::class, 'player2_id', 'id');

    }
}


