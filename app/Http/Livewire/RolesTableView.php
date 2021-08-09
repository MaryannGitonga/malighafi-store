<?php

namespace App\Http\Livewire;

use App\Enums\UserType;
use App\Models\Role;
use LaravelViews\Views\TableView;
use Illuminate\Support\Str;
use LaravelViews\Actions\RedirectAction;

class RolesTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = Role::class;

    public $searchBy = ['role'];

    protected $paginate = 10;

    public $title =  "Roles";


    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            'ID',
            'Role',
            'Users'
        ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row($model): array
    {
        return [
            $model->id,
            ($model->role == UserType::Administrator) ? "Administrator": (($model->role == UserType::Buyer) ? "Buyer" : "Seller"),
            count($model->users()->get())
        ];
    }

    protected function actionsByRow()
    {
        return [
            new RedirectAction('roles.edit', 'View role', 'eye'),
        ];
    }
}
