<?php

namespace App\Actions;

use LaravelViews\Actions\Action;
use LaravelViews\Views\View;

class RestoreUserAction extends Action
{
    /**
     * Any title you want to be displayed
     * @var String
     * */
    public $title = "Restore User";

    /**
     * This should be a valid Feather icon string
     * @var String
     */
    public $icon = "refresh-ccw";

    /**
     * Execute the action when the user clicked on the button
     *
     * @param $model Model object of the list where the user has clicked
     * @param $view Current view where the action was executed from
     */
    public function handle($model, View $view)
    {
        $model->restore();
        $this->success('User restored successfully.');
    }
}
