<div class="relative h-full overflow-y-auto rounded-b-2xl">
    <div class="transition-colors duration-300 ease-in-out relative flex items-center justify-between {{ $colorSchemeDetail[$formOrder->layout_color]['navbar_color']  }} py-4 px-3 shadow-lg z-50">
        <span class="font-semibold">
            Tema
        </span>
        <i class="fas fa-shopping-cart"></i>
    </div>

    <div class="aspect-w-16 aspect-h-7 border-b">
        @if ($formOrder->store_banner_path)
            <img src="{{ Storage::url($formOrder->store_banner_path) }}" class="w-full h-full object-cover">
        @endif
    </div>

    <div class="px-4 mt-4">
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
                    <a href="javascript:void(0)" class="flex items-center mt-1 text-xs {{ $colorSchemeDetail[$formOrder->layout_color]['anchor_color'] }}">
                        <i class="fab fa-whatsapp fa-sm mr-1"></i>
                        <span>WhatsApp</span>
                    </a>
                @endif
                @if ($formOrder->youtube_url)
                    <a href="javascript:void(0)" class="flex items-center mt-1 text-xs {{ $colorSchemeDetail[$formOrder->layout_color]['anchor_color'] }}">
                        <i class="fab fa-youtube fa-sm mr-1"></i>
                        <span>YouTube</span>
                    </a>
                @endif
                @if ($formOrder->instagram_url)
                    <a href="javascript:void(0)" class="flex items-center mt-1 text-xs {{ $colorSchemeDetail[$formOrder->layout_color]['anchor_color'] }}">
                        <i class="fab fa-instagram fa-sm mr-1"></i>
                        <span>Instagram</span>
                    </a>
                @endif
                @if ($formOrder->twitter_url)
                    <a href="javascript:void(0)" class="flex items-center mt-1 text-xs {{ $colorSchemeDetail[$formOrder->layout_color]['anchor_color'] }}">
                        <i class="fab fa-twitter fa-sm mr-1"></i>
                        <span>Twitter</span>
                    </a>
                @endif
            </div>
        </div>
    </div>

    <div class="transition-colors duration-300 ease-in-out mt-4 border-t border-b {{ $colorSchemeDetail[$formOrder->layout_color]['light_color'] }} {{ $colorSchemeDetail[$formOrder->layout_color]['border_color'] }} py-4 text-xs px-4">
        <span>
            {{ auth()->user()->products()->count() }} Produk
        </span>
        <div class="grid grid-cols-3 grid-flow-row gap-4 mt-4">
            @forelse (auth()->user()->products as $product)
                <a wire:click="change_product_displayed({{ $product }})" class="flex flex-col border rounded cursor-pointer {{ $colorSchemeDetail[$formOrder->layout_color]['anchor_color'] }}">
                    <div class="aspect-w-1 aspect-h-1 border-b">
                        <div class="w-full h-full">
                            @if ($product->product_photo_path)
                                <img src="{{ Storage::url($product->product_photo_path) }}" class="w-full h-full rounded-t object-cover" />
                            @endif
                        </div>
                    </div>
                    <div class="flex flex-col bg-white p-2">
                        <p>
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
    </div>

    <div class="mt-4 px-4 pb-4">
        <p class="text-xs">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod amet
            quisquam officia veniam ipsam iste nesciunt quidem, quis earum ut
            eaque esse aperiam labore dolor libero necessitatibus, sequi velit
            illum.
        </p>
    </div>
</div>