<?php

namespace App\Providers;

use App\Events\OrderPaid;
use App\Events\PermitApproved;
use App\Events\PermitUploaded;
use App\Events\ProductStatusChanged;
use App\Listeners\SendOrderSuccessfulNotification;
use App\Listeners\SendPermitApprovedNotification;
use App\Listeners\SendPermitReviewNotification;
use App\Listeners\SendProductStatusChangedNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        PermitUploaded::class => [
            SendPermitReviewNotification::class, // Inbox only
        ],
        PermitApproved::class => [
            SendPermitApprovedNotification::class, // Email and Inbox message
        ],
        ProductStatusChanged::class => [
            SendProductStatusChangedNotification::class, // Email and Inbox message
        ],
        OrderPaid::class => [
            SendOrderSuccessfulNotification::class, // Email and Inbox message
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
