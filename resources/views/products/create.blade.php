@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="flex items-center justify-start mr-8">
        <a href="{{ route('products.index') }}" class="relative w-50 flex justify-center mt-8 py-2 px-4 border border-transparent text-sm font-small rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            ← Back
        </a>
    </div>
    <div class="px-4 py-6 sm:px-0">
<h4
    class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >
              New Product
            </h4>
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data"
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
            @csrf
            @method('POST')
              <label class="block text-md">
                <span class="text-gray-700 dark:text-gray-400">Name</span>
                <input
                  class="block w-full mt-1 text-md dark:border-gray-600 dark:bg-gray-700 focus:border-indigo-400 focus:outline-none focus:shadow-outline-indigo dark:focus:shadow-outline-gray form-input"
                  name="name" placeholder="Product Name" value="" type="text"
                />
              </label>
              <label class="block text-md">
                <span class="text-gray-700 dark:text-gray-400">Price</span>
                <input
                  class="block w-full mt-1 text-md dark:border-gray-600 dark:bg-gray-700 focus:border-indigo-400 focus:outline-none focus:shadow-outline-indigo dark:focus:shadow-outline-gray form-input"
                  name="price" placeholder="Product Price" value="" type="number"
                />
              </label>
              <label class="block mt-4 text-md">
                <span class="text-gray-700 dark:text-gray-400">
                  Category
                </span>
                <select
                  name="category_id" class=" capitalize block w-full mt-1 text-md dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-indigo-400 focus:outline-none focus:shadow-outline-indigo dark:focus:shadow-outline-gray"
                >
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
                </select>
              </label>
              <div class="mt-4 text-md">
                <span class="text-gray-700 dark:text-gray-400">
                  Unit of Measurement
                </span>
                @foreach ($units as $unit)
                    <div class="mt-2">
                        <label
                        class="inline-flex items-center text-gray-600 dark:text-gray-400"
                        >
                        <input
                            type="radio"
                            class="text-indigo-600 form-radio focus:border-indigo-400 focus:outline-none focus:shadow-outline-indigo dark:focus:shadow-outline-gray"
                            name="unit_id"
                            value="{{ $unit->id }}"
                        />
                        <span class="ml-2">{{ $unit->name }}</span>
                        </label>
                    </div>
                @endforeach
              </div>
              <label class="block mt-4 text-md">
                <span class="text-gray-700 dark:text-gray-400">Description</span>
                <textarea
                  class="block w-full mt-1 text-md dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-indigo-400 focus:outline-none focus:shadow-outline-indigo dark:focus:shadow-outline-gray"
                  rows="3" name="description"
                  placeholder="Product Description"
                ></textarea>
              </label>
              <label class="block text-md">
                <span class="text-gray-700 dark:text-gray-400">Image</span>
                <input
                  class="block w-full mt-1 text-md dark:border-gray-600 dark:bg-gray-700 focus:border-indigo-400 focus:outline-none focus:shadow-outline-indigo dark:focus:shadow-outline-gray form-input"
                  placeholder="Product Image" type="file" name="path"
                />
              </label>
              @if (Auth::user()->roles()->where('role_id', App\Enums\UserType::Administrator)->first() != null)
                  @if (Auth::user()->roles()->where('role_id', App\Enums\UserType::Administrator)->first()->pivot->status == App\Enums\AccountStatus::Active)
                    <label class="block mt-4 text-md">
                    <span class="text-gray-700 dark:text-gray-400">
                    Assign Seller
                    </span>
                    <select name="seller_id"
                    class=" capitalize block w-full mt-1 text-md dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-indigo-400 focus:outline-none focus:shadow-outline-indigo dark:focus:shadow-outline-gray"
                    >
                    @foreach ($sellers as $seller)
                    <option value="{{ $seller['id']}}">{{ $seller['name'] }}</option>
                    @endforeach
                    </select>
                </label>
              @endif
              @endif
              <div class="flex items-center justify-start mt-8">
                <button type="submit" class="group relative w-60 flex justify-center py-2 px-4 border border-transparent text-md font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Add Product
                </button>
            </div>
            </form>
    </div>
</div>
@endsection
