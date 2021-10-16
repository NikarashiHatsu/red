<x-timeline horizontal-line-class="mt-8" vertical-line-class="ml-6">
    <x-timeline.header :href="route('store.form_order.index')" :active="request()->routeIs('store.form_order.index')">
        <x-slot name="counter">
            1
        </x-slot>
        Informasi Toko
    </x-timeline.header>
    <x-timeline.header :href="route('store.form_order.application_information')" :active="request()->routeIs('store.form_order.application_information')">
        <x-slot name="counter">
            2
        </x-slot>
        Informasi Aplikasi
    </x-timeline.header>
    <x-timeline.header :href="route('store.form_order.social_media_information')"  :active="request()->routeIs('store.form_order.social_media_information')">
        <x-slot name="counter">
            3
        </x-slot>
        Informasi Media Sosial
    </x-timeline.header>
    <x-timeline.header :href="route('store.form_order.product_information')" :active="request()->routeIs('store.form_order.product_information')">
        <x-slot name="counter">
            4
        </x-slot>
        Informasi Produk
    </x-timeline.header>
    <x-timeline.header :href="route('store.form_order.layout_picker')" :active="request()->routeIs('store.form_order.layout_picker')">
        <x-slot name="counter">
            5
        </x-slot>
        Pilih Layout
    </x-timeline.header>
</x-timeline>