<?php

namespace App\Http\Livewire;

use App\Actions\DisableUserAction;
use App\Actions\RestoreUserAction;
use App\Enums\AccountStatus;
use App\Enums\UserType;
use App\Filters\UserTypeFilter;
use LaravelViews\Views\TableView;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Actions\RedirectAction;
use LaravelViews\Facades\UI;

class UsersTableView extends TableView
{

    public $searchBy = ['name', 'email'];

    protected $paginate = 10;

    public $title =  "Users";


    /**
     * Sets a initial query with the data to fill the table
     *
     * @return Builder Eloquent query
     */
    public function repository(): Builder
    {
        return User::query()->withTrashed();
    }

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            'ID',
            'Image',
            'Name',
            'Email',
            'Active Role',
            'Created',
            'Disabled'
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
            ($model->profile_photo_path == null) ? UI::avatar(asset('assets/img/icons/icon-user.svg')): UI::avatar(asset($model->profile_photo_path)),
            $model->name,
            $model->email,
            ($model->roles()->where('role_id', UserType::Administrator)->where('status', AccountStatus::Active)->exists()) ? "Administrator" : (($model->roles()->where('role_id', UserType::Seller)->where('status', AccountStatus::Active)->exists()) ? "Seller" : "Buyer"),
            $model->created_at->diffforHumans(),
            ($model->deleted_at != null) ? UI::icon('check'): ""
        ];
    }

    protected function actionsByRow()
    {
        return [
            new DisableUserAction,
            new RestoreUserAction,
            new RedirectAction('users.edit', 'View user', 'eye'),
        ];
    }

}
