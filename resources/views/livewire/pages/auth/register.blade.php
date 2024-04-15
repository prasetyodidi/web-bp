<?php

use App\Models\User;
use Illuminate\Validation\Rules;
use function Livewire\Volt\rules;
use function Livewire\Volt\state;
use function Livewire\Volt\layout;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

layout('layouts.base');

state([
    'name' => '',
    'email' => '',
    'birth_date' => '',
    'address' => '',
    'phone' => '',
    'profession' => '',
    'password' => '',
    'password_confirmation' => '',
]);

rules([
    'name' => ['required', 'string', 'max:255'],
    'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
    'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
    'birth_date' => ['required', 'date'],
    'address' => ['required', 'string', 'max:255'],
    'phone' => ['required', 'numeric', 'min:10'],
    'profession' => ['required', 'string', 'max:255']
    
]); 

$register = function () {
    $validated = $this->validate();

    $validated['password'] = Hash::make($validated['password']);

    event(new Registered(($user = User::create($validated))));

    auth()->login($user);

    $this->redirect('/verify-email');
};

?>

{{-- <div>
    <form wire:submit="register">
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        
        <!-- Birth Date -->
        <div class="mt-4">
            <x-input-label for="birth_date" :value="__('Birth date')" />
            <x-text-input wire:model="birth_date" id="birth_date" class="block mt-1 w-full" type="date" name="birth_date" required />
            <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input wire:model="address" id="address" class="block mt-1 w-full" type="text" name="address" required />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input wire:model="phone" id="phone" class="block mt-1 w-full" type="tel" name="phone" required />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>
        
        <!-- Profession -->
        <div class="mt-4">
            <x-input-label for="profession" :value="__('Profession')" />
            <x-text-input wire:model="profession" id="profession" class="block mt-1 w-full" type="text" name="profession" required />
            <x-input-error :messages="$errors->get('profession')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="password" id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div> --}}

<!-- resources/views/livewire/register-page.volt -->

<main class="flex flex-row h-screen">
    <div class="w-3/5 flex flex-col items-center px-8 bg-primary-blue pt-12">
        <div class="flex flex-col gap-4 text-white">
            <h1 class="text-4xl font-semibold">Welcome to bakaranrpoject</h1>
            <div class="flex flex-col items-center text-md">
                <span>Lorem ipsum dolor sit amet,</span>
                <span>consectetur adipiscing elit, sed do </span>
            </div>
        </div>
        <img src="/images/hero-image.png" alt="image" />
    </div>
    <div class="w-2/5 bg-white flex flex-col items-center px-8 pt-12 font-semibold gap-8">
        <div class="flex flex-col items-center gap-4">
            <h1 class="text-4xl text-primary-blue">Hello</h1>
            <div class="flex flex-col text-slate-400 items-center">
                <span>Lorem ipsum dolor sit amet,</span>
                <span>consectetur adipiscing elit, sed do </span>
            </div>
        </div>
        <form class="flex flex-col w-full gap-4" wire:submit.prevent="register">
            <input wire:model="name" type="text" id="name" name="name" placeholder="Name"
                class="rounded-full bg-slate-100 px-4 py-2 text-primary-blue focus:outline-none focus:border-primary-blue focus:ring-2 focus:ring-primary-blue">
            <input wire:model="email" type="email" id="email" name="email" placeholder="Email"
                class="rounded-full bg-slate-100 px-4 py-2 text-primary-blue focus:outline-none focus:border-primary-blue focus:ring-2 focus:ring-primary-blue">
            <input wire:model="password" type="password" id="password" name="password" placeholder="Password"
                class="rounded-full bg-slate-100 px-4 py-2 text-primary-blue focus:outline-none focus:border-primary-blue focus:ring-2 focus:ring-primary-blue">
            <input wire:model="confirmPassword" type="password" id="confirmPassword" name="confirmPassword"
                placeholder="Confirm password"
                class="rounded-full bg-slate-100 px-4 py-2 text-primary-blue focus:outline-none focus:border-primary-blue focus:ring-2 focus:ring-primary-blue">
            <button type="submit" class="bg-primary-blue rounded-full py-2 text-white">Register</button>
            <button type="button" class="border-primary-blue border-2 py-2 rounded-full text-primary-blue">
                Sign in with Google
            </button>
            <span class="text-primary-blue text-center">
                Already have an account, <a href="#">Login here.</a>
            </span>
        </form>
    </div>
</main>
