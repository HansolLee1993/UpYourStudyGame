<?php

namespace App\Http\Controllers;

use JavaScript; //publish php variables to javascript
use App\Models\Game;
use App\Models\Room;
use App\Models\Player;
use Illuminate\Http\Request;
use App\Events\PlayerJoined;

class GameController extends Controller
{
    public function index(Request $request, $gameId)
    {
        $game = Game::find($gameId)
            ->first();
        $players = $game->players()->orderBy('created_at')->get();
        $host = $players->count() != 0 ?  $players[0] : null;
        JavaScript::put([
            'game'=>$game,
            'players'=>$players,
            'host'=>$host
        ]);
        return view('waitingRoom', array('game'=>$game, 'players'=>$players, 'host'=>$host));
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
        $numPlayers = Player::where('game_id', $game->id)->count();
        if($numPlayers > 7) {
            return back()->with('status', 'Too many players in the room');
        }
        $player = new Player;
        $player->game_id = $game->id;
        $player->name = $request->playerName;
        $player->save();
        event(new PlayerJoined($player));
        $host = Player::where('game_id', $game->id)
            ->orderBy('created_at')
            ->first();
        return view('secondary.waitingRoom', array('player'=>$player, 'host'=>$host))->with('player_id', $player->id);
    }


}
