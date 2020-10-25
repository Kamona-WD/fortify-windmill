@extends('layouts.auth')

@section('title')
    {{ __('Verify Access') }}
@endsection

@section('images')
    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="{{ asset('images/login-office.jpeg') }}"
        alt="Office" />
    <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block"
        src="{{ asset('images/login-office-dark.jpeg') }}" alt="Office" />
@endsection

@section('form')
    <div x-data="{ recovery: false }">
        <div class="mb-4 text-sm text-gray-600 dark:text-gray-300" x-show="! recovery">
            {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
        </div>

        <div class="mb-4 text-sm text-gray-600 dark:text-gray-300" x-show="recovery">
            {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
        </div>

        @if ($errors->any())
            <div class="mb-4">
                <div class="font-medium text-red-600">Whoops! Something went wrong.</div>

                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/two-factor-challenge">
            @csrf

            <div class="mt-4" x-show="! recovery">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">{{ __('Code') }}</span>
                    <input type="text" name="code" autocomplete="one-time-code" autofocus x-ref="code"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>
            </div>

            <div class="mt-4" x-show="recovery">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">{{ __('Recovery Code') }}</span>
                    <input type="text" name="recovery_code" autocomplete="one-time-code" autofocus x-ref="recovery_code"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>
            </div>

            <div class="flex items-center justify-between mt-4">
                <button type="button"
                    class="text-sm text-gray-600 dark:text-gray-200 hover:text-gray-900 underline cursor-pointer"
                    x-show="! recovery" x-on:click="recovery = true;$nextTick(() => { $refs.recovery_code.focus() })">
                    {{ __('Use a recovery code') }}
                </button>

                <button type="button"
                    class="text-sm text-gray-600 dark:text-gray-200 hover:text-gray-900 underline cursor-pointer"
                    x-show="recovery" x-on:click="recovery = false;$nextTick(() => { $refs.code.focus() })">
                    {{ __('Use an authentication code') }}
                </button>

                <button type="submit"
                    class="ml-4 block px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    {{ __('Login') }}
                </button>
            </div>
        </form>
    </div>
@endsection
