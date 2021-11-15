<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('images/logo.webp') }}" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Andada+Pro:wght@400;700&family=Dancing+Script&family=Exo+2&family=Lato:wght@300;400;700&family=Roboto+Condensed:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jQueryLibraries.js') }}"></script>
    @livewireStyles()
</head>

<body class="bg-gray-50 font-rbt antialiased text-gray-700" x-data="{ sidebarOpened: false }">
    {{-- Navbar --}}
    @php
        $cart_counter = auth()->user()?->carts()?->count();
    @endphp
    <nav class="bg-white shadow-lg py-4 sm:py-2 px-4 2xl:px-0">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <a href="{{ route('index') }}" class="items-center hidden sm:flex">
                <img src="{{ asset('images/logo.webp') }}" class="w-16 h-16 object-contain" />
                <div class="flex flex-col ml-2">
                    <span class="font-handwriting text-2xl">{{ config('app.name') }}</span>
                    <span class="font-serif text-gray-500 text-xs italic">Dagangan UMKM Indonesia!</span>
                </div>
            </a>

            <form method="get" autocomplete="off" class="flex">
                @csrf
                <input placeholder="Cari produk" type="text" name="search" id="search"
                    class="py-1 sm:py-2 text-sm rounded-l border border-gray-300 shadow focus:border focus:ring-4 focus:ring-blue-700 focus:ring-opacity-25 focus:border-blue-500" />
                <x-button type="submit" class="rounded-l-none shadow">
                    <i class="fas fa-search"></i>
                </x-button>
            </form>

            <div class="text-sm tracking-wide flex items-center">
                <div class="hidden sm:flex">
                    @guest
                        <div class="flex items-center">
                            <a href="{{ route('login') }}">Masuk</a>
                            <div class="h-4 border-r border-gray-500 mx-2"></div>
                            <a href="{{ route('register') }}">Daftar</a>
                        </div>
                    @else
                        <div class="flex items-center">
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <a href="javascript:void(0)" class="flex items-center">
                                        {{ auth()->user()->name }}
                                        <i class="fas fa-user-circle text-lg ml-2"></i>
                                    </a>
                                </x-slot>

                                <x-slot name="content">
                                    @if (auth()->user()->form_order)
                                        <x-dropdown-link :href="route('auth_redirector')">
                                            Toko
                                        </x-dropdown-link>
                                    @endif
                                    @if (auth()->user()->role == 'admin')
                                        <x-dropdown-link :href="route('auth_redirector')">
                                            Dashboard
                                        </x-dropdown-link>
                                    @endif
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                            Keluar
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>

                            <div class="h-6 border-r mx-2 border-gray-500"></div>

                            <a href="{{ route('cart.index') }}">
                                <i class="fas fa-shopping-cart"></i>
                                Keranjang ({{ $cart_counter }})
                            </a>
                        </div>
                    @endguest
                </div>

                <button x-on:click="sidebarOpened = !sidebarOpened" class="flex sm:hidden">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </nav>
    {{-- /Navbar --}}

    {{-- Sidebar --}}
    <div x-show="sidebarOpened"
        x-cloak
        x-on:click="sidebarOpened = false"
        x-transition:enter="transition ease-in-out duration-500"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-50"
        x-transition:leave="transition ease-in-out duration-500"
        x-transition:leave-start="opacity-50"
        x-transition:leave-end="opacity-0"
        class="fixed bg-black opacity-50 h-full w-full top-0 left-0 z-50">
    </div>
    <nav x-show="sidebarOpened"
        x-cloak
        x-transition:enter="transition ease-in-out duration-500"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in-out duration-500"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="fixed w-9/12 h-screen max-h-screen top-0 right-0 overflow-y-auto bg-white shadow z-50
    ">
        <div class="flex flex-col">
            <a href="{{ route('index') }}" class="flex items-center px-3 py-2 border-b">
                <img src="{{ asset('images/logo.webp') }}" class="w-16 h-16 object-contain" />
                <div class="flex flex-col ml-2">
                    <span class="font-handwriting text-2xl">{{ config('app.name') }}</span>
                    <span class="font-serif text-gray-500 text-xs italic">Dagangan UMKM Indonesia!</span>
                </div>
            </a>

            <div class="flex flex-col">
                @guest
                    <a href="{{ route('register') }}" class="transition ease-in-out duration-300 py-2 px-3 hover:bg-gray-100 border-b">
                        <i class="fab fa-wpforms mr-2 w-6"></i>
                        <span>
                            Daftar
                        </span>
                    </a>
                    <a href="{{ route('about') }}" class="transition ease-in-out duration-300 py-2 px-3 hover:bg-gray-100 border-b">
                        <i class="fas fa-info mr-2 w-6"></i>
                        <span>
                            Tentang
                        </span>
                    </a>
                    <a href="{{ route('policy') }}" class="transition ease-in-out duration-300 py-2 px-3 hover:bg-gray-100 border-b">
                        <i class="fas fa-file-contract mr-2 w-6"></i>
                        <span>
                            Kebijakan
                        </span>
                    </a>
                    <a href="{{ route('contact') }}" class="transition ease-in-out duration-300 py-2 px-3 hover:bg-gray-100 border-b">
                        <i class="fas fa-address-book mr-2 w-6"></i>
                        <span>
                            Kontak
                        </span>
                    </a>
                    <a href="{{ route('login') }}" class="transition ease-in-out duration-300 py-2 px-3 hover:bg-gray-100">
                        <i class="fas fa-sign-in-alt mr-2 w-6"></i>
                        <span>
                            Login
                        </span>
                    </a>
                @else
                    @if (auth()->user()->store)
                        <a href="{{ route('auth_redirector') }}" class="transition ease-in-out duration-300 py-2 px-3 border-b hover:bg-gray-100">
                            <i class="fas fa-store mr-2 w-6"></i>
                            <span>
                                Toko
                            </span>
                        </a>
                    @endif
                    @if (auth()->user()->role == 'admin')
                        <a href="{{ route('auth_redirector') }}" class="transition ease-in-out duration-300 py-2 px-3 border-b hover:bg-gray-100">
                            <i class="fas fa-tachometer-alt mr-2 w-6"></i>
                            <span>
                                Dashboard
                            </span>
                        </a>
                    @endif

                    <a href="javascript:void(0)" class="transition ease-in-out duration-300 py-2 px-3 border-b hover:bg-gray-100">
                        <i class="fas fa-user-circle mr-2 w-6"></i>
                        <span>
                            {{ auth()->user()->name }}
                        </span>
                    </a>

                    <a href="{{ route('cart.index') }}" class="transition ease-in-out duration-300 py-2 px-3 border-b hover:bg-gray-100">
                        <i class="fas fa-shopping-cart mr-2 w-6"></i>
                        <span>
                            Keranjang ({{ $cart_counter }})
                        </span>
                    </a>

                    <form action="{{ route('logout') }}" method="post" class="transition ease-in-out duration-300 py-2 px-3 hover:bg-gray-100">
                        @csrf
                        <i class="fas fa-sign-out-alt mr-2 w-6"></i>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                                Keluar
                        </a>
                    </form>
                @endguest
            </div>
        </div>
    </nav>
    {{-- /Sidebar --}}

    {{-- Body --}}
    {{ $slot }}
    {{-- /Body --}}

    <footer class="border-t border-gray-300 bottom-0">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col items-center">
                <div class="text-center py-4">
                    <a href="{{ route('about') }}">Tentang Kami</a>
                    <span class="border-r border-gray-300 mx-4"></span>
                    <a href="{{ route('policy') }}">Kebijakan</a>
                    <span class="border-r border-gray-300 mx-4"></span>
                    <a href="{{ route('contact') }}">Kontak Kami</a>
                </div>
            </div>
        </div>
    </footer>

    @livewireScripts()
</body>

</html>
