@props(['actions', 'model' => null])

@foreach ($actions as $action)
  @if ($action->renderIf($model, $this))
    <button
      wire:click.prevent="{{ $model ? "executeAction('{$action->id}','{$model->getKey()}')" : "executeBulkAction('{$action->id}')" }}"
      title="{{ $action->title}}"
      class="group flex items-center px-4 py-2 text-indigo-700 hover:bg-indigo-100 hover:text-indigo-900 w-full focus:outline-none"
    >
      <i data-feather="{{ $action->icon }}" class="mr-3 h-4 w-4 text-indigo-600 group-hover:text-indigo-700"></i>
      {{ $action->title }}
    </button>
  @endif
@endforeach
