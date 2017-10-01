<?php
/**
 * Created by PhpStorm.
 * User: vincentlee
 * Date: 2017-10-01
 * Time: 5:29 AM
 */

namespace App\Events;
use App\Models\Player;
use App\Models\Question;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class QuestionAsked implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $player;
    public $question;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Player $player, Question $question)
    {
        $this->player = $player;
        $this->question = $question;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        $game = $this->player->game_id;
        return new Channel('game.'.$game);
    }
}