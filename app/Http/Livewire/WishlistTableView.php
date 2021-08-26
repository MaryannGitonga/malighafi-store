<?php

namespace App\Http\Livewire;

use App\Actions\AddToCartAction;
use App\Models\WishlistItem;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use LaravelViews\Views\TableView;
use LaravelViews\Facades\UI;

class WishlistTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */

    protected $paginate = 5;

    public function repository(): Builder
    {
        return WishlistItem::query()->where('user_id', Auth::user()->id);
    }
    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            'Image',
            'Name',
            'Quantity',
            'Price'
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
            UI::avatar(asset($model->product->path)),
            $model->product->name,
            $model->quantity,
            ($model->product->price * $model->quantity)
        ];
    }

    protected function actionsByRow()
    {
        return [
            new AddToCartAction,
        ];
    }
}
