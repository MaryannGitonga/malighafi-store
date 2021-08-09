<?php

namespace App\Actions;

use App\Enums\ProductStatus;
use LaravelViews\Actions\Action;
use LaravelViews\Views\View;
use LaravelViews\Actions\Confirmable;

class DeclineProductAction extends Action
{
    use Confirmable;
    /**
     * Any title you want to be displayed
     * @var String
     * */
    public $title = "Decline Product";

    /**
     * This should be a valid Feather icon string
     * @var String
     */
    public $icon = "x-square";

    public function getConfirmationMessage($item = null)
    {
        return 'Are you sure you want to decline this product?';
    }

    /**
     * Execute the action when the user clicked on the button
     *
     * @param $model Model object of the list where the user has clicked
     * @param $view Current view where the action was executed from
     */
    public function handle($model, View $view)
    {
        $model->status = ProductStatus::Declined;
        $model->save();
        $this->success('Product declined successfully.');
    }
}
