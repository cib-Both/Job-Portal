@extends('layouts.account')

@section('content')
<div class="max-w-md mx-auto bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden md:max-w-2xl px-8 py-12">
    <div class="text-center mb-8">
        <div class="mx-auto w-16 h-16 bg-sky-100 dark:bg-sky-900/30 rounded-full flex items-center justify-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-sky-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
        </div>
        <h2 class="text-3xl font-bold text-sky-600 dark:text-sky-400">Reset Password</h2>
        <p class="text-gray-500 dark:text-gray-400 mt-4 mb-6">
            {{ __('Forgot your password? No problem. Just enter your email and we\'ll send you a reset link.') }}
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-6 p-4 bg-sky-50 dark:bg-sky-900/30 text-sky-800 dark:text-sky-200 rounded-lg border border-sky-100 dark:border-sky-800" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Address')" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                    </svg>
                </div>
                <x-text-input id="email" class="block w-full pl-10 pr-3 py-3 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 dark:bg-gray-700 dark:text-white placeholder-gray-400" 
                            type="email" name="email" :value="old('email')" required autofocus 
                            placeholder="you@example.com" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
        </div>

        <div class="pt-2">
            <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500 transition-colors duration-200">
                {{ __('Send Reset Link') }}
                <svg class="ml-2 -mr-1 w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                </svg>
            </button>
        </div>
    </form>

    <div class="mt-6 text-center">
        <a href="{{ route('login') }}" class="text-sm font-medium text-sky-600 dark:text-sky-400 hover:text-sky-500 dark:hover:text-sky-300">
            &larr; {{ __('Back to login') }}
        </a>
    </div>
</div>
@endsection