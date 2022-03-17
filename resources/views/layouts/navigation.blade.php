<nav class="bg-secondary" x-data="{ menuOpen: false, profileMenuOpen: false }">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button -->
                <button @click="menuOpen = ! menuOpen" type="button"
                    class="inline-flex items-center justify-center p-2 rounded-md hover:outline-none hover:ring-2 hover:ring-inset hover:ring-primary focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only fill-white">Open main menu</span>
                    <!-- outline/menu -->
                    <svg x-show="!menuOpen" class="block h-6 w-6 stroke-white" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- outline/x -->
                    <svg x-show="menuOpen" class="h-6 w-6 stroke-white" style="display:none"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0 flex items-center">
                    <img class="block h-8 w-auto" src="{{ asset('images/logo.svg') }}" alt="Logo">
                </div>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <a href="{{ route('home') }}" class="bg-secondary-dark text-white px-3 py-2 rounded-md text-sm font-medium"
                            aria-current="page">Home</a>
                        <form action="{{ url()->current() }}" method="GET" class="relative w-[20rem]">
                            <x-form.input type="text" name="search" placeholder="Search..."
                                class="placeholder-muted/[0.7]" value="{{ request('search') }}" />
                            <span class="absolute top-1.5 right-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-muted" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </span>
                        </form>
                        {{-- <a href="#"
                            class="text-muted hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Team</a>

                        <a href="#"
                            class="text-muted hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Projects</a>

                        <a href="#"
                            class="text-muted hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Calendar</a> --}}
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                @auth
                    <!-- Profile dropdown -->
                    <div class="ml-3 relative">
                        <div>
                            <button type="button" @click="profileMenuOpen = ! profileMenuOpen"
                                @click.away="profileMenuOpen = false"
                                class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-primary"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full"
                                    src="{{ auth()->user->images ?? asset('images/avator.png') }}" alt="Profile">
                            </button>
                        </div>
                        <div x-show="profileMenuOpen"
                            class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            {{-- TODO: --}}
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 rounded-t-md hover:bg-gray-100"
                                role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button
                                    class="w-full text-left block px-4 py-2 text-sm text-gray-700  rounded-b-md hover:bg-gray-100"
                                    role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</button>
                            </form>
                        </div>
                    </div>
                @endauth
                @guest
                    <div class="ml-3 relative">
                        <a href="{{ route('login') }}" class="text-muted hover:text-white">Login</a>
                    </div>
                @endguest
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="menuOpen" class="sm:hidden" id="mobile-menu" @click.away="menuOpen = false">
        <div class="px-2 pt-2 pb-3 space-y-2">
            <form action="{{ url()->current() }}" method="GET" class="relative w-full">
                <x-form.input type="text" name="search" placeholder="Search..."
                    class="placeholder-muted/[0.7]" value="{{ request('search') }}" />
                <span class="absolute top-1.5 right-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-muted" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </span>
            </form>
            <a href="#" class="bg-secondary-dark text-white block px-3 py-2 rounded-md text-base font-medium"
                aria-current="page">Home</a>
            {{-- <a href="#"
                class="text-muted hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Team</a>

            <a href="#"
                class="text-muted hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Projects</a>

            <a href="#"
                class="text-muted hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Calendar</a> --}}
        </div>
    </div>
</nav>
