@if (auth()->user()->role == 'admin')
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <x-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')">
            {{ __('navigation.dashboard') }}
        </x-nav-link>
    </div>

    <div class="hidden sm:flex sm:items-center sm:ml-10">
        <x-dropdown align="left">
            <x-slot name="trigger">
                <button class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                    <div>{{ __('navigation.master_data') }}</div>

                    <i class="fas fa-chevron-down fa-xs ml-2"></i>
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link :href="route('admin.master.pricing_plan.index')">
                    {{ __('navigation.pricing_plan') }}
                </x-dropdown-link>
            </x-slot>
        </x-dropdown>
    </div>

    <div class="hidden sm:flex sm:items-center sm:ml-10">
        <x-dropdown align="left" width="56">
            <x-slot name="trigger">
                <button class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                    <div>
                        Laporan
                    </div>

                    <i class="fas fa-chevron-down fa-xs ml-2"></i>
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link :href="route('admin.laporan.data_pengguna')">
                    Data Pengguna
                </x-dropdown-link>
                <x-dropdown-link :href="route('admin.laporan.data_kunjungan_toko')">
                    Data Kunjungan Toko
                </x-dropdown-link>
                <x-dropdown-link href="javascript:void(0)">
                    Grafik Detail Kunjungan Toko
                </x-dropdown-link>
                <x-dropdown-link href="javascript:void(0)">
                    Grafik Transaksi Toko
                </x-dropdown-link>
                <x-dropdown-link href="javascript:void(0)">
                    Grafik Tipe Toko
                </x-dropdown-link>
            </x-slot>
        </x-dropdown>
    </div>

    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <x-nav-link :href="route('admin.user_request.index')" :active="request()->routeIs('admin.user_request.index')">
            {{ __('navigation.user_request') }}
        </x-nav-link>
    </div>

    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <x-nav-link :href="route('admin.progress.index')" :active="request()->routeIs('admin.progress.index')">
            Progress
        </x-nav-link>
    </div>
@endif