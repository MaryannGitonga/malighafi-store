@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
            <h4
                class="flex items-center justify-start mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300 inline-block"
                    >
              User - Edit
            </h4>
            @if ($user->roles()->where('id', App\Enums\UserType::Seller)->exists())
                <div class="flex items-center justify-end mr-8 inline-block">
                    <a href="{{ route('admin.download-permit', $user->id) }}" class="relative w-50 flex justify-center mt-8 py-2 px-4 border border-transparent text-md font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        View Permit
                    </a>
                    <a href="{{ route('admin.verify-seller', $user->id) }}" class="ml-4 relative w-50 flex justify-center mt-8 py-2 px-4 border border-transparent text-md font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Verify Seller Account
                    </a>
                </div>
            @endif
            <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data"
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
                @csrf
                @method('PUT')
              <label class="block text-md">
                <span class="text-gray-700 dark:text-gray-400">Name</span>
                <input
                  class="block w-full mt-1 text-md dark:border-gray-600 dark:bg-gray-700 focus:border-indigo-400 focus:outline-none focus:shadow-outline-indigo dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  name="name" placeholder="Name" value="{{ $user->name }}"
                />
              </label>
              <label class="block text-md">
                <span class="text-gray-700 dark:text-gray-400">Email</span>
                <input type="email"
                  class="block w-full mt-1 text-md dark:border-gray-600 dark:bg-gray-700 focus:border-indigo-400 focus:outline-none focus:shadow-outline-indigo dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  name="email" disabled placeholder="Email" value="{{ $user->email }}"
                />
              </label>
              <label class="block text-md">
                <span class="text-gray-700 dark:text-gray-400">Profile Picture</span>
                <input
                  class="block w-full mt-1 text-md dark:border-gray-600 dark:bg-gray-700 focus:border-indigo-400 focus:outline-none focus:shadow-outline-indigo dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  name="profile_photo_path" type="file" placeholder="Profile Picture" value="{{ $user->profile_photo_path }}"
                />
              </label>
              <div class="mt-4 text-md">
                <span class="text-gray-700 dark:text-gray-400">
                  Accounts
                </span>
                @foreach ($roles as $role)
                    <div class="mt-2">
                        <label
                        class="inline-flex items-center text-gray-600 dark:text-gray-400"
                        >
                        <input disabled
                            type="checkbox"
                            class="text-indigo-600 form-checkbox focus:border-indigo-400 focus:outline-none focus:shadow-outline-indigo dark:focus:shadow-outline-gray"
                            value="{{ $role->id }}" {{ ($user->roles()->where('id', $role->id)->exists()) ? "checked" : "" }}
                        />
                        <span class="ml-2">{{ ($role->role == App\Enums\UserType::Administrator) ? "Administrator": (($role->role == App\Enums\UserType::Buyer) ? "Buyer" : "Seller") }}</span>
                        </label>
                    </div>
                @endforeach
              </div>
              <label class="block text-md">
                <span class="text-gray-700 dark:text-gray-400">Phone Number</span>
                <input
                  class="block w-full mt-1 text-md dark:border-gray-600 dark:bg-gray-700 focus:border-indigo-400 focus:outline-none focus:shadow-outline-indigo dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Phone Number" value="{{ $user->mpesa_no }}"
                />
              </label>
              <label class="block text-md">
                <span class="text-gray-700 dark:text-gray-400">Postal Address</span>
                <input
                  class="block w-full mt-1 text-md dark:border-gray-600 dark:bg-gray-700 focus:border-indigo-400 focus:outline-none focus:shadow-outline-indigo dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Postal Address" value="{{ $user->postal_address }}"
                />
              </label>
              <label class="block text-md">
                <span class="text-gray-700 dark:text-gray-400">Zip Code</span>
                <input
                  class="block w-full mt-1 text-md dark:border-gray-600 dark:bg-gray-700 focus:border-indigo-400 focus:outline-none focus:shadow-outline-indigo dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Zip Code" value="{{ $user->zip_code }}"
                />
              </label>
              <label class="block text-md">
                <span class="text-gray-700 dark:text-gray-400">Physical Address</span>
                <input
                  class="block w-full mt-1 text-md dark:border-gray-600 dark:bg-gray-700 focus:border-indigo-400 focus:outline-none focus:shadow-outline-indigo dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Physical Address" value="{{ $user->physical_address }}"
                />
              </label>
              <label class="block text-md">
                <span class="text-gray-700 dark:text-gray-400">County</span>
                <input
                  class="block w-full mt-1 text-md dark:border-gray-600 dark:bg-gray-700 focus:border-indigo-400 focus:outline-none focus:shadow-outline-indigo dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="County" value="{{ $user->county }}"
                />
              </label>
              <div class="flex items-center justify-start mt-8">
                <button type="submit" class="group relative w-60 flex justify-center py-2 px-4 border border-transparent text-md font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Edit User
                </button>
            </div>
            </form>
    </div>
</div>
@endsection
