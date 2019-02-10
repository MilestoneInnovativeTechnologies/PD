<?php

namespace Milestone\PD\Listener;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Support\Facades\Mail;
use Milestone\PD\Event\WishlistProductAdded;
use Milestone\PD\Mail\InformWishlistProduct;

class SendMailForFirstProduct
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
     * @param  object  $event
     * @return void
     */
    public function handle(WishlistProductAdded $event)
    {
        $WL = $event->wishlist;
        if($WL->Items->count() !== 1 || is_null($WL->author)) return;
        Mail::to('firose@milestoneit.net')->queue(new InformWishlistProduct($WL));
    }
}
