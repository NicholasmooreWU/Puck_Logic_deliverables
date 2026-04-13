<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Player extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'goals',
        'assists',
        'points',
        'penalty_minutes',
        'plus_minus',
        'team_id',
    ];
}
