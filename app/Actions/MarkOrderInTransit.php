<?php

namespace App\Actions;

use App\Enums\InboxMessageStatus;
use App\Enums\OrderStatus;
use App\Mail\OrderInTransit;
use App\Models\InboxMessage;
use Illuminate\Support\Facades\Mail;
use LaravelViews\Actions\Action;
use LaravelViews\Views\View;

class MarkOrderInTransit extends Action
{
    /**
     * Any title you want to be displayed
     * @var String
     * */
    public $title = "Mark Order In Transit";

    /**
     * This should be a valid Feather icon string
     * @var String
     */
    public $icon = "truck";

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
            'status' => OrderStatus::in_transit,
        ]);

        Mail::to($model->user->email)->send(new OrderInTransit($model));

        InboxMessage::create([
            'title' => "Your Order is In Transit.",
            'message' => "Your order is in transit. Expect it to be delivered anytime soon.",
            'user_id' => $model->user->id,
            'status' => InboxMessageStatus::Unread
        ]);

        $this->success('Order status changed successfully.');

    }
}
