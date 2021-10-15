@php
    $opsi_warna = [
        [
            'nama' => 'Red',
            'class' => 'bg-red-500 hover:bg-red-700',
        ],
        [
            'nama' => 'Orange',
            'class' => 'bg-orange-500 hover:bg-orange-700',
        ],
        [
            'nama' => 'Amber',
            'class' => 'bg-amber-500 hover:bg-amber-700',
        ],
        [
            'nama' => 'Yellow',
            'class' => 'bg-yellow-500 hover:bg-yellow-700',
        ],
        [
            'nama' => 'Lime',
            'class' => 'bg-lime-500 hover:bg-lime-700',
        ],
        [
            'nama' => 'Green',
            'class' => 'bg-green-500 hover:bg-green-700',
        ],
        [
            'nama' => 'Emerald',
            'class' => 'bg-emerald-500 hover:bg-emerald-700',
        ],
        [
            'nama' => 'Teal',
            'class' => 'bg-teal-500 hover:bg-teal-700',
        ],
        [
            'nama' => 'Cyan',
            'class' => 'bg-cyan-500 hover:bg-cyan-700',
        ],
        [
            'nama' => 'Sky',
            'class' => 'bg-sky-500 hover:bg-sky-700',
        ],
        [
            'nama' => 'Blue',
            'class' => 'bg-blue-500 hover:bg-blue-700',
        ],
        [
            'nama' => 'Indigo',
            'class' => 'bg-indigo-500 hover:bg-indigo-700',
        ],
        [
            'nama' => 'Violet',
            'class' => 'bg-violet-500 hover:bg-violet-700',
        ],
        [
            'nama' => 'Purple',
            'class' => 'bg-purple-500 hover:bg-purple-700',
        ],
        [
            'nama' => 'Fuchsia',
            'class' => 'bg-fuchsia-500 hover:bg-fuchsia-700',
        ],
        [
            'nama' => 'Pink',
            'class' => 'bg-pink-500 hover:bg-pink-700',
        ],
        [
            'nama' => 'Rose',
            'class' => 'bg-rose-500 hover:bg-rose-700',
        ],
    ]
@endphp

<x-app-layout>
    <x-slot name="header">
        <h6 class="font-semibold">
            {{ __('navigation.form_order') }}
        </h6>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-form-order />

            <p class="max-w-md italic text-yellow-600 mt-6">
                Perubahan yang terjadi pada halaman ini akan disimpan secara
                otomatis.
            </p>

            <div class="grid grid-cols-12 grid-flow-row gap-4 mt-4">
                <div class="col-span-12 sm:col-span-6 lg:col-span-4">
                    <x-card>
                        <x-card.header>
                            Layout
                        </x-card.header>
                        <x-card.list href="javascript:void(0)" class="flex items-center justify-between">
                            <span>
                                Layout 1
                            </span>
                            <i class="fas fa-chevron-right"></i>
                        </x-card.list>
                    </x-card>
                    <x-card class="mt-6">
                        <x-card.header>
                            Tema Warna
                        </x-card.header>
                        <x-card.body>
                            <div class="grid grid-cols-3 grid-flow-row gap-4">
                                @foreach ($opsi_warna as $warna)
                                    <button class="transition-colors duration-300 ease-in-out col-span-1 text-white py-4 px-2 font-semibold rounded {{ $warna['class'] }}">
                                        {{ $warna['nama'] }}
                                    </button>
                                @endforeach
                            </div>
                        </x-card.body>
                    </x-card>
                </div>

                <div class="col-span-12 sm:col-span-6 lg:col-span-4">
                    <div class="bg-gray-800 w-full h-[calc(0.25rem*160)] rounded-3xl p-2">
                        <div class="flex flex-col bg-white w-full h-full rounded-2xl">
                            <div class="flex items-center justify-between px-3 py-2 border-b">
                                <div class="flex">
                                    12:00 AM
                                </div>
                                <div class="flex">
                                    <i class="fas fa-envelope mr-2"></i>
                                    <i class="fas fa-signal mr-2"></i>
                                    <i class="fas fa-wifi mr-2"></i>
                                    <i class="fas fa-battery-half"></i>
                                </div>
                            </div>

                            <x-store-layouts.layout-1 />
                        </div>
                    </div>
                    <p class="italic text-red-500 text-sm mt-4">
                        Catatan: tampilan di atas adalah tampilan yang
                        diperkirakan. Tampilan pada setiap perangkat akan
                        berbeda tergantung daripada dimensi layar, dan DPI yang
                        dimiliki perangkat.
                    </p>
                </div>

                <div class="col-span-12 sm:col-span-6 lg:col-span-4">
                    <div class="bg-gray-800 w-full h-[calc(0.25rem*160)] rounded-3xl p-2">
                        <div class="flex flex-col bg-white w-full h-full rounded-2xl">
                            <div class="flex items-center justify-between px-3 py-2 border-b">
                                <div class="flex">
                                    12:00 AM
                                </div>
                                <div class="flex">
                                    <i class="fas fa-envelope mr-2"></i>
                                    <i class="fas fa-signal mr-2"></i>
                                    <i class="fas fa-wifi mr-2"></i>
                                    <i class="fas fa-battery-half"></i>
                                </div>
                            </div>

                            <x-product-detail-layouts.layout-1 />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>