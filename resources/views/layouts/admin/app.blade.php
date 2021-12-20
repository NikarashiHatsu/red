<!DOCTYPE html>
<html lang="en" x-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="shortcut icon" href="{{ asset('images/logo.webp') }}" type="image/webp">
    <link
        href="https://fonts.googleapis.com/css2?family=Andada+Pro:wght@400;700&family=Dancing+Script&family=Exo+2&family=Lato:wght@300;400;700&family=Roboto+Condensed:wght@400;700&display=swap"
        rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="!text-slate-600 subpixel-antialiased">
    <div class="bg-slate-100 drawer drawer-mobile min-h-screen">
        <input id="drawer" type="checkbox" class="drawer-toggle">

        <div class="drawer-content">
            <div class="h-16 max-h-16 bg-base-100 border-b flex flex-row lg:flex-row-reverse items-center justify-between px-4">
                <label for="drawer" class="flex lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </label>
            </div>

            <div class="p-6">
                @yield('breadcrumb')
                @yield('content')
            </div>
        </div>

        <div class="drawer-side border-r">
            <label for="drawer" class="drawer-overlay"></label>
            <aside class="overflow-y-auto w-80 bg-base-100 text-base-content">
                <div class="sticky top-0 bg-white/50 backdrop-blur-lg">
                    <a href="{{ route('index') }}" class="flex items-center border-b h-16 pl-4">
                        <img src="{{ asset('images/logo.webp') }}" class="w-8 h-8 object-contain" />
                        <div class="flex flex-col ml-2">
                            <span class="font-handwriting text-2xl">{{ config('app.name') }}</span>
                            <span class="font-serif text-gray-500 text-xs italic">Dagangan UMKM Indonesia!</span>
                        </div>
                    </a>
                </div>
                <ul class="menu p-4">
                    <li>
                        <a href="{{ route('admin.index') }}" class="{{ request()->routeIs('admin.index') ? 'active' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <span class="ml-2">Dashboard</span>
                        </a>
                    </li>
                    <div class="group" x-data="{ open: false }">
                        <li>
                            <a x-on:click="open = !open" class="flex justify-between">
                                <span class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="ml-2">Data Master</span>
                                </span>
                                <svg x-bind:class="open ? 'rotate-90' : ''" class="transition duration-300 ease-out h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </li>
                        <li x-bind:class="open ? 'block' : 'hidden'" class="{{ request()->routeIs('admin.master.pricing_plan.index') ? 'block' : '' }}">
                            <a href="{{ route('admin.master.pricing_plan.index') }}" class="{{ request()->routeIs('admin.master.pricing_plan.index') ? 'active' : '' }}">
                                <span class="h-5 w-5"></span>
                                <span class="ml-2">Paket Harga</span>
                            </a>
                        </li>
                    </div>
                    <div class="group" x-data="{ open: false }">
                        <li>
                            <a x-on:click="open = !open" class="flex justify-between">
                                <span class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="ml-2">Laporan</span>
                                </span>
                                <svg x-bind:class="open ? 'rotate-90' : ''" class="transition duration-300 ease-out h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </li>
                        <li x-bind:class="open ? 'block' : 'hidden'">
                            <a href="{{ route('admin.laporan.data_pengguna') }}">
                                <span class="h-5 w-5"></span>
                                <span class="ml-2">Data Pengguna</span>
                            </a>
                            <a href="{{ route('admin.laporan.data_kunjungan_toko') }}">
                                <span class="h-5 w-5"></span>
                                <span class="ml-2">Data Kunjungan Toko</span>
                            </a>
                            {{-- <a>
                                <span class="h-5 w-5"></span>
                                <span class="ml-2">Data Transaksi Toko</span>
                            </a> --}}
                        </li>
                    </div>
                    <li>
                        <a href="{{ route('admin.user_request.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            <span class="ml-2">Permintaan Pengajuan</span>
                        </a>
                    </li>
                    <form
                        x-data
                        x-on:notify="document.querySelector('#logoutForm').submit()"
                        action="{{ route('logout') }}"
                        method="POST"
                        class="menu"
                        id="logoutForm"
                    >
                        @csrf
                        <li>
                            <a x-on:click="$dispatch('notify')" class="active:bg-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                <span class="ml-2">Keluar</span>
                            </a>
                        </li>
                    </form>
                </ul>
            </aside>
        </div>
    </div>

</body>

</html>
