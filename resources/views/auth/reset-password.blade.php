@extends('layouts.auth')

@section('title')
    {{ __('Reset Password') }}
@endsection

@section('images')
    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="{{ asset('images/login-office.jpeg') }}"
        alt="Office" />
    <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block"
        src="{{ asset('images/login-office-dark.jpeg') }}" alt="Office" />
@endsection

@section('form-title')
    {{ __('Reset Password') }}
@endsection

@section('form')
    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ request()->route('token') }}">
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">{{ __('E-Mail Address') }}</span>
            <input type="email" name="email" value="{{ $request->email ?? old('email') }}" required autocomplete="email" autofocus
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 @error('email') border-red-500 @enderror focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="{{ __('Email') }}" />
        </label>
        @error('email')
        <p class="text-red-500 text-xs italic mt-2">
            {{ $message }}
        </p>
        @enderror
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">{{ __('Password') }}</span>
            <input type="password" name="password" required autocomplete="new-password"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 @error('password') border-red-500 @enderror focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="{{ __('Password') }}" />
        </label>
        @error('password')
        <p class="text-red-500 text-xs italic mt-2">
            {{ $message }}
        </p>
        @enderror
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">{{ __('Confirm Password') }}</span>
            <input type="password" name="password_confirmation" required autocomplete="new-password"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="{{ __('Confirm Password') }}" />
        </label>

        <button type="submit"
            class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            {{ __('Reset Password') }}
        </button>
    </form>
@endsection
