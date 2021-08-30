<?php

namespace App\Listeners;

use App\Enums\InboxMessageStatus;
use App\Events\PermitApproved;
use App\Mail\PermitApproved as MailPermitApproved;
use App\Models\InboxMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendPermitApprovedNotification
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
     * @param  PermitApproved  $event
     * @return void
     */
    public function handle(PermitApproved $event)
    {
        InboxMessage::create([
            'title' => "Successful Account Verification.",
            'message' => "Your Seller Account has been successfully verified! You can now upload your products for sale. Happy selling! :)",
            'user_id' => $event->user->id,
            'status' => InboxMessageStatus::Unread
        ]);

        Mail::to($event->user->email)->send(new MailPermitApproved($event->user));
    }
}
