<form wire:submit.prevent="update" autocomplete="off">
    @csrf
    <div class="flex flex-col">
        <label for="application_name">Nama Aplikasi <span class="text-red-500">*</span></label>
        @error('form_order.application_name') <span class="text-red-500 text-xs tracking-wider">{{ $message }}</span> @enderror
        <input type="text" name="application_name" wire:model.defer="form_order.application_name" id="application_name" class="mt-2 rounded border-gray-300" required />
    </div>

    <div class="flex flex-col mt-4">
        <label for="application_description">Deskripsi Aplikasi <span class="text-red-500">*</span></label>
        @error('form_order.application_description') <span class="text-red-500 text-xs tracking-wider">{{ $message }}</span> @enderror
        <textarea name="application_description" wire:model.defer="form_order.application_description" id="application_description" rows="5" class="mt-2 rounded border-gray-300"></textarea>
    </div>

    <div class="flex flex-col mt-4">
        <label for="store_address">Alamat Perusahaan/Toko <span class="text-red-500">*</span></label>
        @error('form_order.store_address') <span class="text-red-500 text-xs tracking-wider">{{ $message }}</span> @enderror
        <textarea name="store_address" wire:model.defer="form_order.store_address" id="store_address" rows="5" class="mt-2 rounded border-gray-300"></textarea>
    </div>

    {{-- DEPRECATED IN 2021-11-09 --}}
    {{-- @if (!$has_direct_transfer)
        <div class="flex flex-col mt-4"">
            <label for="has_api_integration">Memiliki Kode Integrasi Duitku?</label>
            <div class="flex items-center mt-2">
                <input type="checkbox" name="has_api_integration" wire:model="has_api_integration" id="has_api_integration" class="rounded mr-2" value="1" {{ $form_order->api_merchant_code && $form_order->api_integration_key ? 'checked' : '' }} />
                <label for="has_api_integration">Ya</label>
            </div>

            @if ($has_api_integration)
                <div class="mt-4">
                    <div class="flex flex-col">
                        <label for="form_order.api_merchant_code">Kode Merchant Duitku</label>
                        @error('form_order.api_merchant_code') <span class="text-red-500 text-xs tracking-wider">{{ $message }}</span> @enderror
                        <input type="text" name="form_order.api_merchant_code" wire:model="form_order.api_merchant_code" id="api_merchant_code" class="rounded mt-2 border-gray-300" />
                    </div>
                    <div class="flex flex-col mt-4">
                        <label for="form_order.api_integration_key">Kode API Duitku</label>
                        @error('form_order.api_integration_key') <span class="text-red-500 text-xs tracking-wider">{{ $message }}</span> @enderror
                        <input type="text" name="form_order.api_integration_key" wire:model="form_order.api_integration_key" id="api_integration_key" class="rounded mt-2 border-gray-300" />
                    </div>
                </div>
            @endif
        </div>
    @endif --}}

    <div class="flex flex-col mt-4">
        <label for="store_url">URL Perusahaan/Toko</label>
        @error('form_order.store_url') <span class="text-red-500 text-xs tracking-wider">{{ $message }}</span> @enderror
        <input type="text" name="store_url" wire:model.defer="form_order.store_url" id="store_url" class="mt-2 rounded border-gray-300" placeholder="Opsional, isi jika ada" />
    </div>

    <div class="flex justify-end mt-4">
        <x-button>
            Simpan
        </x-button>
    </div>

    <x-success-and-error-swal />
</form>