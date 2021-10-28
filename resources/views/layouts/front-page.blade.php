<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Andada+Pro:wght@400;700&family=Dancing+Script&family=Exo+2&family=Lato:wght@300;400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jQueryLibraries.js') }}"></script>
</head>

<body class="bg-gray-50 font-display antialiased text-gray-700">
    {{-- Navbar --}}
    <nav class="bg-white shadow-lg py-2 px-4 2xl:px-0">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <a href="{{ route('index') }}" class="flex items-center">
                <img src="{{ asset('images/logo.png') }}" class="w-16 h-16 object-contain" />
                <div class="flex flex-col ml-2">
                    <span class="font-handwriting text-2xl">Pasar Rakyat</span>
                    <span class="font-serif text-gray-500 text-xs italic">Murah merakyat!</span>
                </div>
            </a>

            <form method="get" autocomplete="off" class="flex">
                @csrf
                <input placeholder="Cari produk" type="text" name="search" id="search"
                    class="text-sm rounded-l border border-gray-300 shadow focus:border focus:ring-4 focus:ring-blue-700 focus:ring-opacity-25 focus:border-blue-500" />
                <x-button type="submit" class="rounded-l-none shadow">
                    <i class="fas fa-search"></i>
                </x-button>
            </form>

            <div class="text-sm tracking-wide">
                @guest
                    <div class="flex items-center">
                        <a href="{{ route('login') }}">Masuk</a>
                        <div class="h-4 border-r border-gray-500 mx-2"></div>
                        <a href="{{ route('register') }}">Daftar</a>
                    </div>
                @else
                    <x-dropdown>
                        <x-slot name="trigger">
                            <a href="javascript:void(0)" class="flex items-center">
                                {{ auth()->user()->name }}
                                <i class="fas fa-user-circle text-lg ml-2"></i>
                            </a>
                        </x-slot>

                        <x-slot name="content">
                            @if (auth()->user()->store)
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
                @endguest
            </div>
        </div>
    </nav>
    {{-- /Navbar --}}

    {{-- Body --}}
    {{ $slot }}
    {{-- /Body --}}
</body>

</html>
