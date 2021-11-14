@if (auth()->user()->role == 'admin')
    <x-responsive-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')">
        {{ __('navigation.dashboard') }}
    </x-responsive-nav-link>

    <x-responsive-nav-link :href="route('admin.user_request.index')" :active="request()->routeIs('admin.user_request.index')">
        {{ __('navigation.user_request') }}
    </x-responsive-nav-link>

    <div class="pt-1 border-t">
        <x-responsive-nav-link :href="route('admin.master.pricing_plan.index')" :active="request()->routeIs('admin.master.pricing_plan.index')">
            Master Paket Harga
        </x-responsive-nav-link>
    </div>

    <div class="pt-1 border-t">
        <x-responsive-nav-link :href="route('admin.laporan.data_pengguna')">
            Data Pengguna
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('admin.laporan.data_kunjungan_toko')">
            Data Kunjungan Toko
        </x-responsive-nav-link>
        <x-responsive-nav-link href="javascript:void(0)">
            Grafik Detail Kunjungan Toko
        </x-responsive-nav-link>
        <x-responsive-nav-link href="javascript:void(0)">
            Grafik Transaksi Toko
        </x-responsive-nav-link>
        <x-responsive-nav-link href="javascript:void(0)">
            Grafik Tipe Toko
        </x-responsive-nav-link>
    </div>

    <div class="pt-1 border-t">
        <x-responsive-nav-link :href="route('admin.progress.index')" :active="request()->routeIs('admin.progress.index')">
            Progress
        </x-responsive-nav-link>
    </div>
@endif