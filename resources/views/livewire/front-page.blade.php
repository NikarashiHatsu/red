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
            <x-product
                class="col-span-4 sm:col-span-4 md:col-span-3 lg:col-span-2"
                :products-in-cart="$products_in_cart"
                :product="$product"
            />
        @endforeach
    </div>
    {{-- /Produk unggulan --}}

    {{-- Toko unggulan --}}
    <h4 class="text-2xl font-serif">
        Toko Unggulan
    </h4>
    <div class="grid grid-cols-12 grid-flow-row gap-6 mt-4 mb-12">
        @foreach ($featured_merchants as $form_order)
            <x-merchant
                :form-order="$form_order"
                :products-in-cart="$products_in_cart"
            />
        @endforeach
    </div>
    <div class="mt-6">
        {{ $featured_merchants->links() }}
    </div>
    {{-- /Toko unggulan --}}
</div>
