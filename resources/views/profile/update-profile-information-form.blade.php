<div>
    <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-300">
            {{ __('Profile Information') }}
        </h3>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Update your account\'s profile information and email address.') }}
        </p>
    </div>

    <div class="mt-5">
        <form action="{{ route('user-profile-information.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white dark:bg-gray-800 sm:p-6">
                    <div class="">
                        <!-- Name -->
                        <div class="col-span-6 sm:col-span-4">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">{{ __('Name') }}</span>
                                <input type="text" name="name" value="{{ old('name') ?? auth()->user()->name }}"
                                    required autocomplete="name"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 @error('name') border-red-500 @enderror focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="{{ __('Name') }}" />
                            </label>
                            @error('name')
                            <p class="text-red-500 text-xs italic mt-2">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="col-span-6 sm:col-span-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">{{ __('E-Mail Address') }}</span>
                                <input type="email" name="email" value="{{ old('email') ?? auth()->user()->email }}"
                                    required autocomplete="email"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 @error('email') border-red-500 @enderror focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="{{ __('Email') }}" />
                            </label>
                            @error('email')
                            <p class="text-red-500 text-xs italic mt-2">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 dark:bg-gray-700 text-right sm:px-6">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        {{ __('Update Profile') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
