<div>
    <x-slot name="header">
        <h6 class="font-semibold">
            Permintaan Pengajuan - {{ $form_order->store_owner }}
        </h6>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 grid-flow-row gap-4">

                <div class="col-span-12 sm:col-span-6 lg:col-span-4">
                    <div class="bg-gray-800 w-full h-[calc(0.25rem*160)] rounded-3xl p-2">
                        <div class="flex flex-col bg-white w-full h-full rounded-2xl">
                            <div class="flex items-center justify-between px-3 py-2 border-b">
                                <div class="flex">
                                    12:00 AM
                                </div>
                                <div class="flex">
                                    <i class="fas fa-envelope mr-2"></i>
                                    <i class="fas fa-signal mr-2"></i>
                                    <i class="fas fa-wifi mr-2"></i>
                                    <i class="fas fa-battery-half"></i>
                                </div>
                            </div>
                            <x-dynamic-component
                                :component="'store-layouts.layout-' . $form_order->layout_id"
                                :products="$products"
                                :form-order="$form_order"
                                :color-scheme-detail="$color_scheme_detail" />
                        </div>
                    </div>
                </div>

                <div class="col-span-12 sm:col-span-6 lg:col-span-4">
                    <div class="bg-gray-800 w-full h-[calc(0.25rem*160)] rounded-3xl p-2">
                        <div class="flex flex-col bg-white w-full h-full rounded-2xl">
                            <div class="flex items-center justify-between px-3 py-2 border-b">
                                <div class="flex">
                                    12:00 AM
                                </div>
                                <div class="flex">
                                    <i class="fas fa-envelope mr-2"></i>
                                    <i class="fas fa-signal mr-2"></i>
                                    <i class="fas fa-wifi mr-2"></i>
                                    <i class="fas fa-battery-half"></i>
                                </div>
                            </div>
                            <x-dynamic-component
                                :component="'product-detail-layouts.layout-' . $form_order->layout_id"
                                :product="$product"
                                :form-order="$form_order"
                                :color-scheme-detail="$color_scheme_detail" />
                        </div>
                    </div>
                </div>

                <div class="col-span-12 sm:col-span-6 lg:col-span-4">
                    <x-card>
                        <x-card.header>
                            Informasi Pengguna
                        </x-card.header>
                        <x-card.body class="flex flex-col items-center">
                            <img src="{{ Storage::url($form_order->store_logo_path) }}" class="w-24 h-24 object-cover rounded-full" />
                            <h6 class="font-semibold mt-4">
                                {{ $form_order->user->name }} ({{ $form_order->store_name }})
                            </h6>
                            <p>
                                {{ $form_order->user->email }}
                            </p>
                            <p>
                                Bergabung {{ \Carbon\Carbon::parse($form_order->user->created_at)->isoFormat('dddd, DD MMMM YYYY') }}
                            </p>
                        </x-card.body>
                    </x-card>

                    <x-card class="mt-6">
                        <x-card.header>
                            Informasi Aplikasi
                        </x-card.header>
                        <x-card.body>
                            <table>
                                <tr>
                                    <td class="align-top">Nama Aplikasi</td>
                                    <td class="align-top px-2">:</td>
                                    <td class="align-top">{{ $form_order->application_name ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="align-top">Deskripsi Aplikasi</td>
                                    <td class="align-top px-2">:</td>
                                    <td class="align-top">{{ $form_order->application_description ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="align-top">Alamat Toko</td>
                                    <td class="align-top px-2">:</td>
                                    <td class="align-top">{{ $form_order->store_address ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="align-top">URL Toko</td>
                                    <td class="align-top px-2">:</td>
                                    <td class="align-top">{{ $form_order->store_url ?? '-' }}</td>
                                </tr>
                            </table>
                        </x-card.body>
                    </x-card>

                    <x-card class="mt-6">
                        <x-card.header>
                            Panel Approval
                        </x-card.header>
                        <x-card.body class="px-6 py-4 pb-6">
                            @if ($disapprove)
                                <form wire:submit.prevent="confirm_disapproval">
                                    <div class="flex flex-col">
                                        <label for="disapproval_message">Kenapa toko ini tidak disetujui?</label>
                                        @error('disapproval_message') <span class="text-red-500 text-sm italic">{{ $message }}</span> @enderror
                                        <textarea wire:model.defer="disapproval_message" name="disapproval_message" id="disapproval_message" cols="6" class="w-full rounded border border-gray-300 mt-2"></textarea>
                                    </div>
                                    <div class="flex mt-4">
                                        <x-button type="submit">
                                            Kirim
                                        </x-button>
                                        <x-secondary-button class="ml-2" type="button" wire:click="cancel_disapproval">
                                            Batalkan
                                        </x-secondary-button>
                                    </div>
                                </form>
                            @elseif ($form_order->disapproval_message)
                                <p>
                                    Permintaan ditolak, alasan: <i>{{ $form_order->disapproval_message }}</i>
                                </p>
                            @else
                                <div class="flex flex-col">
                                    @if ($form_order->is_request_accepted)
                                        <p>
                                            Permintaan diterima
                                        </p>
                                    @else
                                        <p>
                                            Setujui permintaan toko ini?
                                        </p>
                                        <div class="flex mt-3">
                                            <x-button wire:click="approve">
                                                Setujui
                                            </x-button>
                                            <x-red-button wire:click="disapprove" class="ml-2">
                                                Tidak
                                            </x-red-button>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </x-card.body>
                    </x-card>
                </div>

            </div>
        </div>
    </div>

    <x-success-and-error-swal />
</div>
