@if (auth()->user()->role == 'user')
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <x-nav-link :href="route('store.index')" :active="request()->routeIs('store.index')">
            {{ __('navigation.dashboard') }}
        </x-nav-link>
    </div>

    @if (!auth()->user()->duitku_transaction)
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('store.pricing_plan.index')" :active="request()->routeIs('store.pricing_plan.index')">
                {{ __('navigation.pricing_plan') }}
            </x-nav-link>
        </div>
    @endif

    @if (auth()->user()->form_order->pricing_plan_id ?? false)
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('store.form_order.index')" :active="request()->routeIs('store.form_order.index')">
                {{ __('navigation.form_order') }}
            </x-nav-link>
        </div>

        <div class="hidden sm:flex sm:items-center sm:ml-10">
            <x-dropdown align="left">
                <x-slot name="trigger">
                    <button class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                        <div>
                            Laporan
                        </div>

                        <i class="fas fa-chevron-down fa-xs ml-2"></i>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link href="javascript:void(0)">
                        Grafik Pengunjung Toko
                    </x-dropdown-link>
                    <x-dropdown-link href="javascript:void(0)">
                        Produk Terjual
                    </x-dropdown-link>
                    <x-dropdown-link href="javascript:void(0)">
                        Pendapatan Toko
                    </x-dropdown-link>
                    <x-dropdown-link :href="route('store.laporan.data_pelanggan')">
                        Data Pelanggan
                    </x-dropdown-link>
                </x-slot>
            </x-dropdown>
        </div>
    @endif
@endif