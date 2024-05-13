<header class="z-20 fixed top-0 left-0 right-0 flex flex-row px-4 py-2 items-center justify-between bg-white">
    <div class="w-12 mr-12"></div>
    <nav class="flex flex-grow items-center justify-center gap-3">
        <div class="group flex flex-col items-center">
            <a href="#" class="text-lg text-third-blue">
                Home
            </a>
            <span class="w-0 h-1 bg-third-blue group-hover:w-full transition ease-in-out duration-300"></span>
        </div>
        <div class="group flex flex-col items-center">
            <a href="#" class="text-lg text-third-blue">
                Service
            </a>
            <span class="w-0 h-1 bg-third-blue group-hover:w-full transition ease-in-out duration-300"></span>
        </div>
        <div class="group flex flex-col items-center">
            <a href="#" class="text-lg text-third-blue">
                Our Works
            </a>
            <span class="w-0 h-1 bg-third-blue group-hover:w-full transition ease-in-out duration-300"></span>
        </div>
        <div class="group flex flex-col items-center">
            <a href="#" class="text-lg text-third-blue">
                About us
            </a>
            <span class="w-0 h-1 bg-third-blue group-hover:w-full transition ease-in-out duration-300"></span>
        </div>
    </nav>
    {{-- <x-heroicon-s-user-circle class="w-12 text-primary-blue"/> --}}
    <div class="justify-end">
        @auth
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-12 text-primary-blue">
            <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
        </svg>
        @endauth
        @guest
    <button type="button" class="w-24 h-10 rounded-full bg-secondary-blue">
        <a href="{{ route('login') }}" class="text-xl font-bold text-center text-white">Log In</a>
    </button>
    @endguest
    </div>
</header>