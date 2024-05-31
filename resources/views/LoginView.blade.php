@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center h-screen">
        <form class="w-full max-w-md mx-auto" action="{{ route('login')}}" method="POST">
            @csrf
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                <input type="email" name="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Insert Email" required />
                @error('email')
                    <span class="mt-2 text-xs text-red-600" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Your
                    password</label>
                <input type="password" name="password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Insert Password" required />
                @error('password')
                    <span class="mt-2 text-xs text-red-600" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <button type="submit"
                class="text-white bg-yellow-300 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-yellow-100 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
        </form>
    </div>
@endsection
