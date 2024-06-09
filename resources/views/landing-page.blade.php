<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bakaran Project</title>
    <link rel="shortcut icon" href="/images/ico.svg" type="image/x-icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
<main class="relative flex min-h-screen flex-col bg-white">
    <div class="w-full min-h-screen flex flex-row justify-center items-center bg-primary-blue rounded-b-[24px]">
        @include('components.landingpage.header')
        <div class='absolute top-4 flex flex-col items-center gap-4'>
            <h1 class='mt-20 text-center text-4xl text-white hover:cursor-pointer'>A Digital Team That Make<br>Everything
                <span class='underline decoration-4 text-primary-green decoration-primary-green'>Creatively</span></h1>
            <button class='bg-blue-400 text-white px-6 py-2 rounded-full'>Learn More</button>
        </div>
        <img src="/images/hero-image.png" alt="hero image"/>
    </div>
    @include('components.landingpage.services')
    @include('components.landingpage.our-works')
    @include('components.landingpage.our-teams')
    @include('components.landingpage.footer')
    {{-- <ServicesSection />
    <OurWorksSection />
    <OurTeamsSection />
    <Footer /> --}}
</main>
</body>
</html>
