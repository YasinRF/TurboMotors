<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-10 mx-5 mt-5">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autocomplete="username" />
            </div>

            <div class="mb-14 mx-5">
                <x-label for="password" value="{{ __('Contraseña') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Recuerdame') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('password.request') }}">
                        {{ __('¿Has olvidado tu contraseña?') }}
                    </a>
                @endif

                <button
                    class="ml-6 bg-gray-950 border-2 border-gray-800 rounded-lg text-white px-6 py-3 text-base hover:text-orange-500 hover:border-orange-600 cursor-pointer transition">
                    {{ __('Iniciar sesión') }}
                </button>

                {{-- <button
                    class="ml-3 inline-block py-2 px-4 rounded-l-xl rounded-xl bg-[#F17522] hover:bg-black hover:text-[#F17522] font-bold">
                    {{ __('Log in') }}
                </button> --}}

                {{-- <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button> --}}
                
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
