@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="flex items-center justify-start mr-8">
        <a href="{{ route('products.index') }}" class="relative w-50 flex justify-center mt-8 py-2 px-4 border border-transparent text-sm font-small rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            ← Back
        </a>
    </div>
    @if ($message = Session::get('success'))
    <div class="mt-8 space-y-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="px-4 py-6 sm:px-0">
    <h4
        class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >
              Product - Edit
            </h4>
            <form action="{{ route('products.update', $product->id) }}" method="POST"
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
                @csrf
                @method('PUT')
              <label class="block text-md">
                <span class="text-gray-700 dark:text-gray-400">Name</span>
                <input
                  class="block w-full mt-1 text-md dark:border-gray-600 dark:bg-gray-700 focus:border-indigo-400 focus:outline-none focus:shadow-outline-indigo dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  name="name" placeholder="Product Name" value="{{ $product->name }}"
                />
              </label>
              <label class="block text-md">
                <span class="text-gray-700 dark:text-gray-400">Price</span>
                <input
                  class="block w-full mt-1 text-md dark:border-gray-600 dark:bg-gray-700 focus:border-indigo-400 focus:outline-none focus:shadow-outline-indigo dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  name="price" placeholder="Product Name" value="{{ $product->price }}"
                />
              </label>
              <label class="block mt-4 text-md">
                <span class="text-gray-700 dark:text-gray-400">
                  Category
                </span>
                <select name="category_id"
                  class=" capitalize block w-full mt-1 text-md dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-indigo-400 focus:outline-none focus:shadow-outline-indigo dark:focus:shadow-outline-gray"
                >
                @foreach ($categories as $category)
                <option value="{{ $category->id}}" {{($product->category->id == $category->id) ? "selected": ""}}>{{ $category->name }}</option>
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
                            value="{{ $unit->id }}" {{ ($product->unit->id == $unit->id) ? "checked": "" }}
                        />
                        <span class="ml-2">{{ $unit->name }}</span>
                        </label>
                    </div>
                @endforeach
              </div>
              <label class="block mt-4 text-md">
                <span class="text-gray-700 dark:text-gray-400">Description</span>
                <textarea name="description"
                  class="block w-full mt-1 text-md dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-indigo-400 focus:outline-none focus:shadow-outline-indigo dark:focus:shadow-outline-gray"
                  rows="3"
                  placeholder="Product Description"
                >{{ $product->description }}</textarea>
              </label>
              <label class="block text-md">
                <span class="text-gray-700 dark:text-gray-400">Seller</span>
                <input disabled
                  class="block w-full mt-1 text-md dark:border-gray-600 dark:bg-gray-700 focus:border-indigo-400 focus:outline-none focus:shadow-outline-indigo dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Product Name" value="{{ $product->seller->name }}"
                />
              </label>
              <div class="flex items-center justify-start mt-8">
                <button type="submit" class="group relative w-60 flex justify-center py-2 px-4 border border-transparent text-md font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Edit Product
                </button>
            </div>
            </form>
    </div>
</div>
@endsection
