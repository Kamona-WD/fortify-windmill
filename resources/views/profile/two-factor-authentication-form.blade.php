<div>
    <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-300">
            {{ __('Two Factor Authentication') }}
        </h3>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Add additional security to your account using two factor authentication.') }}
        </p>
    </div>

    <div class="mt-5">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white dark:bg-gray-800">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-300">
                    @if (auth()->user()->two_factor_secret)
                        {{ __('You have enabled two factor authentication.') }}
                    @else
                        {{ __('You have not enabled two factor authentication.') }}
                    @endif
                </h3>
                <div class="mt-3 max-w-xl text-sm text-gray-600 dark:text-gray-300">
                    <p>
                        {{ __('When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone\'s Google Authenticator application.') }}
                    </p>
                </div>
            </div>
            <div class="px-4 py-3 bg-white dark:bg-gray-800">
                @if (!auth()->user()->two_factor_secret)
                    <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                        @csrf
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            {{ __('Enable Two-Factor') }}
                        </button>
                    </form>
                @else
                    <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            {{ __('Disable Two-Factor') }}
                        </button>
                    </form>
                    @if (session('status') == 'two-factor-authentication-enabled')

                        <div class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                            {{ __('Two factor authentication is now enabled. Scan the following QR code using your phone\'s authenticator application.') }}
                        </div>

                        <div class="my-2">
                            {!! auth()
                            ->user()
                            ->twoFactorQrCodeSvg() !!}
                        </div>
                    @endif
                    <div class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                        {{ __('Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.') }}
                    </div>

                    <div
                        class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 dark:bg-gray-700 dark:text-gray-200 rounded-lg">
                        @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes), true) as $code)
                        <div>{{ $code }}</div>
                @endforeach
            </div>
            <form method="POST" action="{{ url('user/two-factor-recovery-codes') }}">
                @csrf
                <button type="submit"
                    class="inline-flex items-center mt-2 px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    {{ __('Regenerate Recovery Codes') }}
                </button>
            </form>
            @endif
        </div>

    </div>
</div>
</div>
