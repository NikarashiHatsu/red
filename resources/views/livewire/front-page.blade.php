<div class="max-w-7xl mx-auto px-4 2xl:px-0 py-4 sm:py-12">
    <div class="grid grid-flow-row grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <div class="w-full mb-4 col-start-0 sm:col-start-2 md:col-start-3">
            <img src="{{ asset('banners/promo.jpeg') }}" class="w-full rounded" />
        </div>
    </div>
    <h4 class="text-2xl font-serif">
        Produk Unggulan
    </h4>
    <div class="grid grid-cols-12 grid-flow-row gap-4 sm:gap-6 mt-4 mb-12">
        @foreach ($featured_products as $product)
            <a
                href="{{ route('product.show', $product) }}"
                class="transition-shadow duration-300 ease-in-out hover:text-gray-700 flex flex-col col-span-4 sm:col-span-4 md:col-span-3 lg:col-span-2 bg-white rounded-lg shadow hover:shadow-xl {{ $product->stock == 0 ? 'opacity-50' : '' }}">
                <div class="aspect-w-1 aspect-h-1">
                    <img src="{{ Storage::url($product->product_photo_path) }}"
                        class="w-full h-full object-cover rounded-t-lg" />
                </div>
                <div class="p-2 sm:p-3">
                    <div class="flex justify-between">
                        <p class="text-xxs sm:text-sm mb-0 line-clamp-2">
                            {{ $product->name }}
                        </p>
                        @auth
                        @if ($products_in_cart?->contains($product->id))
                            <div class="w-6 h-6 flex items-center justify-center text-xxs bg-blue-500 rounded-full">
                                <i class="fas fa-shopping-cart text-white"></i>
                            </div>
                        @endif
                        @endauth
                    </div>
                    <p class="font-bold font-display text-xxs sm:text-sm tracking-wide mb-0">
                        Rp {{ number_format($product->price, 0, '.', '.') }}
                    </p>
                    <p class="flex items-start text-gray-500 mb-0 text-xxs sm:text-sm line-clamp-2">
                        <i class="fas fa-store fa-sm mr-0.5 sm:mr-1 mt-1"></i>
                        <span>
                            {{ $product->user->form_order->store_name }}
                        </span>
                    </p>
                    <div class="flex flex-col sm:flex-row text-gray-500 mt-0.5 sm:mt-1">
                        {{-- <div class="flex text-xxs sm:text-sm items-center">
                            <i class="fas fa-star fa-sm text-yellow-400"></i>
                            <span class="ml-1">5.0</span>
                        </div>
                        <span class="hidden sm:flex border-r border-gray-300 h-3 mx-1"></span> --}}
                        @if ($product->sale_sum_quantity > 0)
                            <span class="text-xxs sm:text-sm">
                                Terjual {{ $product->sale_sum_quantity }}
                            </span>
                        @endif
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    {{-- /Produk unggulan --}}

    {{-- Toko unggulan --}}
    <h4 class="text-2xl font-serif">
        Toko Unggulan
    </h4>
    <div class="grid grid-cols-12 grid-flow-row gap-6 mt-4 mb-12">
        @foreach ($featured_merchants as $form_order)
            <div
                onclick="window.location.href = '{{ route('merchant.show', $form_order->id) }}'"
                class="transition-shadow duration-300 ease-in-out hover:text-gray-700 cursor-pointer flex flex-col col-span-12 md:col-span-6 lg:col-span-4 bg-white rounded-lg shadow hover:shadow-xl"
            >
                <div class="relative">
                    <div class="aspect-w-16 aspect-h-9">
                        <img src="{{ Storage::url($form_order->store_banner_path) }}" class="object-cover rounded-t-lg">
                    </div>
                    <div class="w-20 h-20 -mt-10 mx-auto">
                        <div class="aspect-w-1 aspect-h-1">
                            <img src="{{ Storage::url($form_order->store_logo_path) }}" class="object-cover rounded-full border-2 border-white">
                        </div>
                    </div>
                    <h5 class="text-lg font-serif text-center mt-2 px-4">
                        {{ $form_order->store_name }}
                    </h5>
                    <p class="text-gray-500 text-center px-4">
                        <i class="fas fa-cubes mr-1"></i>
                        <span>{{ $form_order->products->count() }} produk</span>
                    </p>
                    @if ($form_order->sale_sum_quantity > 0)
                        <p class="text-gray-500 text-center px-4">
                            <i class="fas fa-sale mr-1"></i>
                            <span>Total {{ $form_order->sale_sum_quantity }} produk terjual</span>
                        </p>
                    @endif
                    <div class="grid grid-cols-3 grid-flow-row gap-4 p-4">
                        @foreach ($form_order->products->take(6) as $product)
                            <a
                                href="{{ route('product.show', $product) }}"
                                class="transition-shadow duration-300 ease-in-out col-span-1 hover:text-gray-700 hover:shadow-xl flex flex-col border rounded {{ $product->stock == 0 ? 'opacity-50' : '' }}"
                            >
                                <div class="aspect-w-1 aspect-h-1">
                                    <img src="{{ Storage::url($product->product_photo_path) }}" class="w-full h-full object-cover rounded border">
                                </div>
                                <div class="px-2 py-1">
                                    <div class="flex justify-between">
                                        <p class="text-xxs sm:text-sm line-clamp-2">
                                            {{ $product->name }}
                                        </p>
                                        @auth
                                            @if ($products_in_cart?->contains($product->id))
                                                <div class="w-4 h-4 flex items-center justify-center text-xxs sm:text-sm bg-blue-500 rounded-full">
                                                    <i class="fa-xs fas fa-shopping-cart text-white"></i>
                                                </div>
                                            @endif
                                        @endauth
                                    </div>
                                    <p class="text-xxs sm:text-sm font-bold">
                                        Rp {{ number_format($product->price, 0, '.', '.') }}
                                    </p>
                                    <div class="flex flex-col sm:flex-row text-gray-500 mt-0.5 sm:mt-1">
                                        {{-- <div class="flex text-xxs sm:text-sm items-center">
                                            <i class="fas fa-star fa-sm text-yellow-400"></i>
                                            <span class="ml-1">5.0</span>
                                        </div>
                                        <span class="hidden sm:flex border-r border-gray-300 h-3 mx-1"></span> --}}
                                        @if ($product->sale_sum_quantity > 0)
                                            <span class="text-xxs sm:text-sm">
                                                Terjual {{ $product->sale_sum_quantity }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{-- /Toko unggulan --}}
</div>
