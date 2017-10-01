<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Lecturize\Tags\Traits\HasTags;

class Game extends Model
{
    //
    use HasTags;

    public $table = 'games';
    public $timestamps = false;
    protected $fillable = [
        'user_id', 'room_id', 'code', 'created_at'
    ];

    public function room()
    {
        return $this->belongsTo('App\Models\Room');
    }

    public function players()
    {
        return $this->hasMany('App\Models\Player');
    }
}
