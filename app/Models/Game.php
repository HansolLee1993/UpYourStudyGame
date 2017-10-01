<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    //
    public $table = 'games';
    public $timestamps = false;
    protected $fillable = [
        'user_id', 'room_id', 'created_at'
    ];
}
