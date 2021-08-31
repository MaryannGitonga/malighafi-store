<?php

namespace App\Mail;

use App\Models\Order;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class PaymentSuccessful extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public User $user, public Order $order)
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
        $subject = "Successful Payment for Order No.". $this->order->id;

        $products = DB::table('order_product')->where('order_id', $this->order->id)->get();

        return $this->view('emails.order-status')
                    ->subject($subject)
                    ->with([
                        'products' => $products,
                        'orderId' => $this->order->id,
                        'buyerName' => $this->user->name,
                    ]);
    }
}
