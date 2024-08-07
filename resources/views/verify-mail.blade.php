@extends('layout')
@section('content')
    
<div class="mx-4">
    <form method="POST" action="{{ route('verify.email',$user->id) }}">
        @csrf
    <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Verify Your Email
        </h2>
    </header>
    <div class="mb-6">
        <label for="OTP" class="inline-block text-lg mb-2">
            OTP:
        </label>
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="otp" value=""
        />
        @error('otp')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-6">
        <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
            Submit
        </button>
    </div>
    </div>
    </form>
</div>
@endsection
