@extends('layouts.auth')

@section('title')
    {{ __('Verify Email') }}
@endsection


@section('images')
    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden"
        src="{{ asset('images/forgot-password-office.jpeg') }}" alt="Office" />
    <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block"
        src="{{ asset('images/forgot-password-office-dark.jpeg') }}" alt="Office" />
@endsection

@section('form-title')
    {{ __('Verifiy Email') }}
@endsection

@section('message')
    @if (session('status'))
        <div class="text-sm border-t-8 rounded-t text-gray-700 text-gray-100 border-purple-600 bg-purple-100 px-3 py-4"
            role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
    @endif

@endsection

@section('form')
    <div
        class="w-full flex flex-wrap text-gray-700 dark:text-gray-200 leading-normal text-sm space-y-4 sm:text-base sm:space-y-6">
        <p>
            {{ __('Before proceeding, please check your email for a verification link.') }}
        </p>

        <p>
            {{ __('If you did not receive the email') }}, <a
                class="text-blue-500 hover:text-blue-700 no-underline hover:underline cursor-pointer"
                onclick="event.preventDefault(); document.getElementById('resend-verification-form').submit();">{{ __('click here to request another') }}</a>.
        </p>

        <form id="resend-verification-form" method="POST" action="{{ route('verification.send') }}" class="hidden">
            @csrf
        </form>
    </div>
@endsection
