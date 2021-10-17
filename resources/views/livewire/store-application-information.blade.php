<form wire:submit.prevent="update" autocomplete="off">
    @csrf
    <div class="flex flex-col">
        <label for="application_name">Nama Aplikasi <span class="text-red-500">*</span></label>
        @error('form_order.application_name') <span class="text-red-500 text-xs tracking-wider">{{ $message }}</span> @enderror
        <input type="text" name="application_name" wire:model="form_order.application_name" id="application_name" class="mt-2 rounded border-gray-300" required />
    </div>

    <div class="flex flex-col mt-4">
        <label for="application_description">Deskripsi Aplikasi <span class="text-red-500">*</span></label>
        @error('form_order.application_description') <span class="text-red-500 text-xs tracking-wider">{{ $message }}</span> @enderror
        <textarea name="application_description" wire:model="form_order.application_description" id="application_description" rows="5" class="mt-2 rounded border-gray-300"></textarea>
    </div>

    <div class="flex flex-col mt-4">
        <label for="store_address">Alamat Perusahaan/Toko <span class="text-red-500">*</span></label>
        @error('form_order.store_address') <span class="text-red-500 text-xs tracking-wider">{{ $message }}</span> @enderror
        <textarea name="store_address" wire:model="form_order.store_address" id="store_address" rows="5" class="mt-2 rounded border-gray-300"></textarea>
    </div>

    <div class="flex flex-col mt-4">
        <label for="store_url">URL Perusahaan/Toko</label>
        @error('form_order.store_url') <span class="text-red-500 text-xs tracking-wider">{{ $message }}</span> @enderror
        <input type="text" name="store_url" wire:model="form_order.store_url" id="store_url" class="mt-2 rounded border-gray-300" placeholder="Opsional, isi jika ada" />
    </div>

    <div class="flex justify-end mt-4">
        <x-button>
            Simpan
        </x-button>
    </div>

    <x-success-and-error-swal />
</form>