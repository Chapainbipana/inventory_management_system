{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        
        <!-- Address -->
        <div>
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <!-- Phone -->
        <div>
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
<x-guest-layout>

    <div class="w-full relative lg:w-1/3 flex flex-col items-center justify-center p-12 bg-no-repeat bg-cover bg-center"
        style="background-image: url('assets/img/side.jpeg')">
        <div class="absolute top-4 left-4">
            <a href="/">
                <img src="{{ asset('assets/img/Logo_Crafts-removebg.png') }}" alt="Logo"
                    class="w-24 h-24 object-contain">
            </a>
        </div>
        <h1 class="text-5xl font-bold text-center tracking-wider text-slate-50">Welcome</h1>
        <div>
            <p class="text-2xl font-bold text-center tracking-wider text-slate-50">One of Us?</p>
        </div>
        <div>
            <a href="login"><button type="button"
                    class="text-black bg-gradient-to-r from-orange-100 via-orange-200 to-orange-100 hover:bg-gradient-to-r hover:from-orange-200 hover:via-orange-300 hover:to-orange-400  font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">LOGIN</button></a>
        </div>
    </div>
    <div class="w-full lg:w-2/3 py-9 px-9">
        <h1 class="text-3xl font-bold text-center text-gray-700 mb-6 tracking-wider">Sign Up to Inventory Management System</h1>
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- First Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" class="!text-slate-600" />
                    <x-text-input id="name"
                        class="block mt-1 w-full !text-slate-400 !bg-white !border-gray-300 focus:ring-gray-500 focus:border-gray-500"
                        :error="$errors->has('name')" type="text" name="name" :value="old('name')" autofocus
                        autocomplete="given-name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                {{-- <!-- Last Name -->
                <div>
                    <x-input-label for="last_name" :value="__('Last Name')" class="!text-slate-600" />
                    <x-text-input id="last_name"
                        class="block mt-1 w-full !text-slate-400 !bg-white !border-gray-300 focus:ring-gray-500 focus:border-gray-500"
                        :error="$errors->has('last_name')" type="text" name="last_name" :value="old('last_name')"
                        autocomplete="family-name" />
                    <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                </div> --}}

                <!-- Phone Number -->
                <div>
                    <x-input-label for="phone" :value="__('Phone Number')" class="!text-slate-600" />
                    <x-text-input id="phone"
                        class="block mt-1 w-full !text-slate-400 !bg-white !border-gray-300 focus:ring-gray-500 focus:border-gray-500"
                        :error="$errors->has('phone')" type="text" name="phone" :value="old('phone')" autocomplete="tel" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                {{-- <!-- City -->
                <div>
                    <x-input-label for="city" :value="__('City')" class="!text-slate-600" />
                    <x-text-input id="city"
                        class="block mt-1 w-full !text-slate-400 !bg-white !border-gray-300 focus:ring-gray-500 focus:border-gray-500"
                        :error="$errors->has('city')" type="text" name="city" :value="old('city')"
                        autocomplete="address-level2" />
                    <x-input-error :messages="$errors->get('city')" class="mt-2" />
                </div> --}}

                <!-- Address -->
                <div>
                    <x-input-label for="address" :value="__('Address')" class="!text-slate-600" />
                    <x-text-input id="address"
                        class="block mt-1 w-full !text-slate-400 !bg-white !border-gray-300 focus:ring-gray-500 focus:border-gray-500"
                        :error="$errors->has('address')" type="text" name="address" :value="old('address')"
                        autocomplete="address-line1" />
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>

                <!-- Image -->
                <div>
                    <x-input-label for="image" :value="__('Profile Image')" class="!text-slate-600" />
                    <x-text-input id="image"
                        class="block mt-1 w-full !text-slate-400 !bg-white !border-gray-300 focus:ring-gray-500 focus:border-gray-500"
                        :error="$errors->has('image')" type="file" name="image" accept="image/*" />
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" class="!text-slate-600" />
                <x-text-input id="email"
                    class="block mt-1 w-full !text-slate-400 !bg-white !border-gray-300 focus:ring-purple-500 focus:border-purple-500"
                    :error="$errors->has('email')" type="text" name="email" :value="old('email')" autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 invalid-feedback" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="!text-slate-600" />

                <x-text-input id="password"
                    class="block mt-1 w-full !text-slate-400 !bg-white !border-gray-300 focus:ring-purple-500 focus:border-purple-500"
                    :error="$errors->has('password')" type="password" name="password" autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="!text-slate-600" />

                <x-text-input id="password_confirmation"
                    class="block mt-1 w-full !text-slate-400 !bg-white !border-gray-300 focus:ring-purple-500 focus:border-purple-500"
                    :error="$errors->has('password_confirmation')" type="password" name="password_confirmation" autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex flex-col items-center justify-center mt-4">
                <a class="underline text-sm text-gray-400 hover:text-gray-500 rounded-md mb-4"
                    href="{{ route('login') }}">
                    Already registered?
                </a>

                <x-primary-button>
                    Register
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
