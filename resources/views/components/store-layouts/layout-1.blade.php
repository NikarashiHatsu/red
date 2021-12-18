<div class="relative h-full overflow-y-auto rounded-b-2xl">
    <div class="transition-colors duration-300 ease-in-out relative flex items-center justify-between {{ $colorSchemeDetail[$formOrder->layout_color]['navbar_color']  }} py-4 px-3 shadow-lg z-50">
        <span class="font-semibold"></span>

        <span class="font-semibold line-clamp-1 ml-2">
            <a href="{{ route('cart.index') }}" class="hover:text-white">
                <i class="fas fa-shopping-cart"></i>
                Keranjang Saya
            </a>
        </span>
    </div>

    <div class="aspect-w-16 aspect-h-9 border-b">
        @if ($formOrder->store_banner_path)
            <img src="{{ Storage::url($formOrder->store_banner_path) }}" class="w-full h-full object-cover">
        @endif
    </div>

    <div class="p-4 bg-white">
        <div class="flex">
            <div class="flex flex-col w-16">
                <div class="w-16 h-16 border rounded-full">
                    @if ($formOrder->store_logo_path)
                        <img src="{{ Storage::url($formOrder->store_logo_path) }}" class="w-full h-full object-cover rounded-full">
                    @endif
                </div>
            </div>
            <div class="flex flex-col ml-4 w-full">
                <p class="line-clamp-1">
                    {{ $formOrder->store_name }}
                </p>
                <p href="javascript:void(0)" class="mt-1 text-xs line-clamp-3">
                    <i class="fas fa-map-marker-alt fa-sm mr-1"></i>
                    <span>
                        {{ $formOrder->store_address }}
                    </span>
                </p>
            </div>
            <div class="flex flex-col ml-4">
                @if ($formOrder->whatsapp_number)
                    <a href="{{ 'https://wa.me/' . $formOrder->whatsapp_number }}" target="_blank" class="flex items-center mt-1 text-xs {{ $colorSchemeDetail[$formOrder->layout_color]['anchor_color'] }}">
                        <i class="fab fa-whatsapp fa-sm mr-1"></i>
                        <span>WhatsApp</span>
                    </a>
                @endif
                @if ($formOrder->youtube_url)
                    <a href="{{ $formOrder->youtube_url }}" target="_blank" class="flex items-center mt-1 text-xs {{ $colorSchemeDetail[$formOrder->layout_color]['anchor_color'] }}">
                        <i class="fab fa-youtube fa-sm mr-1"></i>
                        <span>YouTube</span>
                    </a>
                @endif
                @if ($formOrder->instagram_url)
                    <a href="{{ $formOrder->instagram_url }}" target="_blank" class="flex items-center mt-1 text-xs {{ $colorSchemeDetail[$formOrder->layout_color]['anchor_color'] }}">
                        <i class="fab fa-instagram fa-sm mr-1"></i>
                        <span>Instagram</span>
                    </a>
                @endif
                @if ($formOrder->twitter_url)
                    <a href="{{ $formOrder->twitter_url }}" target="_blank" class="flex items-center mt-1 text-xs {{ $colorSchemeDetail[$formOrder->layout_color]['anchor_color'] }}">
                        <i class="fab fa-twitter fa-sm mr-1"></i>
                        <span>Twitter</span>
                    </a>
                @endif
            </div>
        </div>
    </div>

    <div class="transition-colors duration-300 ease-in-out border-t border-b {{ $colorSchemeDetail[$formOrder->layout_color]['light_color'] }} {{ $colorSchemeDetail[$formOrder->layout_color]['border_color'] }} py-4 text-xs px-4">
        <span>
            {{ $products->total() }} Produk
        </span>
        <div class="grid grid-cols-3 grid-flow-row gap-4 mt-4">
            @forelse ($products as $product)
                @if ($clickableProduct ?? false)
                <a href="{{ route('product.show', $product) }}" class="flex flex-col border rounded cursor-pointer {{ $colorSchemeDetail[$formOrder->layout_color]['anchor_color'] }}">
                @else
                <a wire:click="change_product_displayed({{ $product }})" class="flex flex-col border rounded cursor-pointer {{ $colorSchemeDetail[$formOrder->layout_color]['anchor_color'] }}">
                @endif
                    <div class="aspect-w-1 aspect-h-1 border-b">
                        <div class="w-full h-full">
                            @if ($product->product_photo_path)
                                <img src="{{ Storage::url($product->product_photo_path) }}" class="w-full h-full rounded-t object-cover" />
                            @endif
                        </div>
                    </div>
                    <div class="flex flex-col bg-white p-2">
                        <p class="line-clamp-2">
                            {{ $product->name }}
                        </p>
                        <p class="font-semibold mt-1">
                            Rp{{ number_format($product->price, 0, '.', '.') }},-
                        </p>
                    </div>
                </a>
            @empty
                <i>Belum ada produk</i>
            @endforelse
        </div>
        <div class="w-full mt-4">
            {{ $products->onEachSide(0)->links() }}
        </div>
    </div>

    <div class="p-4 bg-white">
        <div class="text-xs">
            <p class="mb-2 font-semibold">
                {{ $formOrder->store_name }}
            </p>
            <p class="mb-2">
                {{ $formOrder->store_address }}
            </p>
            <p>
                <i class="fab fa-whatsapp mr-1"></i>{{ $formOrder->whatsapp_number }}
            </p>
        </div>
    </div>
</div>