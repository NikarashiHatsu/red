<div>
    <x-slot name="header">
        Pesanan Saya
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($sale_to_be_send)
                <x-card class="mb-4 max-w-sm">
                    <x-card.header>
                        <x-button wire:click="cancel_confirmation">
                            Batalkan
                        </x-button>
                    </x-card.header>
                    <x-card.body>
                        <form wire:submit.prevent="send_product" method="post" class="flex flex-col">
                            <div class="flex flex-col mb-4">
                                <p class="line-clamp-3">
                                    {{ $sale_to_be_send->product->name }} (x{{ $sale_to_be_send->quantity }})
                                </p>
                            </div>
                            <div class="flex flex-col mb-4">
                                <label for="courier" class="mb-2">Kurir</label>
                                <input type="text" name="courier" id="courier" wire:model="courier" class="border border-gray-300 rounded" />
                            </div>
                            <div class="flex flex-col mb-4">
                                <label for="shipment_id" class="mb-2">Nomor Resi</label>
                                <input type="text" name="shipment_id" id="shipment_id" wire:model="shipment_id" class="border border-gray-300 rounded" />
                            </div>
                            <div class="flex flex-col mb-4">
                                <label for="shipment_note" class="mb-2">Catatan Pengiriman</label>
                                <textarea name="shipment_note" id="shipment_note" wire:model="shipment_note" rows="3" class="border border-gray-300 rounded"></textarea>
                            </div>
                            <div class="flex justify-end">
                                <x-button>
                                    Kirim
                                </x-button>
                            </div>
                        </form>
                    </x-card.body>
                </x-card>
            @endif

            <x-card>
                <x-card.header>
                    <x-button wire:click="change_order_type('pesanan_masuk')" class="mr-2 {{ $order_type != 'pesanan_masuk' ? $inactive_classes : '' }}">
                        Pesanan Masuk
                    </x-button>
                    <x-button wire:click="change_order_type('belum_dikirim')" class="mr-2 {{ $order_type != 'belum_dikirim' ? $inactive_classes : '' }}">
                        Belum Dikirim
                    </x-button>
                    <x-button wire:click="change_order_type('dalam_pengiriman')" class="mr-2 {{ $order_type != 'dalam_pengiriman' ? $inactive_classes : '' }}">
                        Dalam Pengiriman
                    </x-button>
                    <x-button wire:click="change_order_type('terkirim')" class="mr-2 {{ $order_type != 'terkirim' ? $inactive_classes : '' }}">
                        Terkirim
                    </x-button>
                    <x-button wire:click="change_order_type('semua')" class="mr-2 {{ $order_type != 'semua' ? $inactive_classes : '' }}">
                        Semua
                    </x-button>
                </x-card.header>
                <x-card.body>
                    <livewire:datatables.store-order-pesanan-datatable
                        :order_type="$order_type" />
                </x-card.body>
            </x-card>
        </div>
    </div>

    @if ($has_confirmation)
        <script>
            jQuery(function() {
                swal.fire({
                    title: 'Konfirmasi?',
                    text: "{{ $has_confirmation }}",
                    showCancelButton: true,
                    icon: 'question',
                }).then(function(result) {
                    if (result.isConfirmed) {
                        window.Livewire.emit('approve_confirmation');
                    } else if (result.dismiss === swal.DismissReason.cancel) {
                        window.Livewire.emit('cancel_confirmation');
                    }
                })
            })
        </script>
    @endif

    <x-success-and-error-swal />
</div>