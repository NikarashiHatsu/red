@php
    $product_class = $product->stock == 0 ? "opacity-50" : "";
@endphp

<a
    {{
        $attributes->merge([
            'href' => route('product.show', $product),
            'class' => 'transition-shadow duration-300 ease-in-out hover:text-gray-700
                        flex flex-col bg-white rounded-lg shadow hover:shadow-xl' . $product_class
        ])
    }}
>
    <div class="aspect-w-1 aspect-h-1">
        <img
            src="{{ Storage::url($product->product_photo_path) }}"
            class="w-full h-full object-cover rounded-t-lg"
        />
    </div>
    <div class="p-2 sm:p-3">
        <div class="flex justify-between">
            <p class="text-xxs sm:text-sm mb-0 line-clamp-2">
                {{ $product->name }}
            </p>
            @auth
                @if ($productsInCart?->contains($product->id))
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

        <div class="flex flex-col sm:items-center sm:justify-between sm:flex-row text-gray-500 mt-0.5 sm:mt-1">
            <div class="flex flex-row items-center">
                {{-- TODO: RATING --}}
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

            @if ($product->product_views->count() > 0)
                <div class="flex items-center">
                    <i class="fas fa-eye mr-1 fa-sm"></i>
                    <span class="text-sm">
                        {{ $product->product_views->count() }}x
                    </span>
                </div>
            @endif
        </div>

    </div>
</a>