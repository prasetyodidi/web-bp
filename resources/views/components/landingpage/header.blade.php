<div>
    <header
        class="z-20 fixed top-0 left-0 right-0 flex flex-row px-4 py-2 justify-between bg-white lg:h-auto min-h-[40px]"
        id="header">
        <button id="nav-toggle" class="lg:hidden fixed text-lg text-third-blue focus:outline-none top-2 right-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
            </svg>
        </button>
        <div class="hidden sm:block lg:w-12 lg:mr-12"></div>
        <nav id="nav-menu" class="hidden lg:flex flex-grow items-center justify-center gap-3">
            <div class="group flex flex-col items-center">
                <a href="#" class="text-lg text-third-blue">Home</a>
                <span class="w-0 h-1 bg-third-blue group-hover:w-full transition ease-in-out duration-300"></span>
            </div>
            <div class="group flex flex-col items-center">
                <a href="#" class="text-lg text-third-blue">Service</a>
                <span class="w-0 h-1 bg-third-blue group-hover:w-full transition ease-in-out duration-300"></span>
            </div>
            <div class="group flex flex-col items-center">
                <a href="#" class="text-lg text-third-blue">Our Works</a>
                <span class="w-0 h-1 bg-third-blue group-hover:w-full transition ease-in-out duration-300"></span>
            </div>
            <div class="group flex flex-col items-center">
                <a href="#" class="text-lg text-third-blue">About us</a>
                <span class="w-0 h-1 bg-third-blue group-hover:w-full transition ease-in-out duration-300"></span>
            </div>
        </nav>
        <div class="justify-end hidden lg:flex">
            @auth
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                     class="w-12 text-primary-blue">
                    <path fill-rule="evenodd"
                          d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                          clip-rule="evenodd"/>
                </svg>
            @endauth
            @guest
                <button type="button" class="w-24 h-10 rounded-full bg-secondary-blue">
                    <a href="{{ route('login') }}" class="text-xl font-bold text-center text-white">Log In</a>
                </button>
            @endguest
        </div>
    </header>
</div>
<script>
    document.getElementById('nav-toggle').addEventListener('click', function () {
        let navMenu = document.getElementById('nav-menu');
        let header = document.getElementById('header');
        if (navMenu.classList.contains('hidden')) {
            navMenu.classList.remove('hidden');
            navMenu.classList.add('flex', 'flex-col', 'items-center', 'gap-3');
            header.classList.add('h-screen');
            this.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />`;
        } else {
            navMenu.classList.remove('flex', 'flex-col', 'items-center', 'gap-3');
            navMenu.classList.add('hidden');
            header.classList.remove('h-screen');
            this.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
            </svg>`
        }
    });
</script>

