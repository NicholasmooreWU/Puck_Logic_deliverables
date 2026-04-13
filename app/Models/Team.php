<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'league_id'];

    public function league()
    {
        return $this->belongsTo(League::class);
    }

    public function players()
    {
        return $this->hasMany(\App\Models\Player::class);
    }
}
