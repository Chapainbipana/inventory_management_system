{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="w-full relative lg:w-1/3 flex flex-col items-center justify-center p-12 bg-no-repeat bg-cover bg-center"
        style="background-image: url('assets/img/side.jpeg')">
        <div class="absolute top-4 left-4">
            <a href="/">
                <img src="{{ asset('assets/img/Logo_Crafts-removebg.png') }}" alt="Logo"
                    class="w-24 h-24 object-contain">
            </a>
        </div>
        <h1 class="text-4xl font-bold text-center tracking-wider text-slate-50">Welcome</h1>
        <div>
            <p class="text-1xl font-bold text-center tracking-wider text-slate-50">New Here?</p>
        </div>
        <div>
            <a href="register"><button type="button"
                    class="text-black bg-gradient-to-r from-orange-100 via-orange-200 to-orange-100 hover:bg-gradient-to-r hover:from-orange-200 hover:via-orange-300 hover:to-orange-400  font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">REGISTER</button></a>
        </div>
    </div>
    <div class="w-full lg:w-2/3 py-9 px-9">
        <h1 class="text-3xl font-bold text-center text-gray-700 mb-6 tracking-wider">Welcome Back</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="!text-slate-600" />
                <x-text-input id="email"
                    class="block mt-1 w-full !text-slate-400 !bg-white !border-gray-300 focus:ring-gray-500 focus:border-gray-500 "
                    type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="!text-slate-600" />

                <x-text-input id="password"
                    class="block mt-1 w-full !text-slate-400 !bg-white !border-gray-300 focus:ring-purple-500 focus:border-purple-500"
                    type="password" name="password" required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded bg-white border-gray-300 text-black shadow-sm focus:ring-gray-500 focus:ring-2 focus:ring-offset-2 dark:bg-gray-900 dark:border-gray-600 dark:focus:ring-gray-400"
                        name="remember">
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="mt-4 text-center">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-400 hover:text-gray-500 rounded-md"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <!-- Log In Button -->
            <div class="mt-4">
                <x-primary-button
                    class="w-full inline-flex items-center justify-center bg-gradient-to-r from-orange-100 via-orange-200 to-orange-100 hover:bg-gradient-to-r hover:from-orange-200 hover:via-orange-300 hover:to-orange-400 text-black">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>


        </form>
    </div>
</x-guest-layout>
