<?php

namespace App\Listeners;

use App\Enums\InboxMessageStatus;
use App\Enums\UserType;
use App\Events\PermitUploaded;
use App\Models\InboxMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SendPermitReviewNotification
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
     * @param  PermitUploaded  $event
     * @return void
     */
    public function handle(PermitUploaded $event)
    {
        $admins = DB::table('role_user')->where('role_id', UserType::Administrator)->get();

        foreach ($admins as $admin) {
            InboxMessage::create([
                'title' => "New Seller Credentials Submitted.",
                'message' => $event->seller->name . " has uploaded their credentials. Please review their permit.",
                'user_id' => $admin->user_id,
                'status' => InboxMessageStatus::Unread
            ]);
        }
    }
}
