{{--  defult jet streem login from this is its work i am comment it
<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
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
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
--}}









{{--coustem login from--}}

<!-- Bootstrap 5 CDN -->

<x-guest-layout>
<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card shadow-lg p-4 w-100" style="max-width: 400px; border-radius: 1rem;">
        <div class="card-body">
            <div class="text-center mb-4">
                <div class="flex justify-center items-center shrink-0">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('assets/logo.png') }}" class="h-18 w-14 mr-2" alt="Logo">
                    </a>
                </div>
                <h3 class="font-semibold text-gray-700 text-lg mt-3">Welcome ADD Lanka!</h3>
            </div>
            
            <!-- Validation Errors -->
            <x-validation-errors class="mb-4" />

            <!-- Status Message -->
            @if (session('status'))
                <div class="mb-4 text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group mb-3">
                    <x-label for="email" value="{{ __('Email') }}" class="form-label text-sm font-semibold text-gray-600" />
                    <x-input id="email" class="form-control border-2 border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-md" 
                             type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <div class="form-group mb-3">
                    <x-label for="password" value="{{ __('Password') }}" class="form-label text-sm font-semibold text-gray-600" />
                    <x-input id="password" class="form-control border-2 border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-md" 
                             type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="form-group d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                        <label class="form-check-label text-sm text-gray-600" for="remember_me">
                            {{ __('Remember me') }}
                        </label>
                    </div>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:text-indigo-800">{{ __('Forgot password?') }}</a>
                    @endif
                </div>

               

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary py-2 text-white bg-gray-800 hover:bg-gray-700 rounded-md">
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>

            <div class="text-center mt-4">
                <p class="text-gray-600 text-sm">Don't have an account? 
                    <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold">Sign up</a>
                </p>
            </div>
        </div>
    </div>
</div>
</x-guest-layout>