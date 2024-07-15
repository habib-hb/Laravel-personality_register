<nav x-data="{ open: false }" id="profile_nav" class="bg-slate-50   ">
        {{-- dark:bg-gray-800 dark:border-gray-700 --}}
    <!-- Primary Navigation Menu -->
    <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8" style="box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);">
        <div class="flex justify-end h-16">
                <div class="absolute top-2 left-0 right-0 w-full ">
                <!-- Logo -->
                <div class=" flex items-center justify-center w-full">

                        {{-- <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" /> --}}

                        <img id="dark_mode_logo" class="cursor-pointer hidden" src="{{ asset('files/images/dark_mode_logo.png') }}" width="88px" alt="Pic">

                        <img id="light_mode_logo" class="cursor-pointer" src="{{ asset('files/images/light_mode_logo.png') }}" width="88px" alt="Pic">

                </div>
                <!-- Navigation Links -->
                {{-- <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div> --}}
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button id="profile_dropdown_button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  bg-white  hover:text-gray-700  focus:outline-none transition ease-in-out duration-150">
                            {{-- dark:text-gray-400  dark:bg-gray-800  dark:hover:text-gray-300--}}
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden z-10">
                <button id="profile_hamburger" @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400  hover:text-gray-500  hover:bg-gray-100  focus:outline-none focus:bg-gray-100  focus:text-gray-500  transition duration-150 ease-in-out">
                    {{-- dark:hover:bg-gray-900 dark:hover:text-gray-400 dark:focus:text-gray-400 dark:focus:bg-gray-900 dark:focus:text-gray-400 dark:text-gray-500  --}}
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div id="profile_dropdown_mobile" class="pt-4 pb-1 border-t border-gray-200 ">
            {{-- dark:border-gray-600 --}}
            <div class="px-4">
                <div id="profile_dropdown_mobile_name" class="font-medium text-base text-gray-800 ">{{ Auth::user()->name }}</div>
                {{-- dark:text-gray-200 --}}

                <div id="profile_dropdown_mobile_email" class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>

            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
