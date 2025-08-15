@extends('layouts.account')

@section('content')
    <div class="max-w-md mx-auto bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden md:max-w-2xl px-8 py-12">
        <div class="text-center mb-10">
            <div class="mx-auto flex items-center justify-center">
                <img src="images/Logojob.png" alt="Logo" class="w-20 h-20 object-contain" />
            </div>
            <h2 class="text-3xl font-bold text-sky-600 dark:text-sky-400">Create Account</h2>
            <p class="text-gray-500 dark:text-gray-400 mt-2">Join our community today</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Full Name')" class="mb-2" />
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <x-text-input id="name" class="block w-full pl-10 pr-3 py-3 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 dark:bg-gray-700 dark:text-white placeholder-gray-400" 
                                type="text" name="name" :value="old('name')" required autofocus autocomplete="name" 
                                placeholder="John Doe" />
                </div>
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
            </div>

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
                                type="email" name="email" :value="old('email')" required autocomplete="username" 
                                placeholder="you@example.com" />
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
            </div>

            <!-- Password -->
            <div x-data="{ show: false }">
                <x-input-label for="password" :value="__('Password')" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2" />
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                    </div>

                    <x-text-input id="password"
                        x-bind:type="show ? 'text' : 'password'"
                        name="password"
                        required autocomplete="new-password"
                        placeholder="••••••••"
                        class="block w-full pl-10 pr-10 py-3 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 dark:bg-gray-700 dark:text-white placeholder-gray-400" />

                    <!-- Toggle Button -->
                    <button type="button" @click="show = !show"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">

                        <!-- Eye Open -->
                        <svg x-show="!show" xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="2" />
                            <path d="M3 12c2.5-4 6.5-6 9-6s6.5 2 9 6c-2.5 4-6.5 6-9 6s-6.5-2-9-6z"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <!-- Eye Off -->
                        <svg x-show="show" xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="2" />
                            <path d="M3 12c2.5-4 6.5-6 9-6s6.5 2 9 6c-2.5 4-6.5 6-9 6s-6.5-2-9-6z"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <line x1="4" y1="4" x2="20" y2="20"
                                stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </button>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
            </div>

            <!-- Confirm Password -->
            <div x-data="{ showConfirm: false }">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2" />
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>

                    <x-text-input id="password_confirmation"
                        x-bind:type="showConfirm ? 'text' : 'password'"
                        name="password_confirmation"
                        required autocomplete="new-password"
                        placeholder="••••••••"
                        class="block w-full pl-10 pr-10 py-3 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 dark:bg-gray-700 dark:text-white placeholder-gray-400" />

                    <!-- Toggle Button -->
                    <button type="button" @click="showConfirm = !showConfirm"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">

                        <!-- Eye Open -->
                        <svg x-show="!showConfirm" xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="2" />
                            <path d="M3 12c2.5-4 6.5-6 9-6s6.5 2 9 6c-2.5 4-6.5 6-9 6s-6.5-2-9-6z"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <!-- Eye Off -->
                        <svg x-show="showConfirm" xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="2" />
                            <path d="M3 12c2.5-4 6.5-6 9-6s6.5 2 9 6c-2.5 4-6.5 6-9 6s-6.5-2-9-6z"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <line x1="4" y1="4" x2="20" y2="20"
                                stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </button>
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
            </div>

            <div class="flex items-center justify-between mt-6">
                <a class="text-sm font-medium text-sky-600 dark:text-sky-400 hover:text-sky-500 dark:hover:text-sky-300" href="{{ route('login') }}">
                    {{ __('Already have account?') }}
                </a>

                <button type="submit" class="inline-flex items-center px-4 py-3 border border-transparent rounded-lg shadow-sm text-md font-medium text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500 transition-colors duration-200">
                    {{ __('Register') }}
                    <svg class="ml-2 -mr-1 w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </form>
    </div>
@endsection