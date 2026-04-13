<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stat extends Model
{
    use HasFactory;
    protected $fillable = [
        'player_id', 'game_id', 'goals', 'assists', 'shots', 'hits', 'pim'
    ];
}
