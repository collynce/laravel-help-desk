@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="w-full max-w-lg mx-auto mt-20">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') is-invalid @enderror"
                        id="email" value="{{ old('email') }}" name="email" type="email" placeholder="Email" required autocomplete="email" autofocus>
                    @error('email')
                    <p class="text-red-500 text-xs italic invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 @error('password') is-invalid @enderror text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        id="password" type="password" placeholder="******************" name="password" required autocomplete="current-password">
                    @error('password')
                    <p class="text-red-500 text-xs italic invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex items-center text-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>
        </div>
        <p class="text-center text-gray-500 text-xs">
            Not yet registered? <a href="{{ route('register') }}" class="text-xs text-blue-500 hover:text-teal-300">{{ __('Register') }}</a>
        </p>
    </div>
@endsection
