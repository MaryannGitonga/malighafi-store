<?php

namespace App\Http\Livewire;

use App\Actions\MarkAsReadAction;
use App\Models\InboxMessage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use LaravelViews\Views\ListView;

class InboxMessagesListView extends ListView
{
    public function repository(): Builder
    {
        return InboxMessage::query()->where('user_id', Auth::user()->id);
    }

    protected $paginate = 5;
    /**
     * Sets the properties to every list item component
     *
     * @param $model Current model for each card
     */
    public function data($model)
    {
        return [
            'title' => $model->title,
            'subtitle' => $model->message,
        ];
    }
}
