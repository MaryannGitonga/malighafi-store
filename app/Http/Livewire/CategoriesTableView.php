<?php

namespace App\Http\Livewire;

use App\Models\Category;
use LaravelViews\Actions\RedirectAction;
use LaravelViews\Views\TableView;
use Illuminate\Support\Str;


class CategoriesTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = Category::class;

    public $searchBy = ['name'];

    protected $paginate = 10;

    public $title =  "Categories";


    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            'ID',
            'Category',
            'Products'
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
            Str::of($model->name)->ucfirst(),
            count($model->products()->get())
        ];
    }

    protected function actionsByRow()
    {
        return [
            new RedirectAction('categories.edit', 'View category', 'eye'),
        ];
    }
}
