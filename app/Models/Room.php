<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    public $table = 'rooms';
    public $timestamps = true;
    protected $fillable = [
        'code', 'user_id'
    ];

    public function game()
    {
        return $this->hasOne('App\Models\Game');
    }
}
