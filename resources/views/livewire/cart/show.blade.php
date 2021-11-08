<div class="flex justify-between border-b py-4 px-4 {{ $cart->product->stock == 0 || $cart->product->has_form_order->direct_transfer_bank != null ? 'bg-yellow-100 border-yellow-300' : '' }}">
    <div class="flex items-center w-full">
        <div class="w-24 h-24 rounded-lg border">
            <img src="{{ Storage::url($cart->product->product_photo_path) }}" class="w-full h-full object-cover" />
        </div>
        <div class="flex flex-col ml-4 max-w-lg">
            <a href="{{ route('product.show', $cart->product->id) }}">
                <p class="line-clamp-1">
                    {{ $cart->product->name }} - {{ $cart->product->description }}
                </p>
            </a>
            <p class="font-semibold mb-4">
                Rp{{ number_format($cart->product->price, 0, '.', '.')}},-
            </p>
            <div class="flex items-center">
                <div class="w-8 h-8 rounded-full border">
                    <img src="{{ Storage::url($cart->store->store_logo_path) }}" class="w-full h-full object-cover rounded-full">
                </div>
                <div class="flex flex-row items-center">
                    <div class="flex flex-col ml-2">
                        <p class="text-sm">
                            <a href="{{ route('merchant.show', $cart->store->id) }}">
                                {{ $cart->store->store_name }}
                            </a>
                        </p>
                        <p class="text-xs">
                            {{ $cart->store->store_address }}
                        </p>
                    </div>
                    @if ($cart->product->stock == 0)
                        <div class="bg-red-50 border border-red-300 text-red-700 rounded px-3 py-2 text-sm ml-4 opacity-100">
                            Stok habis
                        </div>
                    @endif
                    @if ($cart->product->has_form_order->direct_transfer_bank != null)
                        <div class="bg-blue-50 border border-blue-300 text-blue-700 rounded px-3 py-2 text-sm ml-4 opacity-100">
                            Transfer langsung ke {{ $cart->product->has_form_order->direct_transfer_bank }}
                            dengan norek {{ $cart->product->has_form_order->direct_transfer_to }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col">
        <p class="italic text-right text-xs mb-1">
            Tersisa {{ $cart->product->stock }} produk
        </p>
        <div class="flex items-center">
            <form action="{{ route('cart.destroy', $cart) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">
                    <i class="fas fa-trash"></i>
                </button>
            </form>

            <div class="flex border rounded-lg ml-4">
                <button wire:click="decrement" class="px-2 bg-white rounded-l-lg {{ $cart->quantity == 1 || $cart->product->stock == 0 || $cart->product->has_form_order->direct_transfer_bank != null ? 'opacity-50' : '' }}" {{ $cart->quantity == 1 || $cart->product->stock == 0 || $cart->product->has_form_order->direct_transfer_bank != null ? 'disabled' : '' }}>
                    <i class="fas fa-minus fa-sm"></i>
                </button>
                <input wire:blur="set_amount" wire:model="quantity" type="number" value="{{ $cart->quantity }}" class="w-12 px-0 text-xs border-none border-gray-300 text-center focus:outline-none focus:ring-0" min="1" max="{{ $cart->product->stock }}" {{ $cart->product->stock == 0 || $cart->product->has_form_order->direct_transfer_bank != null ? 'disabled' : '' }} />
                <button wire:click="increment" class="px-2 bg-white rounded-r-lg {{ $cart->quantity >= $cart->product->stock || $cart->product->stock == 0 || $cart->product->has_form_order->direct_transfer_bank != null ? 'opacity-50' : '' }}" {{ $cart->quantity >= $cart->product->stock || $cart->product->stock == 0 || $cart->product->has_form_order->direct_transfer_bank != null ? 'disabled' : '' }}>
                    <i class="fas fa-plus fa-sm"></i>
                </button>
            </div>
        </div>

        <div class="flex justify-end p-1 mt-1">
            Rp{{ number_format($cart->quantity * $cart->product->price, 0, '.', '.') }}
        </div>
    </div>
</div>