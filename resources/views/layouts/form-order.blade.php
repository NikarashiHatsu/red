<x-timeline horizontal-line-class="mt-8" vertical-line-class="ml-6">
    <x-timeline.header :href="route('store.form_order.index')" :active="request()->routeIs('store.form_order.index')">
        <x-slot name="counter">
            1
        </x-slot>
        Informasi Toko
    </x-timeline.header>
    <x-timeline.header :href="route('store.form_order.informasi_aplikasi')" :active="request()->routeIs('store.form_order.informasi_aplikasi')">
        <x-slot name="counter">
            2
        </x-slot>
        Informasi Aplikasi
    </x-timeline.header>
    <x-timeline.header :href="route('store.form_order.informasi_media_sosial')"  :active="request()->routeIs('store.form_order.informasi_media_sosial')">
        <x-slot name="counter">
            3
        </x-slot>
        Informasi Media Sosial
    </x-timeline.header>
    <x-timeline.header :href="route('store.form_order.informasi_produk')" :active="request()->routeIs('store.form_order.informasi_produk')">
        <x-slot name="counter">
            4
        </x-slot>
        Informasi Produk
    </x-timeline.header>
</x-timeline>