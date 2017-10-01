<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    //
    public $table = 'players';
    public $timestamps = true;
    protected $fillable = [
        'name', 'game_id', 'points'
    ];

    public function game()
    {
        return $this->belongsTo('App\Models\Game');
    }
}
