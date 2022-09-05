@extends('layouts.app')

@section('content')
    <div class="text-center">
        <div >
            <div class="mt-48">
                <h1 class="text-5xl font-bold">Home Page</h1>
                @if (!Auth::user())
                <div class="flex flex-row items-center justify-evenly mt-32">
                    <span class="w-1/6 p-8 text-xl text-white shadow rounded-md bg-indigo-500">Already Registered ? <br><a href="{{ route('login') }}" class="mt-4 underline underline-offset-8 hover:text-white">Log in</a></span> 
                    <span class="w-1/6 p-8 text-xl text-white shadow rounded-md bg-indigo-500">Not Registered Yet ? <br><a href="{{ route('register') }}" class="mt-4 underline underline-offset-8 hover:text-white">Register </a></span>
                </div>
                
                @endif
            </div>
        </div>
    </div>
@endsection
