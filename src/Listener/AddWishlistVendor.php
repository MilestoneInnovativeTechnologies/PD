<?php

namespace Milestone\PD\Listener;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Milestone\PD\Event\WishlistCreated;
use Milestone\PD\Model\VendorWishlist;

class AddWishlistVendor
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
     * @param  WishlistCreated  $event
     * @return void
     */
    public function handle(WishlistCreated $event)
    {
        $event->wishlist->Vendor()->save((new VendorWishlist)->forceFill(['viewed' => $event->viewed]));
    }
}
