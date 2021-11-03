<div class="py-12 max-w-7xl mx-auto">
    <div class="grid grid-cols-12 grid-flow-row gap-6">
        <div class="col-span-12 sm:col-span-8">
            @forelse ($carts as $cart)
                <livewire:cart.show
                    :cart="$cart" />
            @empty
                Belum ada produk yang dimasukkan ke Keranjang
            @endforelse
        </div>
    </div>
</div>