<?php

namespace App\Listeners;

use App\Events\ProductStatusChanged;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendProductStatusChangedNotification
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
     * @param  ProductStatusChanged  $event
     * @return void
     */
    public function handle(ProductStatusChanged $event)
    {
        //
    }
}
