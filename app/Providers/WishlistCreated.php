<?php

namespace App\Providers;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class WishlistCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @property App\Models\Wishlist
     */
    public $wishlist;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($wishlist)
    {
        $this->wishlist = $wishlist;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
