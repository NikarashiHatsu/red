<div class="py-12 max-w-7xl mx-auto">
    <div class="grid grid-cols-12 grid-flow-row gap-6">
        <div class="col-span-12 sm:col-span-8">
            <div class="bg-yellow-50 border border-yellow-300 text-yellow-700 px-3 py-2 rounded mb-4">
                <i class="fas fa-exclamation-triangle mr-1"></i>
                <span>Ada beberapa barang yang tidak bisa dibeli.</span>
            </div>
            @forelse ($carts as $cart)
                <livewire:cart.show
                    :key="$cart->id"
                    :cart="$cart" />
            @empty
                Belum ada produk yang dimasukkan ke Keranjang
            @endforelse
        </div>

        <div class="col-span-12 sm:col-span-4">
            <div class="bg-white rounded border">
                <p class="p-4 border-b">
                    Total pembayaran
                </p>
                @if ($available_product > 0)
                    <div class="flex items-center justify-between p-4">
                        <span>
                            {{ $product_total }} Produk
                        </span>
                        <span>
                            Rp{{ number_format($payment_total, 0, '.', '.') }}
                        </span>
                    </div>
                    <div class="flex flex-col justify-end px-4 pb-4">
                        <input type="number" wire:model.defer="phone_number" placeholder="No. HP (Awali dengan 62)" class="border border-gray-300 rounded" />
                        <textarea wire:model.defer="address" placeholder="Masukkan alamat Anda" class="border border-gray-300 rounded mt-4" rows="3"></textarea>
                        <div class="flex justify-end mt-4">
                            <x-button wire:click="checkout">
                                Beli {{ $product_total }} Produk
                            </x-button>
                        </div>
                    </div>
                @else
                    <div class="p-4">
                        Tidak ada produk yang bisa ditransaksikan
                    </div>
                @endif
            </div>
        </div>
    </div>
    @if ($redirect_payment)
        <script>
            window.location.href = '{{ $redirect_payment }}';
        </script>
    @endif
    <x-success-and-error-swal />
</div>