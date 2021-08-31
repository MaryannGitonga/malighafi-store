@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
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
    <div class="pb-16 sm:pb-20 md:pb-24"
         x-data="{ activeTab: 'reviews' }">
        <div class="tabs flex flex-col sm:flex-row"
             role="tablist">
             <span @click="activeTab = 'reviews'"
                  class="tab-item bg-white hover:bg-grey-light px-10 py-5 text-center sm:text-left border-t-2 border-transparent font-hk font-bold  text-secondary cursor-pointer transition-colors"
                  :class="{ 'active': activeTab=== 'reviews' }">
                Reviews
            </span>
        </div>
        <div class="tab-content relative">
            <div :class="{ 'active': activeTab=== 'reviews' }"
                 class="tab-pane bg-grey-light py-10 md:py-16 transition-opacity"
                 role="tabpanel">
                @if (count($reviews) != 0)
                @foreach ($reviews as $review)
                <div class="w-5/6 mx-auto border-b border-grey-darker pb-8 text-center sm:text-left">
                    <div class="flex justify-center sm:justify-start items-center pt-3 xl:pt-5">
                        @if ($review->rating == 5)
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                        @elseif ($review->rating == 4)
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                        @elseif ($review->rating == 3)
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                        @elseif ($review->rating == 2)
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                        @elseif ($review->rating == 1)
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                        @else
                            <i class="bx bxs-star text-gray-400"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                        @endif
                    </div>
                    <p class="font-hkbold text-secondary text-lg pt-3">{{$review->title}}</p>
                    <p class="font-hk text-secondary pt-4 lg:w-5/6 xl:w-2/3">{{$review->description}} </p>
                    <div class="flex justify-center sm:justify-start items-center pt-3">
                        <p class="font-hk text-grey-darkest text-sm"><span>By</span> {{$review->user->name}}</p>
                        <span class="font-hk text-grey-darkest text-sm block px-4">.</span>
                        <p class="font-hk text-grey-darkest text-sm">{{$review->reviewed_at}}</p>
                    </div>
                </div>
                @endforeach
                @else
                <p class="w-5/6 mx-auto">This item has not been reviewed yet.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
