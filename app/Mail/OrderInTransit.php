<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderInTransit extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public Order $order)
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "Your Order No. " . $this->order->id . " is in transit.";

        return $this->view('emails.order-in-transit')
                    ->subject($subject)
                    ->with([
                        'orderNo' => $this->order->id,
                        'buyerName' => $this->order->user->name,
                    ]);
    }
}
