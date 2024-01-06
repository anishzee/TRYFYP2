<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <a class="w-16 h-16" viewbox="0 0 48 48" >
                <img src="../admin/assets/images/LOGOREPO.png" alt="logo" width="300" height="300" />
            </a>
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label style="color: #fff; font-size: 15px;" for="email" value="{{ __('Email') }}" />
                <!-- <x-input id="email"  class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" /> -->
                <x-input
                    id="email"
                    class="block mt-1 w-full"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required  {{-- Add the 'required' attribute --}}
                    autofocus
                    pattern="[a-zA-Z0-9._%+-]+@gmail\.com"  {{-- Add the 'pattern' attribute --}}
                    title="Enter a valid Gmail address in the format name@gmail.com" {{-- Optional title for user guidance --}}
                    autocomplete="username"
                />
            </div>

            <div class="mt-4">
                <x-label style="color: #fff; font-size: 15px;" for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label style="color: #fff; font-size: 15px;" for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-white-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div style="color: #fff; font-size: 15px;" class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-white-600 hover:text-white-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
