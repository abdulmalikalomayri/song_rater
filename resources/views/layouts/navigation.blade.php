<nav x-data="{ open: false }" class="bg-white dark:bg-neutral-800 border-b border-neutral-100 dark:border-neutral-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center dark:bg-white">
                    <a href="{{ route('dashboard') }}">
                        <svg width="150" height="35" viewBox="0 0 455 148" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M454.355 69.5547V78.5391C454.355 89.2161 453.021 98.7865 450.352 107.25C447.682 115.714 443.841 122.908 438.828 128.832C433.815 134.757 427.793 139.281 420.762 142.406C413.796 145.531 405.983 147.094 397.324 147.094C388.926 147.094 381.211 145.531 374.18 142.406C367.214 139.281 361.159 134.757 356.016 128.832C350.938 122.908 346.999 115.714 344.199 107.25C341.4 98.7865 340 89.2161 340 78.5391V69.5547C340 58.8776 341.367 49.3398 344.102 40.9414C346.901 32.4779 350.84 25.2839 355.918 19.3594C360.996 13.3698 367.018 8.8125 373.984 5.6875C381.016 2.5625 388.73 1 397.129 1C405.788 1 413.6 2.5625 420.566 5.6875C427.598 8.8125 433.62 13.3698 438.633 19.3594C443.711 25.2839 447.585 32.4779 450.254 40.9414C452.988 49.3398 454.355 58.8776 454.355 69.5547ZM435.703 78.5391V69.3594C435.703 60.8958 434.824 53.4089 433.066 46.8984C431.374 40.388 428.867 34.9193 425.547 30.4922C422.227 26.0651 418.158 22.7122 413.34 20.4336C408.587 18.1549 403.184 17.0156 397.129 17.0156C391.27 17.0156 385.964 18.1549 381.211 20.4336C376.523 22.7122 372.487 26.0651 369.102 30.4922C365.781 34.9193 363.21 40.388 361.387 46.8984C359.564 53.4089 358.652 60.8958 358.652 69.3594V78.5391C358.652 87.0677 359.564 94.6198 361.387 101.195C363.21 107.706 365.814 113.207 369.199 117.699C372.65 122.126 376.719 125.479 381.406 127.758C386.159 130.036 391.465 131.176 397.324 131.176C403.444 131.176 408.88 130.036 413.633 127.758C418.385 125.479 422.389 122.126 425.645 117.699C428.965 113.207 431.471 107.706 433.164 101.195C434.857 94.6198 435.703 87.0677 435.703 78.5391Z" fill="#222222"/>
                            <path d="M329.645 74.1992V126.25C327.887 128.854 325.087 131.784 321.246 135.039C317.405 138.229 312.099 141.029 305.328 143.438C298.622 145.781 289.964 146.953 279.352 146.953C270.693 146.953 262.717 145.456 255.426 142.461C248.199 139.401 241.917 134.974 236.578 129.18C231.305 123.32 227.203 116.224 224.273 107.891C221.409 99.4922 219.977 89.987 219.977 79.375V68.3398C219.977 57.7279 221.214 48.2552 223.688 39.9219C226.227 31.5885 229.938 24.5247 234.82 18.7305C239.703 12.8711 245.693 8.44401 252.789 5.44922C259.885 2.38932 268.023 0.859375 277.203 0.859375C288.076 0.859375 297.158 2.7474 304.449 6.52344C311.806 10.2344 317.535 15.3776 321.637 21.9531C325.803 28.5286 328.473 36.0156 329.645 44.4141H310.797C309.951 39.2708 308.258 34.5833 305.719 30.3516C303.245 26.1198 299.697 22.7344 295.074 20.1953C290.452 17.5911 284.495 16.2891 277.203 16.2891C270.628 16.2891 264.931 17.4935 260.113 19.9023C255.296 22.3112 251.324 25.7617 248.199 30.2539C245.074 34.7461 242.73 40.1823 241.168 46.5625C239.671 52.9427 238.922 60.1367 238.922 68.1445V79.375C238.922 87.5781 239.866 94.9023 241.754 101.348C243.707 107.793 246.474 113.294 250.055 117.852C253.635 122.344 257.9 125.762 262.848 128.105C267.861 130.449 273.395 131.621 279.449 131.621C286.155 131.621 291.591 131.068 295.758 129.961C299.924 128.789 303.18 127.422 305.523 125.859C307.867 124.232 309.658 122.702 310.895 121.27V89.4336H277.984V74.1992H329.645Z" fill="#222222"/>
                            <path d="M210.355 69.5547V78.5391C210.355 89.2161 209.021 98.7865 206.352 107.25C203.682 115.714 199.841 122.908 194.828 128.832C189.815 134.757 183.793 139.281 176.762 142.406C169.796 145.531 161.983 147.094 153.324 147.094C144.926 147.094 137.211 145.531 130.18 142.406C123.214 139.281 117.159 134.757 112.016 128.832C106.938 122.908 102.999 115.714 100.199 107.25C97.3997 98.7865 96 89.2161 96 78.5391V69.5547C96 58.8776 97.3672 49.3398 100.102 40.9414C102.901 32.4779 106.84 25.2839 111.918 19.3594C116.996 13.3698 123.018 8.8125 129.984 5.6875C137.016 2.5625 144.73 1 153.129 1C161.788 1 169.6 2.5625 176.566 5.6875C183.598 8.8125 189.62 13.3698 194.633 19.3594C199.711 25.2839 203.585 32.4779 206.254 40.9414C208.988 49.3398 210.355 58.8776 210.355 69.5547ZM191.703 78.5391V69.3594C191.703 60.8958 190.824 53.4089 189.066 46.8984C187.374 40.388 184.867 34.9193 181.547 30.4922C178.227 26.0651 174.158 22.7122 169.34 20.4336C164.587 18.1549 159.184 17.0156 153.129 17.0156C147.27 17.0156 141.964 18.1549 137.211 20.4336C132.523 22.7122 128.487 26.0651 125.102 30.4922C121.781 34.9193 119.21 40.388 117.387 46.8984C115.564 53.4089 114.652 60.8958 114.652 69.3594V78.5391C114.652 87.0677 115.564 94.6198 117.387 101.195C119.21 107.706 121.814 113.207 125.199 117.699C128.65 122.126 132.719 125.479 137.406 127.758C142.159 130.036 147.465 131.176 153.324 131.176C159.444 131.176 164.88 130.036 169.633 127.758C174.385 125.479 178.389 122.126 181.645 117.699C184.965 113.207 187.471 107.706 189.164 101.195C190.857 94.6198 191.703 87.0677 191.703 78.5391Z" fill="#222222"/>
                            <path d="M86.2305 127.855V143.188H15.1367V127.855H86.2305ZM18.8477 1V143.188H0V1H18.8477Z" fill="#222222"/>
                        </svg>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>
            @auth
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-neutral-500 dark:text-neutral-400 bg-white dark:bg-neutral-800 hover:text-neutral-700 dark:hover:text-neutral-300 focus:outline-none transition ease-in-out duration-150">
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
            @endauth
            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-neutral-400 dark:text-neutral-500 hover:text-neutral-500 dark:hover:text-neutral-400 hover:bg-neutral-100 dark:hover:bg-neutral-900 focus:outline-none focus:bg-neutral-100 dark:focus:bg-neutral-900 focus:text-neutral-500 dark:focus:text-neutral-400 transition duration-150 ease-in-out">
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
        @auth
        <div class="pt-4 pb-1 border-t border-neutral-200 dark:border-neutral-600">
            <div class="px-4">
                <div class="font-medium text-base text-neutral-800 dark:text-neutral-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-neutral-500">{{ Auth::user()->email }}</div>
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
        @endauth
    </div>
</nav>
