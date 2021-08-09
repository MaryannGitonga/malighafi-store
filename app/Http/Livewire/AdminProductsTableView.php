<?php

namespace App\Http\Livewire;

use App\Actions\ApproveProductAction;
use App\Actions\DeclineProductAction;
use App\Actions\DeleteProductAction;
use App\Enums\ProductStatus;
use App\Models\Product;
use LaravelViews\Views\TableView;
use Illuminate\Support\Str;
use LaravelViews\Actions\RedirectAction;
use LaravelViews\Facades\UI;

class AdminProductsTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = Product::class;

    public $searchBy = ['name', 'id', 'category.name', 'status', 'seller.name'];

    protected $paginate = 10;

    public $title =  "Products";

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            'ID',
            'Name',
            'Description',
            'Unit',
            'Price',
            'Status'
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
            $model->name,
            Str::limit($model->description, 100, '...'),
            $model->unit->name,
            number_format($model->price),
            ($model->status == ProductStatus::Pending)? UI::badge(Str::of($model->status)->ucfirst(), 'warning'): ($model->status == ProductStatus::Declined ? UI::badge(Str::of($model->status)->ucfirst(), 'danger') : UI::badge(Str::of($model->status)->ucfirst(), 'success'))
        ];
    }

    protected function actionsByRow()
    {
        return [
            new ApproveProductAction,
            new DeclineProductAction,
            new RedirectAction('products.edit', 'View Product', 'eye'),
            new DeleteProductAction
        ];
    }


}
