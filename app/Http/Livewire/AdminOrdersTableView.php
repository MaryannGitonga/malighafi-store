<?php

namespace App\Http\Livewire;

use App\Models\Order;
use LaravelViews\Views\TableView;

class AdminOrdersTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = Order::class;

    public $searchBy = ['ID', 'status'];

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
            'ID',
            'Items',
            'Customer',
            'Seller',
            'Total Amount',
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
            $model->id
        ];
    }
}
