<?php

namespace App\Providers;

use App\Providers\WishlistCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailToAFriend
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  WishlistCreated  $event
     * @return void
     */
    public function handle(WishlistCreated $event)
    {
        \Log::info("sending wishlist to {$event->wishlist->email}");
    }
}
