@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="flex items-center justify-start mr-8">
        <a href="{{ route('roles.index') }}" class="relative w-50 flex justify-center mt-8 py-2 px-4 border border-transparent text-sm font-small rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            ← Back
        </a>
    </div>
    <div class="px-4 py-6 sm:px-0">
<h4
    class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >
              New Role
            </h4>
            <form action="{{ route('roles.store') }}" method="POST"
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
            @csrf
            @method('POST')
              <label class="block text-md">
                <span class="text-gray-700 dark:text-gray-400">Role</span>
                <input
                  class="block w-full mt-1 text-md dark:border-gray-600 dark:bg-gray-700 focus:border-indigo-400 focus:outline-none focus:shadow-outline-indigo dark:focus:shadow-outline-gray form-input"
                  name="role" placeholder="Role" value="" type="text"
                />
              </label>
              <div class="flex items-center justify-start mt-8">
                <button type="submit" class="group relative w-60 flex justify-center py-2 px-4 border border-transparent text-md font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Create Role
                </button>
            </div>
            </form>
    </div>
</div>
@endsection
