<?php

namespace App\Http\Livewire;

use App\Actions\MarkOrderDelivered;
use App\Actions\MarkOrderInTransit;
use App\Enums\OrderStatus;
use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use LaravelViews\Facades\UI;
use LaravelViews\Views\TableView;

class SellerOrdersTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    public function repository(): Builder
    {
        return Order::query();
    }

    public $searchBy = ['id'];

    protected $paginate = 10;

    public $title =  "Orders";

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            'Order ID',
            'Customer',
            'Seller',
            'Additional Info',
            'Amount',
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
            $model->user->name,
            $model->products()->first()->seller->name,
            ($model->description == null) ? "None": $model->description,
            "Ksh " .($model->products()->first()->pivot->quantity * $model->products()->first()->pivot->price),
            ($model->products()->first()->pivot->status == OrderStatus::awaiting_shipment)? UI::badge($model->products()->first()->pivot->status, 'warning'): ($model->products()->first()->pivot->status == OrderStatus::in_transit ? UI::badge($model->products()->first()->pivot->status, 'warning') : UI::badge($model->products()->first()->pivot->status, 'success'))

        ];
    }

    protected function actionsByRow()
    {
        return [
            new MarkOrderInTransit,
            new MarkOrderDelivered
        ];
    }
}
