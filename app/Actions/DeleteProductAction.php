<?php

namespace App\Actions;

use LaravelViews\Actions\Action;
use LaravelViews\Views\View;

class DeleteProductAction extends Action
{
    /**
     * Any title you want to be displayed
     * @var String
     * */
    public $title = "Delete Product";

    /**
     * This should be a valid Feather icon string
     * @var String
     */
    public $icon = "trash-2";

    public function getConfirmationMessage($item = null)
    {
        return 'Are you sure you want to delete this product?';
    }

    /**
     * Execute the action when the user clicked on the button
     *
     * @param $model Model object of the list where the user has clicked
     * @param $view Current view where the action was executed from
     */
    public function handle($model, View $view)
    {
        $model->delete();
        $this->icon = "refresh-ccw";
        $this->title = "Restore Product";
        $this->success('Product deleted successfully.');
    }
}
