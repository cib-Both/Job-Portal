@extends('layouts.account')

@section('content')
<div class="max-w-md mx-auto bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden md:max-w-2xl px-8 py-8">
    <!-- Session Status -->
    <x-auth-session-status class="mb-6 p-4 bg-sky-50 dark:bg-sky-900/30 text-sky-800 dark:text-sky-200 rounded-lg border border-sky-100 dark:border-sky-800" :status="session('status')" />

    <div class="text-center mb-6">
        <div class="mx-auto flex items-center justify-center">
            <img src="images/Logojob.png" alt="Logo" class="w-20 h-20 object-contain" />
        </div>
        <h2 class="text-3xl font-bold text-sky-600 dark:text-sky-400">Welcome back</h2>
        <p class="text-gray-500 dark:text-gray-400 mt-2">Sign in to access your account</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                    </svg>
                </div>
                <x-text-input id="email" class="block w-full pl-10 pr-3 py-3 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 dark:bg-gray-700 dark:text-white placeholder-gray-400" 
                              type="email" name="email" :value="old('email')" required autofocus autocomplete="username" 
                              placeholder="you@example.com" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
        </div>

        <!-- Password -->
        <div x-data="{ show: false }">
            <div class="flex justify-between items-center">
                <x-input-label for="password" :value="__('Password')" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2" />
            </div>

            <div class="relative">
                <!-- Lock icon -->
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                    </svg>
                </div>

                <!-- Password input -->
                <x-text-input 
                    id="password" 
                    class="block w-full pl-10 pr-10 py-3 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 dark:bg-gray-700 dark:text-white placeholder-gray-400"
                    x-bind:type="show ? 'text' : 'password'"
                    name="password"
                    required 
                    autocomplete="current-password" 
                    placeholder="••••••••" 
                />

                <!-- Toggle button -->
                <button type="button" 
                    @click="show = !show" 
                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 focus:outline-none">
                    <!-- Eye open -->
                    <svg x-show="!show"
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="2" />
                        <path d="M3 12c2.5-4 6.5-6 9-6s6.5 2 9 6c-2.5 4-6.5 6-9 6s-6.5-2-9-6z" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                    <!-- Eye off -->
                    <svg x-show="show" 
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="2" />
                        <path d="M3 12c2.5-4 6.5-6 9-6s6.5 2 9 6c-2.5 4-6.5 6-9 6s-6.5-2-9-6z" stroke-linecap="round" stroke-linejoin="round"/>
                        <line x1="4" y1="4" x2="20" y2="20" stroke-width="2" stroke-linecap="round" />
                    </svg>
        </button>
    </div>

    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
</div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <input id="remember_me" type="checkbox" class="h-4 w-4 text-sky-600 focus:ring-sky-500 border-gray-300 dark:border-gray-600 rounded dark:bg-gray-700" name="remember">
            <label for="remember_me" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">
                {{ __('Remember me') }}
            </label>
        </div>

        <div>
            <button type="submit" class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-md font-medium text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500 transition-colors duration-200">
                {{ __('Sign in') }}
                    <svg class="ml-2 -mr-1 w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                    </svg>
            </button>
        </div>
    </form>

    @if (Route::has('register'))
    <div class="mt-8 text-center">
        <p class="text-sm text-gray-500 dark:text-gray-400">
            {{ __("Don't have an account?") }}
            <a href="{{ route('register') }}" class="font-medium text-sky-600 dark:text-sky-400 hover:text-sky-500 dark:hover:text-sky-300">
                {{ __('Create account') }}
            </a>
        </p>
    </div>
    @endif
</div>
@endsection