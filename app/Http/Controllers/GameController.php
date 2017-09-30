<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Room;
use Illuminate\Http\Request;

class GameController extends Controller
{

    public function index(Request $request, $gameId)
    {
        $game = Game::find($gameId)
            ->first();
        return view('waitingRoom', array('game'=>$game));
    }

}
