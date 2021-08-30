@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <div class="container">
    <div class="pt-10 sm:pt-12 pb-16 sm:pb-20 lg:pb-24 flex flex-col lg:flex-row justify-between">
        <div class="lg:w-1/4">
    <p class=" text-secondary text-2xl sm:text-3xl lg:text-4xl pb-6">My Account</p>
    <div class="pl-3 flex flex-col">
        <a href="{{ route('admin.profile') }}"
           class="transition-all hover:font-bold hover:text-indigo-500 px-4 py-3 border-l-2 border-indigo-500-lighter hover:border-indigo-500  font-hk text-grey-darkest">My Account</a>
           <a href="{{ route('admin.inbox') }}"
           class="transition-all hover:font-bold hover:text-indigo-500 px-4 py-3 border-l-2 border-indigo-500-lighter hover:border-indigo-500  font-hk font-bold text-indigo-500 border-indigo-500 ">My Inbox</a>
    </div>
    <a href="{{ route('logout') }}" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();"
       class="transition-all border hover:bg-indigo-500 hover:text-white border-indigo-500 rounded px-8 py-3 mt-8 inline-block font-hk font-bold text-indigo-500">Log Out</a>
       <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>
<div class="lg:w-3/4 mt-12 lg:mt-0">
    @livewire('inbox-messages-list-view')
</div>
    </div>
</div>
    </div>
  </div>
@endsection
