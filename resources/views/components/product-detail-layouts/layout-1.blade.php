<div class="relative h-full overflow-y-auto rounded-b-2xl bg-gray-100 text-sm">
    <div class="transition duration-300 ease-in-out relative flex items-center justify-between {{ $colorSchemeDetail[$formOrder->layout_color]['navbar_color'] }} py-4 px-3 shadow-lg z-50">
        @if ($clickable ?? false)
            <a href="{{ route('index') }}" class="flex items-center underline hover:text-white">
                <i class="fas fa-arrow-left mr-2"></i>
                <span>
                    Kembali
                </span>
            </a>
        @else
            <div class="flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>
                <span>
                    Kembali
                </span>
            </div>
        @endif

        <span class="font-semibold line-clamp-1 ml-2">
            <a href="{{ route('cart.index') }}" class="hover:text-white">
                <i class="fas fa-shopping-cart"></i>
                Keranjang Saya
            </a>
        </span>
    </div>

    <div class="aspect-w-1 aspect-h-1 border-b bg-white">
        <div class="w-full h-full">
            <img src="{{ Storage::url($product->product_photo_path) }}" class="w-full h-full object-cover" />
        </div>
    </div>

    <div class="flex flex-col p-4 bg-white">
        @if ($product->stock == 0)
            <div class="bg-yellow-50 border px-3 py-2 border-yellow-300 text-yellow-700 rounded mb-2">
                <i class="fas fa-exclamation-triangle mr-1"></i>
                <span>Stok produk telah habis</span>
            </div>
        @endif

        <div class="flex items-center justify-between">
            <h5 class="text-lg font-semibold">
                Rp{{ number_format($product->price, 0, '.', '.') }},-
            </h5>

            <div class="flex items-center">
                {{-- <button class="mr-2">
                    <i class="far fa-thumbs-up"></i>
                </button> --}}
                <a href="https://wa.me/{{ $formOrder->whatsapp_number }}" class="mr-2">
                    <i class="fab fa-whatsapp"></i>
                </a>

                @guest
                    <form action="{{ route('cart.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}" />
                        <button>
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </form>
                @else
                    @if (auth()->user()->carts()->where('product_id', $product->id)->exists())
                        <form action="{{ route('cart.destroy', auth()->user()->carts()->where('product_id', $product->id)->first()->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="{{ $colorSchemeDetail[$formOrder->layout_color]['colorised_text'] }}">
                                <i class="fas fa-cart-arrow-down"></i>
                            </button>
                        </form>
                    @else
                        @if ($clickable ?? false)
                            <form action="{{ route('cart.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                <button class="{{ $product->stock == 0 ? 'text-gray-400' : '' }}" {{ $product->stock == 0 ? 'disabled' : '' }}>
                                    <i class="fas fa-cart-plus"></i>
                                </button>
                            </form>
                        @else
                            <button>
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        @endif
                    @endif
                @endguest

            </div>
        </div>
        <h6 class="mt-3 text-md font-semibold">
            {{ $product->name }}
        </h6>
        <p class="mt-1 leading-snug line-clamp-2">
            {{ $product->description }}
        </p>
        <div class="mt-2 italic text-xs flex items-center justify-between">
            <span>
                Stok tersisa: {{ $product->stock }} produk
            </span>
            @if ($product->view_counter > 0)
                <span>
                    {{ $product->view_counter }}x dilihat
                </span>
            @endif
        </div>
    </div>

    <div class="bg-white p-4 mt-4">
        <div class="flex flex-col">
            <div class="flex items-center">
                <div class="flex">
                    <div class="w-12 h-12 border rounded-full">
                        @if ($formOrder->store_logo_path)
                            <img src="{{ Storage::url($formOrder->store_logo_path) }}" class="w-full h-full rounded-full object-cover" />
                        @endif
                    </div>
                </div>
                <div class="flex flex-col ml-4">
                    <a href="{{ route('merchant.show', $formOrder->id) }}">
                        <h6 class="font-semibold">
                            {{ $formOrder->store_name }}
                        </h6>
                    </a>
                    <p class="text-xs line-clamp-2">
                        {{ $formOrder->store_address }}
                    </p>
                </div>
            </div>
            {{-- <p class="mt-4">
                <i class="far fa-star mr-1"></i>
                <span>4.8</span>
                <span class="text-xs">rata-rata ulasan</span>
            </p>
            <p class="mt-2">
                <i class="far fa-clock mr-1"></i>
                <span>&#177; 13 jam</span>
                <span class="text-xs">pesanan diproses</span>
            </p> --}}
        </div>
    </div>

    <div class="bg-white p-4 mt-4">
        <h6 class="font-semibold">
            Deskripsi Produk
        </h6>
        <p class="mt-2">
            {!! nl2br($product->description) !!}
        </p>
    </div>

    {{-- <div class="bg-white p-4 mt-4">
        <div class="flex items-center justify-between">
            <h6 class="font-semibold">
                Ulasan Pembeli
            </h6>
            <a href="javascript:void(0)" class="transition-color duration-300 ease-in-out text-sm {{ $colorSchemeDetail[$formOrder->layout_color]['anchor_color'] }} font-semibold">
                Lihat Semua
            </a>
        </div>
        <div class="flex mt-2">
            <div class="w-16 h-16 rounded border"></div>
            <div class="w-16 h-16 rounded border ml-2"></div>
            <div class="w-16 h-16 rounded border ml-2"></div>
            <div class="w-16 h-16 rounded border ml-2"></div>
        </div>
        <div class="flex items-baseline mt-2">
            <i class="fas fa-star text-yellow-300"></i>
            <i class="fas fa-star text-yellow-300 ml-1"></i>
            <i class="fas fa-star text-yellow-300 ml-1"></i>
            <i class="fas fa-star text-yellow-300 ml-1"></i>
            <i class="fas fa-star text-yellow-300 ml-1"></i>
            <span class="text-sm ml-2">
                oleh
            </span>
            <span class="text-sm font-semibold ml-1">
                Aghits Nidallah
            </span>
        </div>
        <p class="line-clamp-3 mt-1">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum
            mollitia exercitationem voluptates voluptatibus minima
            necessitatibus similique nisi ipsa iusto explicabo totam quos ad
            corporis itaque vel, esse dolorum enim rem!
        </p>
    </div> --}}

    <x-success-and-error-swal />
</div>
