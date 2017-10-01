<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Room;
use App\Models\Player;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(Request $request, $gameId)
    {
        $game = Game::find($gameId)
            ->first();
        $players = $game->players()->get();
        return view('waitingRoom', array('game'=>$game, 'players'=>$players));
    }

    public function join(Request $request)
    {
        if(empty(trim($request->playerName)) || empty(trim($request->roomCodeName))) {
            return back()->with('status', 'Fields cannot be empty');
        }
        $game = Game::where('code', $request->roomCodeName)->first();
        if($game == null) {
            return back()->with('status', 'Room does not exist');
        }
        $numPlayers = Game::where('code', $request->roomCodeName)->count();
        if($numPlayers > 7) {
            return back()->with('status', 'Too many players in the room');
        }
        $player = new Player;
        $player->game_id = $game->id;
        $player->name = $request->playerName;
        $player->save();
        return view('secondary.waitingRoom', array('player'=>$player))->with('player_id', $player->id);
    }


}
