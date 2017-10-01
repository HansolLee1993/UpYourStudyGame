<?php

namespace App\Listeners;

use App\Events\PlayerJoined;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddPlayerListener
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
     * @param  PlayerJoined  $event
     * @return void
     */
    public function handle(PlayerJoined $event)
    {
        //
    }
}
