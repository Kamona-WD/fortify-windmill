<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- Scripts --}}
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="{{ asset('js/init-alpine.js') }}"></script>
</head>

<body>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-full mx-auto overflow-hidden">
            <div class="flex flex-col">
                @if (Route::has('login'))
                    <div class="absolute top-0 right-0 mt-4 mr-4 space-x-4 sm:mt-6 sm:mr-6 sm:space-x-6">
                        @auth
                            <a href="{{ url('/home') }}"
                                class="no-underline hover:underline text-sm font-normal text-teal-800 dark:text-gray-200 uppercase">{{ __('Home') }}</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="no-underline hover:underline text-sm font-normal text-teal-800 dark:text-gray-200 uppercase">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="no-underline hover:underline text-sm font-normal text-teal-800 dark:text-gray-200 uppercase">{{ __('Register') }}</a>
                            @endif
                        @endauth
                    </div>
                @endif

                <div class="flex items-center justify-center">
                    <div class="flex flex-col justify-around h-full">
                        <div>
                            <h1
                                class="mb-6 text-gray-600 dark:text-gray-200 text-center font-light tracking-wider text-4xl sm:mb-8 sm:text-6xl">
                                Windmill
                            </h1>

                            <ul
                                class="flex flex-col justify-center items-center space-y-2 sm:flex-row sm:flex-wrap sm:space-x-8 sm:space-y-0">
                                <li>
                                    <a href="https://windmillui.com/dashboard-html"
                                        class="no-underline hover:underline text-center text-sm font-normal text-teal-800 dark:text-gray-300 uppercase"
                                        title="Windmill">Windmill</a>
                                </li>
                                <li>
                                    <a href="https://github.com/Kamona-WD/fortify-windmill-ui"
                                        class="no-underline hover:underline text-sm font-normal text-teal-800 dark:text-gray-300 uppercase"
                                        title="Fortify-Windmil">Fortify Windmill</a>
                                </li>
                                <li>
                                    <a href="https://laravel.com/docs"
                                        class="no-underline hover:underline text-sm font-normal text-teal-800 dark:text-gray-300 dark:text-gray-200 uppercase"
                                        title="Laravel Documentation">Lravel Docs</a>
                                </li>
                                <li>
                                    <a href="https://github.com/laravel/fortify#readme"
                                        class="no-underline hover:underline text-sm font-normal text-teal-800 dark:text-gray-300 dark:text-gray-200 uppercase"
                                        title="Fortify Documentation">Fortify Docs</a>
                                </li>
                                <li>
                                    <a href="https://tailwindcss.com"
                                        class="no-underline hover:underline text-sm font-normal text-teal-800 dark:text-gray-300 uppercase"
                                        title="Tailwind Css">Tailwind CSS</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed left-5 bottom-5">
        <button
            class="flex justify-center items-center w-12 h-12 rounded-full text-purple-900 dark:text-purple-100 bg-purple-100 dark:bg-purple-900 shadow-lg focus:outline-none focus:shadow-outline-purple"
            @click="toggleTheme" aria-label="Toggle color mode">
            <template x-if="!dark">
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
            </template>
            <template x-if="dark">
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                        clip-rule="evenodd"></path>
                </svg>
            </template>
        </button>
    </div>
</body>

</html>
