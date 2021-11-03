<div class="flex justify-between border-b mb-4 pb-4">
    <div class="flex items-center w-full">
        <div class="w-24 h-24 rounded-lg border">
            <img src="{{ Storage::url($cart->product->product_photo_path) }}" class="w-full h-full object-cover" />
        </div>
        <div class="flex flex-col ml-4 max-w-xs">
            <p class="line-clamp-1">
                {{ $cart->product->name }} - {{ $cart->product->description }}
            </p>
            <p class="font-semibold mb-4">
                Rp{{ number_format($cart->product->price, 0, '.', '.')}},-
            </p>
            <div class="flex items-center">
                <div class="w-8 h-8 rounded-full border">
                    <img src="{{ Storage::url($cart->store->store_logo_path) }}" class="w-full h-full object-cover rounded-full">
                </div>
                <div class="flex flex-col ml-2">
                    <p class="text-sm">
                        {{ $cart->store->store_name }}
                    </p>
                    <p class="text-xs">
                        {{ $cart->store->store_address }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col">
        <div class="flex items-center">
            <form action="{{ route('cart.destroy', $cart) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">
                    <i class="fas fa-trash"></i>
                </button>
            </form>

            <div class="flex border rounded-lg ml-4">
                <button wire:click="decrement" class="px-2 bg-white rounded-l-lg {{ $cart->quantity == 1 ? 'opacity-50' : '' }}" {{ $cart->quantity == 1 ? 'disabled' : '' }}>
                    <i class="fas fa-minus fa-sm"></i>
                </button>
                <input wire:blur="set_amount" wire:model="quantity" type="number" value="{{ $cart->quantity }}" class="w-12 px-0 text-xs border-none border-gray-300 text-center focus:outline-none focus:ring-0" min="1" />
                <button wire:click="increment" class="px-2 bg-white rounded-r-lg">
                    <i class="fas fa-plus fa-sm"></i>
                </button>
            </div>
        </div>

        <div class="flex justify-end p-1 mt-1">
            Rp{{ number_format($cart->quantity * $cart->product->price, 0, '.', '.') }}
        </div>
    </div>
</div>