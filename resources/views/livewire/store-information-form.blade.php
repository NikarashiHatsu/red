<form wire:submit.prevent="update" autocomplete="off">
    @csrf
    <div class="flex flex-col">
        <label for="store_banner_path">Banner Toko <span class="text-red-500">*</span></label>
        @error('store_banner_path') <span class="text-red-500 text-xs tracking-wider">{{ $message }}</span> @enderror
        <div class="aspect-w-16 aspect-h-9 mt-2">
            <label for="store_banner_path" class="transition duration-300 ease-in-out hover:bg-gray-50 w-full h-full rounded border border-gray-300 flex items-center justify-center cursor-pointer text-sm text-gray-500">
                @if ($store_banner_path)
                    <img src="{{ $store_banner_path->temporaryUrl() }}" class="w-full h-full rounded object-cover" />
                @else
                    @if ($form_order->store_banner_path)
                        <img src="{{ Storage::url($form_order->store_banner_path) }}" class="w-full h-full rounded object-cover" />
                    @else
                        16:9
                    @endif
                @endif
            </label>
        </div>
        <input type="file" name="store_banner_path" wire:model="store_banner_path" id="store_banner_path" class="hidden" />
    </div>

    <div class="flex flex-col mt-4">
        <label for="store_logo_path">Logo Toko <span class="text-red-500">*</span></label>
        @error('store_logo_path') <span class="text-red-500 text-xs tracking-wider">{{ $message }}</span> @enderror
        <div class="w-24">
            <div class="aspect-w-1 aspect-h-1 mt-2">
                <label for="store_logo_path" class="transition duration-300 ease-in-out hover:bg-gray-50 w-full h-full rounded-full border border-gray-300 flex items-center justify-center text-center cursor-pointer text-sm text-gray-500">
                    @if ($store_logo_path)
                        <img src="{{ $store_logo_path->temporaryUrl() }}" class="w-full h-full rounded-full object-cover" />
                    @else
                        @if ($form_order->store_logo_path)
                            <img src="{{ Storage::url($form_order->store_logo_path) }}" class="w-full h-full rounded-full object-cover" />
                        @else
                            1:1
                        @endif
                    @endif
                </label>
            </div>
        </div>
        <input type="file" name="store_logo_path" wire:model="store_logo_path" id="store_logo_path" class="hidden" />
    </div>

    <div class="flex flex-col mt-4">
        <label for="store_owner">Nama Pemilik Toko <span class="text-red-500">*</span></label>
        @error('form_order.store_owner') <span class="text-red-500 text-xs tracking-wider">{{ $message }}</span> @enderror
        <input type="text" name="store_owner" wire:model.defer="form_order.store_owner" id="store_owner" class="mt-2 rounded border-gray-300" required>
    </div>

    <div class="flex flex-col mt-4">
        <label for="store_name">Nama Toko <span class="text-red-500">*</span></label>
        @error('form_order.store_name') <span class="text-red-500 text-xs tracking-wider">{{ $message }}</span> @enderror
        <input type="text" name="store_name" wire:model.defer="form_order.store_name" id="store_name" class="mt-2 rounded border-gray-300" required>
    </div>

    <div class="flex justify-end mt-4">
        <x-button>
            Simpan
        </x-button>
    </div>

    <x-success-and-error-swal />
</form>