<?php

namespace App\Events;
use App\Models\Player;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PlayerJoined implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $player;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Player $player)
    {
        //
        $this->player = $player;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        $game = $this->player->game_id;
        //TODO make this a private channel
        return new Channel('game.'.$game);
    }
}
