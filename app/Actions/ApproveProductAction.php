<?php

namespace App\Actions;

use App\Enums\InboxMessageStatus;
use App\Enums\ProductStatus;
use App\Mail\ProductApproved;
use App\Models\InboxMessage;
use Illuminate\Support\Facades\Mail;
use LaravelViews\Actions\Action;
use LaravelViews\Views\View;

class ApproveProductAction extends Action
{
    /**
     * Any title you want to be displayed
     * @var String
     * */
    public $title = "Approve Product";

    /**
     * This should be a valid Feather icon string
     * @var String
     */
    public $icon = "check-square";

    /**
     * Execute the action when the user clicked on the button
     *
     * @param $model Model object of the list where the user has clicked
     * @param $view Current view where the action was executed from
     */
    public function handle($model, View $view)
    {
        $model->status = ProductStatus::Approved;
        $model->save();

        InboxMessage::create([
            'title' => "New Seller Credentials Submitted.",
            'message' => "Your product, ". $model->name." has been approved. It is now visible to the market.",
            'user_id' => $model->seller->id,
            'status' => InboxMessageStatus::Unread
        ]);

        Mail::to($model->seller->email)->send(new ProductApproved($model->seller, $model));

        $this->success('Product approved successfully.');
    }
}
