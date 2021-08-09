<?php

namespace App\Actions;

use App\Enums\ProductStatus;
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
        $this->success('Product approved successfully.');
    }
}
