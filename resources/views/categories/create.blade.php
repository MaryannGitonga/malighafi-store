@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="flex items-center justify-start mr-8">
        <a href="{{ route('categories.index') }}" class="relative w-50 flex justify-center mt-8 py-2 px-4 border border-transparent text-sm font-small rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            ← Back
        </a>
    </div>
    <div class="px-4 py-6 sm:px-0">
<h4
    class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >
              New Product
            </h4>
            <form action="{{ route('categories.store') }}" method="POST"
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
            @csrf
            @method('POST')
              <label class="block text-md">
                <span class="text-gray-700 dark:text-gray-400">Name</span>
                <input
                  class="block w-full mt-1 text-md dark:border-gray-600 dark:bg-gray-700 focus:border-indigo-400 focus:outline-none focus:shadow-outline-indigo dark:focus:shadow-outline-gray form-input"
                  name="name" placeholder="Category" value="" type="text"
                />
              </label>
                @error('name')
                    <div class=" mt-8 space-y-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
              <div class="flex items-center justify-start mt-8">
                <button type="submit" class="group relative w-60 flex justify-center py-2 px-4 border border-transparent text-md font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Create Category
                </button>
            </div>
            </form>
    </div>
</div>
@endsection
