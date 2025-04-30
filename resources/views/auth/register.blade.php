<x-guest-layout>
    
    <div class="w-full relative lg:w-1/3 flex flex-col items-center justify-center p-12 bg-no-repeat bg-cover bg-center"
        style="background-image: url('assets/img/NailSketch.jpeg')">
    </div>
    <div class="w-full lg:w-2/3 py-9 px-9">
        <h1 class="text-3xl font-bold text-center text-pink-700 mb-6 tracking-wider">Welcome</h1>
        <h2 class="text-3xl font-bold text-center text-pink-700 mb-6 tracking-wider">Sign Up to Continue!!</h2>

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <!-- Username -->
            <div>
                <x-input-label for="username" :value="__('Username')" class="!text-slate-600" />
                <x-text-input id="username"
                    class="block mt-1 w-full !text-slate-400 !bg-white !border-gray-300 focus:ring-gray-500 focus:border-gray-500"
                    type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('username')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" class="!text-slate-600" />
                <x-text-input id="email"
                    class="block mt-1 w-full !text-slate-400 !bg-white !border-gray-300 focus:ring-purple-500 focus:border-purple-500"
                    type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="!text-slate-600" />

                <x-text-input id="password"
                    class="block mt-1 w-full !text-slate-400 !bg-white !border-gray-300 focus:ring-purple-500 focus:border-purple-500"
                    type="password" name="password" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="!text-slate-600" />

                <x-text-input id="password_confirmation"
                    class="block mt-1 w-full !text-slate-400 !bg-white !border-gray-300 focus:ring-purple-500 focus:border-purple-500"
                    type="password" name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex flex-col items-center justify-center mt-4">
                <div class="flex items-center justify-between mb-2">
                    <p class="text-xl text-gray-400">
                        {{ __('Already have an account?') }}
                    </p>
                    <a class="text-xl text-pink-500 ml-2 font-semibold bg-pink-300 hover:bg-pink-400 " href="{{ route('login') }}">
                        {{ __('Login') }}
                    </a>
                </div>

                <x-primary-button
                    class="w-full inline-flex items-center justify-center bg-pink-300 hover:bg-pink-400 text-black">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
