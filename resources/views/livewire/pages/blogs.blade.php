<?php

use function Livewire\Volt\{state, layout};

layout('layouts.base');

state([
    'categories' => [['name' => 'Latest'], ['name' => 'Design'], ['name' => 'Website'], ['name' => 'Tech']],
    'post' => [
        'title' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.',
        'categories' => [['name' => 'Programming'], ['name' => 'Website'], ['name' => 'Tech']],
        'owner' => 'Bakaran Project',
        'createdAt' => '20 January 2022',
        'cover' => '/laptop.png', // Assuming the image is in the public directory
    ],
]);

?>

<!-- resources/views/livewire/blog-page.volt -->

<main class="relative flex flex-col gap-6 px-12 min-h-screen bg-white text-primary-blue pt-16">
    <div class="fixed top-0 left-0 right-0 bg-white flex flex-row justify-between h-16 items-center px-6">
        <div></div>
        <nav class="flex flex-row gap-3 font-semibold">
            <span>Home</span>
            <span>Service</span>
            <span>Our Service</span>
            <span>Our Works</span>
            <span>About us</span>
        </nav>
        <button class="rounded-full bg-secondary-blue text-white px-6 py-2">Log In</button>
    </div>

    <h1 class="text-center text-4xl font-semibold">Blog Site</h1>

    <div class="flex flex-row gap-4 justify-center">
        @foreach ($categories as $item)
            <button
                class="px-6 border-2 font-semibold border-primary-blue text-primary-blue rounded-full">{{ item['name'] }}</button>
        @endforeach
    </div>

    <div class="flex flex-row gap-4">
        <img src="{{ asset(post['cover']) }}" alt="laptop" />
        <div class="flex flex-col">
            <span class="font-semibold text-lg">{{ post['owner'] }} {{ post['createdAt'] }}</span>
            <h1 class="text-2xl font-bold">{{ post['title'] }}</h1>
            <p class="text-slate-400">{{ post['description'] }}</p>
            <div class="flex flex-row gap-2">
                {% for category in post['categories'] %}
                <button class="bg-secondary-blue rounded-md px-6 py-1 text-white">{{ category['name'] }}</button>
                {% endfor %}
            </div>
        </div>
    </div>

    <div class="grid grid-cols-3 gap-3">
        {% for post in posts %}
        <div class="flex flex-col gap-2">
            <img src="{{ asset(post['cover']) }}" alt="cover" />
            <span class="font-semibold">{{ post['owner'] }} <span
                    class="font-normal">{{ post['createdAt'] }}</span></span>
            <h1 class="text-2xl font-bold">{{ post['title'] }}</h1>
            <p class="text-slate-400">{{ post['description'] }}</p>
            <div class="flex flex-row gap-2">
                {% for category in post['categories'] %}
                <button class="bg-secondary-blue rounded-md px-6 py-1 text-white">{{ category['name'] }}</button>
                {% endfor %}
            </div>
        </div>
        {% endfor %}
    </div>
</main>
