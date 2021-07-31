@extends('layouts.app')

@section('content')
<div class="mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
<div class="lg:w-full mt-12 lg:mt-0" x-data="{ 'isDialogOpen': false }" @keydown.escape="isDialogOpen = false">

    <div x-show="isDialogOpen"
:class="{ 'absolute inset-0 z-10 flex items-start justify-center': isDialogOpen }">
<div class="relative z-10 inset-0 overflow-y-auto mt-60" x-show="isDialogOpen"
@click.away="isDialogOpen = false">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

      <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

      <!-- This element is to trick the browser into centering the modal contents. -->
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-indigo-100 sm:mx-0 sm:h-10 sm:w-10">
              <!-- Heroicon name: outline/exclamation -->
              <svg class="h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
              </svg>
            </div>
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
              <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                Confirm Delete
              </h3>
              <div class="mt-2">
                <p class="text-md text-gray-500">
                  Are you sure you want to delete this product?
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <a href="" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
            Delete
          </a>
          <button type="button" @click="isDialogOpen = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
            Cancel
          </button>
        </div>
      </div>
    </div>
  </div>
</div>



    <div class="bg-grey-light py-8 px-5 md:px-8">
        <h1 class="font-hkbold text-secondary text-2xl pb-6 text-center sm:text-left">My Products</h1>
        <div class="hidden sm:block">
            <div class="flex justify-between pb-3">
                <div class="w-1/7 md:w-1/7 pl-4">
                    <span class="font-hkbold text-secondary text-sm uppercase">ID</span>
                </div>
                <div class="w-1/7 md:w-1/7">
                    <span class="font-hkbold text-secondary text-sm uppercase">Name</span>
                </div>
                <div class="w-1/7 md:w-1/7">
                    <span class="font-hkbold text-secondary text-sm uppercase">Description</span>
                </div>
                <div class="w-1/7 md:w-1/7">
                    <span class="font-hkbold text-secondary text-sm uppercase">Unit</span>
                </div>
                <div class="w-1/7 md:w-1/7">
                    <span class="font-hkbold text-secondary text-sm uppercase">Price</span>
                </div>
                <div class="w-1/7 md:w-1/7">
                    <span class="font-hkbold text-secondary text-sm uppercase">Status</span>
                </div>
                <div class="w-1/7 md:w-1/7">
                    <span class="font-hkbold text-secondary text-sm uppercase pr-8 md:pr-16 xl:pr-8">Action</span>
                </div>
            </div>
        </div>
        <div class="bg-white shadow px-4 py-5 sm:py-4 rounded mb-3 flex flex-col sm:flex-row justify-between items-center">
            <div class="w-full sm:w-1/7 md:w-1/7 flex flex-col md:flex-row md:items-center border-b sm:border-b-0 border-grey-dark pb-4 sm:pb-0 text-center sm:text-left">
                <span class="font-hkbold text-secondary text-sm uppercase text-center pt-3 pb-2 block sm:hidden">ID</span>
                <span class="font-hk text-secondary">1</span>
            </div>
            <div class="w-full sm:w-1/3 md:w-1/7 flex flex-col md:flex-row md:items-center border-b sm:border-b-0 border-grey-dark pb-4 sm:pb-0 text-center sm:text-left xl:-ml-32">
                <span class="font-hkbold text-secondary text-sm uppercase text-center pb-2 block sm:hidden">Name</span>
                <div class="w-20 mx-auto sm:mx-0 relative sm:mr-3 sm:pr-0">
                    <div class="aspect-w-1 aspect-h-1 w-full">
                        <img src="{{ asset('images/logo.png') }}"
                             alt="product image"
                             class="object-cover"/>
                    </div>
                </div>
                <span class="font-hk text-secondary text-base mt-2">Classic Beige</span>
            </div>
            <div class="w-full sm:w-1/7 text-center border-b sm:border-b-0 xl:pr-4 border-grey-dark pb-4 sm:pb-0 xl:-mr-20">
                <span class="font-hkbold text-secondary text-sm uppercase text-center pt-3 pb-2 block sm:hidden">Description</span>
                <span class="font-hk text-secondary">{{ \Illuminate\Support\Str::limit($string, 40, $end='...') }}</span>
            </div>
            <div class="w-full sm:w-1/7 text-center border-b sm:border-b-0 xl:pr-4 border-grey-dark pb-4 sm:pb-0 xl:-mr-32">
                <span class="font-hkbold text-secondary text-sm uppercase text-center pt-3 pb-2 block sm:hidden">Unit</span>
                <span class="font-hk text-secondary">Dozen</span>
            </div>
            <div class="w-full sm:w-1/7 xl:w-1/7 text-center sm:center sm:pr-6 xl:pl-4 border-b sm:border-b-0 border-grey-dark pb-4 sm:pb-0 xl:mr-4">
                <span class="font-hkbold text-secondary text-sm uppercase text-center pt-3 pb-2 block sm:hidden">Price</span>
                <span class="font-hk text-secondary">$1045</span>
            </div>
            <div class="w-full sm:w-3/10 md:w-1/7 xl:w-1/7 text-center sm:center xl:mr-20">
                <div class="pt-3 sm:pt-0">
                    <p class="font-hkbold text-secondary text-sm uppercase text-center pb-2 block sm:hidden">Status</p>
                    <span class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:text-white dark:bg-yellow-600">Pending</span>
                </div>
            </div>
            <div class="flex items-center space-x-4 w-full sm:w-3/10 md:w-1/7 xl:w-1/7 text-center sm:center pl-12">
                <a href=""
                  class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-indigo-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                  aria-label="Edit"
                >
                  <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                    ></path>
                  </svg>
                </a>
                <a @click="isDialogOpen = true"
                  class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-indigo-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                  aria-label="Delete"
                >
                  <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </a>
            </div>
        </div>
        <div class="bg-white shadow px-4 py-5 sm:py-4 rounded mb-3 flex flex-col sm:flex-row justify-between items-center">
            <div class="w-full sm:w-1/7 md:w-1/7 flex flex-col md:flex-row md:items-center border-b sm:border-b-0 border-grey-dark pb-4 sm:pb-0 text-center sm:text-left">
                <span class="font-hkbold text-secondary text-sm uppercase text-center pt-3 pb-2 block sm:hidden">ID</span>
                <span class="font-hk text-secondary">1</span>
            </div>
            <div class="w-full sm:w-1/3 md:w-1/7 flex flex-col md:flex-row md:items-center border-b sm:border-b-0 border-grey-dark pb-4 sm:pb-0 text-center sm:text-left xl:-ml-32">
                <span class="font-hkbold text-secondary text-sm uppercase text-center pb-2 block sm:hidden">Name</span>
                <div class="w-20 mx-auto sm:mx-0 relative sm:mr-3 sm:pr-0">
                    <div class="aspect-w-1 aspect-h-1 w-full">
                        <img src="{{ asset('images/logo.png') }}"
                             alt="product image"
                             class="object-cover"/>
                    </div>
                </div>
                <span class="font-hk text-secondary text-base mt-2">Classic Beige</span>
            </div>
            <div class="w-full sm:w-1/7 text-center border-b sm:border-b-0 xl:pr-4 border-grey-dark pb-4 sm:pb-0 xl:-mr-20">
                <span class="font-hkbold text-secondary text-sm uppercase text-center pt-3 pb-2 block sm:hidden">Description</span>
                <span class="font-hk text-secondary">{{ \Illuminate\Support\Str::limit($string, 40, $end='...') }}</span>
            </div>
            <div class="w-full sm:w-1/7 text-center border-b sm:border-b-0 xl:pr-4 border-grey-dark pb-4 sm:pb-0 xl:-mr-32">
                <span class="font-hkbold text-secondary text-sm uppercase text-center pt-3 pb-2 block sm:hidden">Unit</span>
                <span class="font-hk text-secondary">Dozen</span>
            </div>
            <div class="w-full sm:w-1/7 xl:w-1/7 text-center sm:center sm:pr-6 xl:pl-4 border-b sm:border-b-0 border-grey-dark pb-4 sm:pb-0 xl:mr-4">
                <span class="font-hkbold text-secondary text-sm uppercase text-center pt-3 pb-2 block sm:hidden">Price</span>
                <span class="font-hk text-secondary">$1045</span>
            </div>
            <div class="w-full sm:w-3/10 md:w-1/7 xl:w-1/7 text-center sm:center xl:mr-20">
                <div class="pt-3 sm:pt-0">
                    <p class="font-hkbold text-secondary text-sm uppercase text-center pb-2 block sm:hidden">Status</p>
                    <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-70">Declined</span>
                </div>
            </div>
            <div class="flex items-center space-x-4 w-full sm:w-3/10 md:w-1/7 xl:w-1/7 text-center sm:center pl-12">
                <a href=""
                  class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-indigo-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                  aria-label="Edit"
                >
                  <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                    ></path>
                  </svg>
                </a>
                <a @click="isDialogOpen = true"
                  class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-indigo-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                  aria-label="Delete"
                >
                  <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </a>
            </div>
        </div>
        <div class="bg-white shadow px-4 py-5 sm:py-4 rounded mb-3 flex flex-col sm:flex-row justify-between items-center">
            <div class="w-full sm:w-1/7 md:w-1/7 flex flex-col md:flex-row md:items-center border-b sm:border-b-0 border-grey-dark pb-4 sm:pb-0 text-center sm:text-left">
                <span class="font-hkbold text-secondary text-sm uppercase text-center pt-3 pb-2 block sm:hidden">ID</span>
                <span class="font-hk text-secondary">1</span>
            </div>
            <div class="w-full sm:w-1/3 md:w-1/7 flex flex-col md:flex-row md:items-center border-b sm:border-b-0 border-grey-dark pb-4 sm:pb-0 text-center sm:text-left xl:-ml-32">
                <span class="font-hkbold text-secondary text-sm uppercase text-center pb-2 block sm:hidden">Name</span>
                <div class="w-20 mx-auto sm:mx-0 relative sm:mr-3 sm:pr-0">
                    <div class="aspect-w-1 aspect-h-1 w-full">
                        <img src="{{ asset('images/logo.png') }}"
                             alt="product image"
                             class="object-cover"/>
                    </div>
                </div>
                <span class="font-hk text-secondary text-base mt-2">Classic Beige</span>
            </div>
            <div class="w-full sm:w-1/7 text-center border-b sm:border-b-0 xl:pr-4 border-grey-dark pb-4 sm:pb-0 xl:-mr-20">
                <span class="font-hkbold text-secondary text-sm uppercase text-center pt-3 pb-2 block sm:hidden">Description</span>
                <span class="font-hk text-secondary">{{ \Illuminate\Support\Str::limit($string, 40, $end='...') }}</span>
            </div>
            <div class="w-full sm:w-1/7 text-center border-b sm:border-b-0 xl:pr-4 border-grey-dark pb-4 sm:pb-0 xl:-mr-32">
                <span class="font-hkbold text-secondary text-sm uppercase text-center pt-3 pb-2 block sm:hidden">Unit</span>
                <span class="font-hk text-secondary">Dozen</span>
            </div>
            <div class="w-full sm:w-1/7 xl:w-1/7 text-center sm:center sm:pr-6 xl:pl-4 border-b sm:border-b-0 border-grey-dark pb-4 sm:pb-0 xl:mr-4">
                <span class="font-hkbold text-secondary text-sm uppercase text-center pt-3 pb-2 block sm:hidden">Price</span>
                <span class="font-hk text-secondary">$1045</span>
            </div>
            <div class="w-full sm:w-3/10 md:w-1/7 xl:w-1/7 text-center sm:center xl:mr-20">
                <div class="pt-3 sm:pt-0">
                    <p class="font-hkbold text-secondary text-sm uppercase text-center pb-2 block sm:hidden">Status</p>
                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">Approved</span>
                </div>
            </div>
            <div class="flex items-center space-x-4 w-full sm:w-3/10 md:w-1/7 xl:w-1/7 text-center sm:center pl-12">
                <a href=""
                  class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-indigo-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                  aria-label="Edit"
                >
                  <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                    ></path>
                  </svg>
                </a>
                <a @click="isDialogOpen = true"
                  class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-indigo-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                  aria-label="Delete"
                >
                  <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </a>
            </div>
        </div>

        <div class="pt-6 flex justify-center md:justify-end">
            <span class="font-hk font-semibold text-grey-darkest transition-colors hover:text-black pr-5 cursor-pointer">Previous</span>
<span
class="font-hk font-semibold text-black transition-colors hover:text-white text-sm hover:bg-primary h-6 w-6 rounded-full flex items-center justify-center mr-3 cursor-pointer">1</span>
<span
class="font-hk font-semibold text-black transition-colors hover:text-white text-sm hover:bg-primary h-6 w-6 rounded-full flex items-center justify-center mr-3 cursor-pointer">2</span>
<span
class="font-hk font-semibold text-black transition-colors hover:text-white text-sm hover:bg-primary h-6 w-6 rounded-full flex items-center justify-center mr-3 cursor-pointer">3</span>
<span class="font-hk font-semibold text-grey-darkest transition-colors hover:text-black pl-2 cursor-pointer">Next</span>
        </div>
    </div>
</div>
    </div>
</div>
@endsection
