<div
    {{
        $attributes->merge([
            'onclick' => "window.location.href = '" . route('merchant.show', $formOrder->id) . "'",
            'class' => 'transition-shadow duration-300 ease-in-out hover:text-gray-700
                        cursor-pointer flex flex-col col-span-12 md:col-span-6 lg:col-span-4
                        bg-white rounded-lg shadow hover:shadow-xl'
        ])
    }}
>
    <div class="relative">
        <div class="aspect-w-16 aspect-h-9">
            <img
                src="{{ Storage::url($formOrder->store_banner_path) }}"
                class="object-cover rounded-t-lg"
            />
        </div>

        <div class="w-20 h-20 -mt-10 mx-auto">
            <div class="aspect-w-1 aspect-h-1">
                <img
                    src="{{ Storage::url($formOrder->store_logo_path) }}"
                    class="object-cover rounded-full border-2 border-white"
                />
            </div>
        </div>

        <h5 class="text-lg font-serif text-center mt-2 px-4">
            {{ $formOrder->store_name }}
        </h5>

        <p class="text-gray-500 text-center px-4 text-sm mb-0.5">
            <i class="fas fa-cubes mr-1"></i>
            <span>{{ $formOrder->products->count() }} produk</span>
        </p>

        @if ($formOrder->sale_sum_quantity > 0)
            <p class="text-gray-500 text-center px-4 text-sm mb-0.5">
                <i class="fas fa-hand-holding-usd mr-1"></i>
                <span>Total {{ $formOrder->sale_sum_quantity }} produk terjual</span>
            </p>
        @endif

        @if ($formOrder->store_views->count() > 0)
            <p class="text-gray-500 text-center px-4 text-sm mb-0.5">
                <i class="fas fa-eye"></i>
                <span>{{ $formOrder->store_views->count() }}x dikunjungi</span>
            </p>
        @endif

        <div class="grid grid-cols-3 grid-flow-row gap-4 p-4">
            @foreach ($formOrder->products->take(6) as $product)
                <x-product
                    class="col-span-1"
                    :products-in-cart="$productsInCart"
                    :product="$product"
                />
            @endforeach
        </div>
    </div>
</div>