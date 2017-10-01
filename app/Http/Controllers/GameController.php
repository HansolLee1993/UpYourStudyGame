<?php

namespace App\Http\Controllers;

use JavaScript; //publish php variables to javascript
use App\Models\Game;
use App\Models\Room;
use App\Models\Question;
use App\Models\Player;
use Illuminate\Http\Request;
use App\Events\PlayerJoined;
use App\Events\GameStarted;
use App\Events\QuestionAsked;
use App\Events\QuestionAnswered;

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
        $players = $game->players()->orderBy('created_at')->get();
        $host = $players->count() != 0 ?  $players[0] : null;
        JavaScript::put([
            'game'=>$game,
            'player'=>$player,
            'host'=>$host,
            'players'=>$players
        ]);
        return view('secondary.waitingRoom', array('player'=>$player, 'host'=>$host))->with('player_id', $player->id);
    }

    /**
     * Game host triggers game start from waiting room.
     * @param Request $request
     * @return Response
     */
    public function start(Request $request, $id)
    {
        $game = Game::find($id);
        event(new GameStarted($game));

        //TODO generate questions
        /*$questions = Question::all();*/
        $players = Player::where('game_id', $game->id)->get();
        //TODO limit questions based on number of people

        $questions = Question::withTag('physics')->get();
        if($players->count() > 4) {
            //TODO divide into two groups
            $i = 0;
            foreach($players as $player) {
                if($i<floor(sizeof($players)/2)) {
                    event(new QuestionAsked($player, $questions[0]));
                } else {
                    event(new QuestionAsked($player, $questions[1]));
                }
                $i++;
            }
        } else {
            foreach($players as $player) {
                event(new QuestionAsked($player, $questions[0]));
            }
        }
        //dd($questions);
        //TODO pass questions to react
        //TODO store questions
        return response('Succesfully starting game', 200)
            ->header('Content-Type', 'text/plain');
    }

}
