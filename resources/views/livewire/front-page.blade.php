<div class="max-w-7xl mx-auto px-4 2xl:px-0 py-12">
    {{-- Produk unggulan --}}
    <h4 class="text-2xl font-serif">
        Produk Unggulan
    </h4>
    <div class="grid grid-cols-12 grid-flow-row gap-6 mt-4 mb-12">
        @foreach ($featured_products as $product)
            <a
                href="{{ route('product.show', $product) }}"
                class="transition-shadow duration-300 ease-in-out hover:text-gray-700 flex flex-col col-span-12 sm:col-span-4 md:col-span-3 lg:col-span-2 bg-white rounded-lg shadow hover:shadow-xl">
                {{-- <img src="{{ Storage::url($product->product_photo_path) }}" class="w-full h-full object-cover rounded-t-lg" /> --}}
                <div class="aspect-w-1 aspect-h-1">
                    <img src="https://picsum.photos/seed/{{ rand(0, 12) }}/200/300"
                        class="w-full h-full object-cover rounded-t-lg" />
                </div>
                <div class="p-3">
                    <p class="text-sm mb-1 line-clamp-2">
                        {{ $product->name }}
                    </p>
                    <p class="font-bold font-display text-sm tracking-wide mb-1">
                        Rp {{ number_format($product->price, 0, '.', '.') }}
                    </p>
                    <p class="flex items-start text-gray-500 mb-0.5 text-sm line-clamp-2">
                        <i class="fas fa-store fa-sm mr-1 mt-1"></i>
                        <span>
                            {{ $product->user->form_order->store_name }}
                        </span>
                    </p>
                    <p class="flex items-center text-sm text-gray-500">
                        <i class="fas fa-star fa-sm text-yellow-400"></i>
                        <span class="ml-1">5.0</span>
                        <span class="border-r border-gray-300 h-3 mx-1"></span>
                        <span>Terjual {{ rand(1, 50) }}</span>
                    </p>
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
                class="transition-shadow duration-300 ease-in-out hover:text-gray-700 cursor-pointer flex flex-col col-span-12 md:col-span-6 lg:col-span-4 bg-white rounded-lg shadow hover:shadow-xl">
                <div class="relative">
                    <div class="aspect-w-16 aspect-h-8">
                            <img src="{{ Storage::url($form_order->store_banner_path) }}" class="object-cover rounded-t-lg">
                            {{-- <img src="https://picsum.photos/seed/{{ rand(0, 12) }}/200/300" class="object-cover rounded-t-lg"> --}}
                    </div>
                    <div class="w-20 h-20 -mt-10 mx-auto">
                        <div class="aspect-w-1 aspect-h-1">
                            <img src="{{ Storage::url($form_order->store_logo_path) }}" class="object-cover rounded-full border-2 border-white">
                            {{-- <img src="https://picsum.photos/seed/{{ rand(0, 12) }}/200/300" class="object-cover rounded-full border-2 border-white"> --}}
                        </div>
                    </div>
                    <h5 class="text-lg font-serif text-center mt-2 px-4">
                        {{ $form_order->store_name }}
                    </h5>
                    <p class="text-gray-500 text-center px-4">
                        <i class="fas fa-cubes mr-1"></i>
                        <span>{{ $form_order->user->products()->count() }} produk</span>
                    </p>
                    <div class="grid grid-cols-3 grid-flow-row gap-4 p-4">
                        @foreach ($form_order->user->products()->take(3)->get() as $product)
                            <a
                                href="{{ route('product.show', $product) }}"
                                class="transition-shadow duration-300 ease-in-out col-span-1 hover:text-gray-700 hover:shadow-xl flex flex-col border rounded">
                                <div class="aspect-w-1 aspect-h-1">
                                    <img src="{{ Storage::url($product->product_photo_path) }}" class="w-full h-full object-cover rounded border">
                                    {{-- <img src="https://picsum.photos/seed/{{ rand(0, 12) }}/200/300" class="w-full h-full object-cover rounded-t"> --}}
                                </div>
                                <div class="px-2 py-1">
                                    <p class="text-sm line-clamp-2">
                                        {{ $product->name }}
                                    </p>
                                    <p class="text-xs font-bold">
                                        Rp {{ number_format($product->price, 0, '.', '.') }}
                                    </p>
                                    <p class="flex items-center text-xs text-gray-500 mt-0.5">
                                        <i class="fas fa-star fa-sm text-yellow-400"></i>
                                        <span class="ml-1">5.0</span>
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{-- /Toko unggulan --}}

    {{-- TODO: Toko unggulan --}}
</div>
