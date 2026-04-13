
<x-guest-layout>

    <div class="max-w-md w-full mx-auto bg-gradient-to-br from-indigo-50 via-white to-blue-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 border-2 border-indigo-200 dark:border-indigo-700 rounded-3xl shadow-2xl p-10 mt-12">
        <h2 class="text-3xl font-extrabold text-center text-indigo-700 dark:text-indigo-300 mb-2 drop-shadow">Sign in to your account</h2>
        <p class="text-center text-gray-600 dark:text-gray-300 mb-6">Welcome back! Please enter your details below.</p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-7">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full bg-white/80 dark:bg-gray-900/80 border-indigo-200 dark:border-indigo-700 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-700" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full bg-white/80 dark:bg-gray-900/80 border-indigo-200 dark:border-indigo-700 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-700" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-indigo-300 dark:border-indigo-700 text-indigo-600 shadow-sm focus:ring-indigo-400 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-900" name="remember">
                    <span class="ms-2 text-sm text-indigo-700 dark:text-indigo-300">{{ __('Remember me') }}</span>
                </label>
                @if (Route::has('password.request'))
                    <a class="text-sm text-indigo-700 hover:text-indigo-900 dark:text-indigo-300 dark:hover:text-indigo-100 font-semibold transition" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <div>
                <x-primary-button class="w-full py-3 text-base font-bold bg-gradient-to-r from-indigo-500 via-blue-400 to-blue-600 hover:from-indigo-600 hover:to-blue-700 focus:ring-4 focus:ring-indigo-200 dark:focus:ring-indigo-700 shadow-lg shadow-indigo-100 dark:shadow-indigo-900/30 border-0">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
