<div class="max-w-7xl mx-auto py-6 px-8">
    {{-- Start: Filter Panel --}}
    <div class="w-full lg:w-3/12 mr-6 lg:float-left sticky top-6">
        <div class="bg-white border rounded">
            <div class="p-4 border-b">
                Filter
            </div>
            <div class="p-4">
                <form
                    wire:submit.prevent="search"
                    method="get"
                >
                    <label for="keyword_filter">
                        Kata kunci
                    </label>
                    <input
                        type="text"
                        wire:model.debounce.300ms="keyword"
                        id="keyword_filter"
                        placeholder="Cari produk"
                        value="{{ $keyword }}"
                        class="border border-gray-300 rounded w-full mt-2
                                focus:border-gray-500 focus:ring focus:ring-gray-900/10"
                    />
                </form>
            </div>
        </div>
    </div>
    {{-- End: Filter Panel --}}

    {{-- Start: Pencarian --}}
    <div wire:loading class="ml-4">
        <div class="text-2xl font-medium font-serif">
            Anda mencari: {{ $keyword }}
        </div>
        <div class="w-full mt-4 text-gray-500">
            <i class="fas fa-spinner animate-spin"></i>
            <span class="ml-2">
                Mencari produk/toko
            </span>
        </div>
    </div>

    {{-- Produk hasil pencarian --}}
    <div
        wire:loading.remove
        wire:loading.class="hidden"
        class="grid grid-cols-12 grid-flow-row gap-4"
    >
        <h4 class="col-span-12 text-lg mt-4 font-serif">
            Produk
        </h4>
        <div class="col-span-12 grid grid-cols-12 grid-flow-row gap-6 mt-4">
            @forelse ($products as $product)
            <x-product
                class="col-span-4 sm:col-span-4 md:col-span-3 lg:col-span-2"
                :products-in-cart="$products_in_cart"
                :product="$product"
            />
            @empty
            <div class="flex flex-col items-center w-full mt-4 col-span-12">
                <i class="fas fa-times-circle fa-3x"></i>
                <h6 class="font-medium font-serif text-center mt-2">
                    Produk dengan kata kunci "{{ $keyword }}" tidak ditemukan.
                </h6>
            </div>
            @endforelse
        </div>
        <div class="col-span-12 mt-4">
            {{ $products->links() }}
        </div>

        <h4 class="col-span-12 text-lg font-serif mt-6 pt-6 border-t">
            Toko
        </h4>
        <div class="col-span-12 grid grid-cols-12 grid-flow-row gap-6">
            @forelse ($merchants as $merchant)
            <x-merchant
                class="col-span-12 lg:col-span-6"
                :form-order="$merchant"
                :products-in-cart="$products_in_cart"
            />
            @empty
            <div class="flex flex-col items-center w-full mt-4 col-span-12">
                <i class="fas fa-times-circle fa-3x"></i>
                <h6 class="font-medium font-serif text-center mt-2">
                    Toko dengan kata kunci "{{ $keyword }}" tidak ditemukan.
                </h6>
            </div>
            @endforelse
        </div>
        <div class="col-span-12 mt-4">
            {{ $merchants->links() }}
        </div>
    </div>
    {{-- End: Pencarian --}}

    </div>
</div>