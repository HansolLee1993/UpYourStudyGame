<?php

namespace App\Listeners;

use App\Events\RoomCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class MakeRoomListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RoomCreated  $event
     * @return void
     */
    public function handle(RoomCreated $event)
    {
        //trigger waiting room
        //waiting for players
    }
}
