<?php

namespace App\Actions;

use LaravelViews\Actions\Action;
use LaravelViews\Views\View;

class DisableUserAction extends Action
{
    /**
     * Any title you want to be displayed
     * @var String
     * */
    public $title = "Disable user";

    /**
     * This should be a valid Feather icon string
     * @var String
     */
    public $icon = "trash-2";

    public function getConfirmationMessage($item = null)
    {
        return 'Are you sure you want to disable this user?';
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
        $this->title = "Restore User";
        $this->success('User disabled successfully.');
    }
}
