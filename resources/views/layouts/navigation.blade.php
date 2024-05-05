<nav x-data="{ open: false }" class="bg-white dark:bg-neutral-800 border-b border-neutral-100 dark:border-neutral-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center ">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset('svg/LOGO.svg') }}" alt="logo" class="h-8 w-auto sm:h-10 ">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('leaderboard')" :active="request()->routeIs('leaderboard')">
                        {{ __('Leaderboard') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Login/Register Links -->
            @guest
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                    {{ __('Login') }}
                </x-nav-link>

                <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                    {{ __('Register') }}
                </x-nav-link>
             </div>
            @endguest

            <!-- Settings Dropdown -->
            @auth
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <!-- ... -->
                </x-dropdown>
            </div>
            @endauth

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <!-- ... -->
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <!-- ... -->
</nav>