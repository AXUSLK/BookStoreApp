<section class="sticky bg-white z-50 top-0 py-4 nav opacity-100 shadow" id="top">
    <div class="px-4 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8" style="">
        <div class="">

            <div class="relative " x-data="Components.popover({ open: true, focus: true })" x-init="init()" @keydown.escape="onEscape"
                @close-popover-group.window="onClosePopoverGroup">
                <div class="flex justify-between items-center px-4 sm:px-6 md:justify-start md:space-x-10">
                    <div class="flex justify-start lg:w-0 lg:flex-1">
                        <a href="#">
                            <span class="sr-only">Online Book Store - WrightWay</span>
                            <x-application-logo
                                class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                        </a>
                    </div>

                    <div class="-mr-2 -my-2 md:hidden">
                        <button type="button"
                            class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                            @click="toggle" @mousedown="if (open) $event.preventDefault()" aria-expanded="false"
                            :aria-expanded="open.toString()">
                            <span class="sr-only">Open menu</span>
                            <svg class="h-6 w-6" x-description="Heroicon name: outline/menu"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>

                    <nav class="hidden md:flex space-x-10" x-data="Components.popoverGroup()" x-init="init()">
                        <a href="{{ route('home') }}" aria-label="Home" title="Home"
                            class="font-medium tracking-wide text-gray-700 hover:text-gray-900 transition-colors duration-200">
                            Home
                        </a>

                        <a href="{{ route('shop') }}" aria-label="Contact Us" title="Contact Us"
                            class="font-medium tracking-wide text-gray-700 hover:text-gray-900 transition-colors duration-200">
                            Shop
                        </a>

                    </nav>

                    <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
                        @if (Auth::check())
                            <!-- Cart -->
                            <div class="mr-4 flow-root text-sm lg:relative lg:ml-8" x-data="Components.popover({ open: false, focus: false })"
                                x-init="init()" @keydown.escape="onEscape"
                                @close-popover-group.window="onClosePopoverGroup">
                                <button type="button" class="group -m-2 p-2 flex items-center" @click="toggle"
                                    @mousedown="if (open) $event.preventDefault()" aria-expanded="false"
                                    :aria-expanded="open.toString()">
                                    <svg class="flex-shrink-0 h-6 w-6 text-gray-700 group-hover:text-gray-900"
                                        x-description="Heroicon name: outline/shopping-bag"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                    </svg>
                                    <span
                                        class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-900">{{ session('cart') ? count((array) session('cart')) : 0 }}</span>
                                    <span class="sr-only">items in cart, view bag</span>
                                </button>

                                <div x-show="open" x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                    class="absolute top-16 inset-x-0 mt-px pb-6 bg-white shadow-lg sm:px-2 lg:top-full lg:left-auto lg:right-0 lg:mt-3 lg:-mr-1.5 lg:w-80 lg:rounded-lg lg:ring-1 lg:ring-black lg:ring-opacity-5"
                                    x-ref="panel" @click.away="open = false">
                                    <h2 class="sr-only">Shopping Cart</h2>







                                </div>

                            </div>

                            <!-- Profile dropdown -->
                            <div x-data="Components.menu({ open: false })" x-init="init()"
                                @keydown.escape.stop="open = false; focusButton()" @click.away="onClickAway($event)"
                                class="ml-3 relative">
                                <div>
                                    <button type="button"
                                        class="bg-white rounded-full flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        id="user-menu-button" x-ref="button" @click="onButtonClick()"
                                        @keyup.space.prevent="onButtonEnter()" @keydown.enter.prevent="onButtonEnter()"
                                        aria-expanded="false" aria-haspopup="true"
                                        x-bind:aria-expanded="open.toString()" @keydown.arrow-up.prevent="onArrowUp()"
                                        @keydown.arrow-down.prevent="onArrowDown()">
                                        <span class="sr-only">Open user menu</span>
                                        <img class="h-8 w-8 rounded-full" alt=""
                                            src="{{ 'https://ui-avatars.com/api/name=' . Auth::user()->first_name . '+' . Auth::user()->last_name . '&?background=fff&color=3f51b5&font-size=0.5&size=256' }}">
                                    </button>
                                </div>

                                <div x-show="open" x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                    class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    x-ref="menu-items" x-description="Dropdown menu, show/hide based on menu state."
                                    x-bind:aria-activedescendant="activeDescendant" role="menu"
                                    aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"
                                    @keydown.arrow-up.prevent="onArrowUp()"
                                    @keydown.arrow-down.prevent="onArrowDown()" @keydown.tab="open = false"
                                    @keydown.enter.prevent="open = false; focusButton()"
                                    @keyup.space.prevent="open = false; focusButton()">
                                    <a class="block px-4 py-2 text-sm text-gray-700" x-state:on="Active"
                                        x-state:off="Not Active" :class="{ 'bg-gray-100': activeIndex === 0 }"
                                        role="menuitem" tabindex="-1" id="user-menu-item-0"
                                        @mouseenter="activeIndex = 0" @mouseleave="activeIndex = -1"
                                        @click="open = false; focusButton()">
                                        <span
                                            class="px-2">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</span>
                                    </a>
                                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700"
                                        :class="{ 'bg-gray-100': activeIndex === 3 }" role="menuitem" tabindex="-1"
                                        id="user-menu-item-3" @mouseenter="activeIndex = 3"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        @mouseleave="activeIndex = -1" @click="open = false; focusButton()">
                                        <i class="icon-switch mx-2"></i>Sign out
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}"
                                class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">
                                Sign in
                            </a>
                            <a href="{{ route('register') }}"
                                class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                                Sign up
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Mobile menu, show/hide based on mobile menu state -->
                <div x-show="open" x-transition:enter="duration-200 ease-out"
                    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="duration-100 ease-in" x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    x-description="Mobile menu, show/hide based on mobile menu state."
                    class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden"
                    x-ref="panel" @click.away="open = false">
                    <div
                        class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
                        <div class="pt-5 pb-6 px-5">
                            <div class="flex items-center justify-between">
                                <div>
                                    <img src="log" alt="">
                                </div>
                                <div class="-mr-2">
                                    <button type="button"
                                        class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                                        @click="toggle">
                                        <span class="sr-only">Close menu</span>
                                        <svg class="h-6 w-6" x-description="Heroicon name: outline/x"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="mt-6">
                                <nav class="grid grid-cols-1 gap-4">

                                    <a href="{{ route('home') }}"
                                        class="-m-3 p-3 flex items-center rounded-lg hover:bg-gray-50">
                                        <div
                                            class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white">
                                            <svg class="h-6 w-6" x-description="Heroicon name: outline/chart-bar"
                                                fill="none" stroke="currentColor" stroke-width="1.5"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="ml-4 text-base font-medium text-gray-900">
                                            Home
                                        </div>
                                    </a>

                                    <a href="{{ route('shop') }}"
                                        class="-m-3 p-3 flex items-center rounded-lg hover:bg-gray-50">
                                        <div
                                            class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white">
                                            <svg class="h-6 w-6" x-description="Heroicon name: outline/cursor-click"
                                                fill="none" stroke="currentColor" stroke-width="1.5"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="ml-4 text-base font-medium text-gray-900">
                                            Shop
                                        </div>
                                    </a>
                                </nav>
                            </div>
                        </div>
                        <div class="py-3 px-5">
                            @if (Auth::check())
                                <div class="grid grid-cols-1 gap-4">
                                    <a href="{{ route('home') }}"
                                        class="text-base bg-indigo-50 text-center p-2 font-medium text-gray-900 hover:text-gray-700">
                                        <i class="icon-stats-bars3 px-4"></i> Home
                                    </a>
                                </div>

                                <div class="mt-6">







                                </div>

                                <div class="mt-6">
                                    <p class="mt-6 text-center text-base font-medium text-gray-500">
                                        Do you want to leave?
                                        <!-- space -->
                                        <a href="#" class="text-indigo-600 hover:text-indigo-500"
                                            onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();">
                                            Sign out
                                        </a>

                                    <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                    </p>
                                </div>
                            @else
                                <div class="grid grid-cols-2 gap-4">
                                    <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                                        Pricing
                                    </a>












                                </div>

                                <div class="mt-6">
                                    <a href="{{ route('register') }}"
                                        class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                                        Sign up
                                    </a>
                                    <p class="mt-6 text-center text-base font-medium text-gray-500">
                                        Existing customer?
                                        <!-- space -->
                                        <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-500">
                                            Sign in
                                        </a>
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
