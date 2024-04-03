<?php

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

use function Livewire\Volt\layout;
use function Livewire\Volt\rules;
use function Livewire\Volt\state;

layout('layouts.base');

state(['email' => '', 'password' => '', 'remember' => false]);

rules([
    'email' => ['required', 'string', 'email'],
    'password' => ['required', 'string'],
    'remember' => ['boolean'],
]);

$login = function () {
    $this->validate();

    $throttleKey = Str::transliterate(Str::lower($this->email) . '|' . request()->ip());

    if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($throttleKey);

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    if (!auth()->attempt($this->only(['email', 'password'], $this->remember))) {
        RateLimiter::hit($throttleKey);

        throw ValidationException::withMessages([
            'email' => trans('auth.failed'),
        ]);
    }

    RateLimiter::clear($throttleKey);

    session()->regenerate();

    $this->redirect(session('url.intended', RouteServiceProvider::HOME), navigate: true);
};

?>

{{-- <div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="login">
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="password" id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember" class="inline-flex items-center">
                <input wire:model="remember" id="remember" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}" wire:navigate>
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</div> --}}

<main class="flex flex-row h-screen overflow-hidden">
    <div class="w-3/5 flex flex-col items-center px-8 bg-primary-blue pt-12">
        <div class="flex flex-col gap-4 text-white">
            <h1 class="text-4xl font-semibold">Welcome to bakaranrpoject</h1>
            <div class="flex flex-col items-center text-md">
                <span>Lorem ipsum dolor sit amet,</span>
                <span>consectetur adipiscing elit, sed do </span>
            </div>
        </div>
        <img src="/images/hero-image.png" alt="image" class="w-full h-auto" />
    </div>
    <div class="w-2/5 bg-white flex flex-col items-center px-8 pt-12 font-semibold gap-8">
        <div class="flex flex-col items-center gap-4">
            <h1 class="text-4xl text-primary-blue">Hello Again</h1>
            <div class="flex flex-col text-slate-400 items-center">
                <span>Lorem ipsum dolor sit amet,</span>
                <span>consectetur adipiscing elit, sed do </span>
            </div>
        </div>
        <form class="flex flex-col w-full gap-4" wire:submit.prevent="login">
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <input wire:model="email" type="email" id="email" name="email" placeholder="Email"
                class="rounded-full bg-slate-100 px-4 py-2 text-primary-blue focus:outline-none focus:border-primary-blue focus:ring-2 focus:ring-primary-blue">
            <x-input-error :messages="$errors->get('email')"/>
            <input wire:model="password" type="password" id="password" name="password" placeholder="Password"
                class="rounded-full bg-slate-100 px-4 py-2 text-primary-blue focus:outline-none focus:border-primary-blue focus:ring-2 focus:ring-primary-blue">
            <x-input-error :messages="$errors->get('password')" />
            <div class="flex flex-row justify-between text-primary-blue">
                <label for="isRemember">
                    <input wire:model="isRemember" type="checkbox" id="isRemember" name="isRemember">
                    Remember me?
                </label>
                <a href="#">Forgot password?</a>
            </div>
            <button type="submit" class="bg-primary-blue rounded-full py-2 text-white">Login</button>
            <button type="button" class="border-primary-blue border-2 py-2 rounded-full text-primary-blue">
                Sign in with Google
            </button>
            <span class="text-primary-blue text-center">
                Don’t have an account, <a href="#">register here.</a>
            </span>
        </form>
    </div>
</main>
