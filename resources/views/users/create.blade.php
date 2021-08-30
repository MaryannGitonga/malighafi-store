@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
    <h4
        class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >
              New User
            </h4>
            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data"
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
                @csrf
                @method('POST')
              <label class="block text-md">
                <span class="text-gray-700 dark:text-gray-400">Name</span>
                <input
                  class="block w-full mt-1 text-md dark:border-gray-600 dark:bg-gray-700 focus:border-indigo-400 focus:outline-none focus:shadow-outline-indigo dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  name="name" placeholder="Name"
                />
              </label>
              <label class="block text-md">
                <span class="text-gray-700 dark:text-gray-400">Email</span>
                <input
                  class="block w-full mt-1 text-md dark:border-gray-600 dark:bg-gray-700 focus:border-indigo-400 focus:outline-none focus:shadow-outline-indigo dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  name="email" placeholder="Email"
                />
              </label>
              <label class="block text-md">
                <span class="text-gray-700 dark:text-gray-400">Profile Picture</span>
                <input
                  class="block w-full mt-1 text-md dark:border-gray-600 dark:bg-gray-700 focus:border-indigo-400 focus:outline-none focus:shadow-outline-indigo dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  name="profile_photo_path" type="file" placeholder="Profile Picture"
                />
              </label>
              <div class="mt-4 text-md">
                <span class="text-gray-700 dark:text-gray-400">
                  Assign Role
                </span>
                @foreach ($roles as $role)
                    <div class="mt-2">
                        <label
                        class="inline-flex items-center text-gray-600 dark:text-gray-400"
                        >
                        <input
                            type="checkbox"
                            class="text-indigo-600 form-checkbox focus:border-indigo-400 focus:outline-none focus:shadow-outline-indigo dark:focus:shadow-outline-gray"
                            value="{{ $role->id }}"
                        />
                        <span class="ml-2">{{ ($role->role == App\Enums\UserType::Administrator) ? "Administrator": (($role->role == App\Enums\UserType::Buyer) ? "Buyer" : "Seller") }}</span>
                        </label>
                    </div>
                @endforeach
              </div>
              <label class="block text-md">
                <span class="text-gray-700 dark:text-gray-400">Phone Number</span>
                <input type="number"
                  class="block w-full mt-1 text-md dark:border-gray-600 dark:bg-gray-700 focus:border-indigo-400 focus:outline-none focus:shadow-outline-indigo dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Phone Number" name="mpesa_no"
                />
              </label>
              <label class="block text-md">
                <span class="text-gray-700 dark:text-gray-400">KRA Pin</span>
                <input type="number"
                  class="block w-full mt-1 text-md dark:border-gray-600 dark:bg-gray-700 focus:border-indigo-400 focus:outline-none focus:shadow-outline-indigo dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="KRA Pin" name="kra_pin"
                />
              </label>
              <label class="block text-md">
                <span class="text-gray-700 dark:text-gray-400">Permit Number</span>
                <input type="number"
                  class="block w-full mt-1 text-md dark:border-gray-600 dark:bg-gray-700 focus:border-indigo-400 focus:outline-none focus:shadow-outline-indigo dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Permit Number" name="permit_no"
                />
              </label>
              <label class="block text-md">
                <span class="text-gray-700 dark:text-gray-400">Permit Upload</span>
                <input
                  class="block w-full mt-1 text-md dark:border-gray-600 dark:bg-gray-700 focus:border-indigo-400 focus:outline-none focus:shadow-outline-indigo dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  name="permit_upload_path" type="file" placeholder="Permit"
                />
              </label>
              <div class="flex items-center justify-start mt-8">
                <button type="submit" class="group relative w-60 flex justify-center py-2 px-4 border border-transparent text-md font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Create User
                </button>
            </div>
            </form>
    </div>
</div>
@endsection
