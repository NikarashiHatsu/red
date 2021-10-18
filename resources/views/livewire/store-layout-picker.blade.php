<div class="flex flex-col">
    <p class="max-w-md italic text-yellow-600 mt-6">
        Perubahan yang terjadi pada halaman ini akan disimpan secara
        otomatis.
    </p>

    <div class="grid grid-cols-12 grid-flow-row gap-4 mt-4">
        <div class="col-span-12 sm:col-span-6 lg:col-span-4">
            <x-card>
                <x-card.header class="transition-colors duration-300 ease-in-out {{ $color_scheme_detail[$form_order->layout_color]['navbar_color'] }}">
                    Layout
                </x-card.header>
                @foreach ($layouts as $key => $layout_name)
                    <x-card.list
                        wire:click="update_layout({{ $key }})"
                        href="javascript:void(0)"
                        class="transition-colors duration-300 ease-in-out flex items-center justify-between
                            {{ $form_order->layout_id == $key
                                    ? $color_scheme_detail[$form_order->layout_color]['card_list_color']
                                    : 'hover:bg-gray-50 ' . $color_scheme_detail[$form_order->layout_color]['anchor_color']
                            }}"
                    >
                        <span>
                            {{ $layout_name }}
                        </span>
                        <i class="fas fa-chevron-right"></i>
                    </x-card.list>
                @endforeach
            </x-card>

            <x-card class="mt-6">
                <x-card.header class="transition-colors duration-300 ease-in-out {{ $color_scheme_detail[$form_order->layout_color]['navbar_color'] }}">
                    Tema Warna
                </x-card.header>
                <x-card.body>
                    <div class="grid grid-cols-3 grid-flow-row gap-4">
                        @foreach ($color_schemes_available as $color_scheme)
                            <button wire:click="update_color('{{ $color_scheme['nama'] }}')" class="transition-colors duration-300 ease-in-out col-span-1 text-white py-4 px-2 font-semibold rounded {{ $color_scheme['class'] }}">
                                {{ $color_scheme['nama'] }}
                            </button>
                        @endforeach
                    </div>
                </x-card.body>
            </x-card>
        </div>

        @if ($form_order->layout_id)
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

                        <x-dynamic-component
                            :component="$store_layout_component"
                            :form-order="$form_order"
                            :color-scheme-detail="$color_scheme_detail" />
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

                        @if ($product_displayed)
                            <x-dynamic-component
                                :component="$store_product_detail_component"
                                :form-order="$form_order"
                                :color-scheme-detail="$color_scheme_detail"
                                :product="$product_displayed" />
                        @else
                            <div class="p-4">
                                Anda belum menambahkan produk
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @else
            <div class="col-span-12 sm:col-span-6 lg:col-span-4">
                Anda belum memilih Layout
            </div>
        @endif
    </div>
</div>