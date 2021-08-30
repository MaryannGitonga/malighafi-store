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
              Role - Edit
            </h4>
            <form action="{{ route('roles.update', $role->id) }}" method="POST"
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
                @csrf
                @method('PUT')
              <label class="block text-md">
                <span class="text-gray-700 dark:text-gray-400">Role</span>
                <input
                  class="block w-full mt-1 text-md dark:border-gray-600 dark:bg-gray-700 focus:border-indigo-400 focus:outline-none focus:shadow-outline-indigo dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  name="role" disabled placeholder="Role" value= {{ ($role->role == App\Enums\UserType::Administrator) ? "Administrator": (($role->role == App\Enums\UserType::Buyer) ? "Buyer" : "Seller") }}
                />
              </label>
            </form>
    </div>
</div>
@endsection
