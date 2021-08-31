<?php

namespace App\Actions;

use App\Enums\InboxMessageStatus;
use App\Enums\OrderStatus;
use App\Mail\OrderDelivered;
use App\Models\InboxMessage;
use Illuminate\Support\Facades\Mail;
use LaravelViews\Actions\Action;
use LaravelViews\Views\View;

class MarkOrderDelivered extends Action
{
    /**
     * Any title you want to be displayed
     * @var String
     * */
    public $title = "Mark Order Delivered";

    /**
     * This should be a valid Feather icon string
     * @var String
     */
    public $icon = "user-check";

    /**
     * Execute the action when the user clicked on the button
     *
     * @param $model Model object of the list where the user has clicked
     * @param $view Current view where the action was executed from
     */
    public function handle($model, View $view)
    {
        $product = $model->products()->first();
        $model->products()->updateExistingPivot($product->id, [
            'status' => OrderStatus::delivered,
        ]);

        Mail::to($model->user->email)->send(new OrderDelivered($model));

        InboxMessage::create([
            'title' => "Your Order has been Delivered.",
            'message' => "Your order has been delivered. Tell us what you think of the goods and the service by submitting a review.",
            'user_id' => $model->user->id,
            'status' => InboxMessageStatus::Unread
        ]);

        $this->success('Order status changed successfully.');
    }
}
