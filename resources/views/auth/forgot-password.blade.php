@extends('layouts.auth')

@section('title')
    {{ __('Reset Password') }}
@endsection

@section('images')
    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden"
        src="{{ asset('images/forgot-password-office.jpeg') }}" alt="Office" />
    <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block"
        src="{{ asset('images/forgot-password-office-dark.jpeg') }}" alt="Office" />
@endsection

@section('form-title')
    {{ __('Reset Password') }}
@endsection

@section('message')
    @if (session('status'))
        <div class="text-sm border-t-8 rounded-t text-gray-700 text-gray-100 border-purple-600 bg-purple-100 px-3 py-4"
            role="alert">
            {{ session('status') }}
        </div>
    @endif
@endsection

@section('form')
    <form action="{{ route('password.email') }}" method="POST">
        @csrf
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">{{ __('E-Mail Address') }}</span>
            <input type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 @error('email') border-red-500 @enderror focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="{{ __('E-Mail Address') }}" />
        </label>
        @error('email')
        <p class="text-red-500 text-xs italic mt-2">
            {{ $message }}
        </p>
        @enderror
        <button
            class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            {{ __('Send Password Reset Link') }}
        </button>

        <hr class="my-6" />

        <p>
            <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" href="{{ route('login') }}">
                {{ __('Back to login') }}
            </a>
        </p>
    </form>
@endsection
