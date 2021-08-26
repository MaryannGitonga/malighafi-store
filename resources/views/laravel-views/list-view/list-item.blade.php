@props(['title', 'subtitle', 'actions', 'model'])

<div>
  <div class="flex items-center space-x-4 pt-4">
    <div class="flex-1">
      <div class="text-xl font-medium text-indigo-500">
        {{ $title }}
      </div>
      <div class="text-base font-normal">
        {{ $subtitle }}
      </div>
    </div>
    <x-lv-actions :actions="$actions" :model="$model" />
  </div>
</div>
