<div class="flex flex-col">
    @if ($products_left <= 0)
        <div class="bg-red-50 border border-red-300 text-red-700 rounded px-4 py-3 mt-6">
            Kuota produk Anda habis, upgrade ke <a href="{{ route('store.pricing_plan.index') }}" class="underline hover:text-red-900">paket harga</a> yang lebih tinggi atau hapus beberapa produk Anda.
        </div>
        <div class="bg-yellow-50 border border-yellow-300 text-yellow-700 rounded px-4 py-3 mt-4">
            Produk yang melebihi kuota secara otomatis tidak akan terpilih saat permintaan pembuatan toko diajukan. Pengeditan/penghapusan terhadap produk tersebut masih bisa dilakukan.
        </div>
    @endif
    <div class="grid grid-cols-12 grid-flow-row gap-6 mt-4">
        <x-card class="col-span-12 sm:col-span-6 lg:col-span-8">
            <x-card.header>
                Daftar Produk
            </x-card.header>
            <x-card.body>
                <table class="w-full hidden sm:table">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="border p-2 text-center">Foto</th>
                            <th class="border p-2 text-center">Nama</th>
                            <th class="border p-2 text-center">Deskripsi</th>
                            <th class="border p-2 text-center">Harga</th>
                            <th class="border p-2 text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $prod)
                            <tr class="{{ $loop->iteration > $number_of_products ? 'opacity-50' : '' }}">
                                <td class="border p-2">
                                    <div class="flex items-center">
                                        <a href="{{ asset($prod->product_photo_path) }}" target="_blank">
                                            <div class="w-10 h-10">
                                                <img src="{{ asset($prod->product_photo_path) }}" class="w-full h-full object-cover rounded border" />
                                            </div>
                                        </a>

                                        @if ($loop->iteration > $number_of_products)
                                            <i class="fas fa-exclamation-triangle text-yellow-500 ml-2"></i>
                                        @endif
                                    </div>
                                </td>
                                <td class="border p-2">
                                    {{ $prod->name }}
                                </td>
                                <td class="border p-2">
                                    <p class="line-clamp-3">
                                        {{ $prod->description }}
                                    </p>
                                </td>
                                <td class="border p-2">
                                    Rp{{ number_format($prod->price, 0, '.', '.') }},-
                                </td>
                                <td class="border p-2">
                                    <div class="flex">
                                        <x-blue-button wire:click="edit_product({{ $prod }})">
                                            <i class="fas fa-edit"></i>
                                        </x-blue-button>
                                        @if ($confirm_product_deletion == $prod)
                                            <div class="flex">
                                                <x-red-button wire:click="confirm_deletion()" class="ml-2 rounded-r-none">
                                                    <i class="fas fa-trash"></i>
                                                </x-red-button>
                                                <x-button wire:click="cancel_deletion()" class="rounded-l-none">
                                                    <i class="fas fa-times"></i>
                                                </x-button>
                                            </div>
                                        @else
                                            <x-red-button wire:click="delete_product({{ $prod }})" class="ml-2">
                                                <i class="fas fa-trash"></i>
                                            </x-red-button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="border py-2 text-center">
                                    Belum ada data
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div>
                    {{-- TODO: List Produk Responsive --}}
                </div>
            </x-card.body>
        </x-card>

        <x-card class="col-span-12 sm:col-span-6 lg:col-span-4">
            @if ($product->product_photo_path)
                <x-card.header>
                    <x-button wire:click="new_product">
                        Batalkan Edit
                    </x-button>
                </x-card.header>
            @endif
            <x-card.body>
                <form wire:submit.prevent="{{ $product->product_photo_path ? 'update_product' : 'add_product' }}" autocomplete="off" >
                    @csrf
                    <div class="flex flex-col">
                        <label for="product_photo_path">Foto Produk <span class="text-red-500">*</span></label>
                        @error('product_photo_path') <span class="text-red-500 text-xs tracking-wider">{{ $message }}</span> @enderror
                        <div class="w-36 mt-2">
                            <div class="aspect-w-1 aspect-h-1">
                                <label for="product_photo_path" class="transition duration-300 ease-in-out hover:bg-gray-50 w-full h-full rounded border border-gray-300 flex items-center justify-center cursor-pointer text-sm text-gray-500">
                                    @if ($product_photo_path)
                                        <img src="{{ $product_photo_path->temporaryUrl() }}" class="w-full h-full rounded object-cover" />
                                    @else
                                        @if ($product->product_photo_path)
                                            <img src="{{ asset($product->product_photo_path) }}" class="w-full h-full rounded object-cover" />
                                        @else
                                            1:1
                                        @endif
                                    @endif
                                </label>
                            </div>
                        </div>
                        <input type="file" name="product_photo_path" wire:model="product_photo_path" id="product_photo_path" class="hidden" />
                    </div>

                    <div class="flex flex-col mt-4">
                        <label for="name">Nama Produk <span class="text-red-500">*</span></label>
                        @error('product.name') <span class="text-red-500 text-xs tracking-wider">{{ $message }}</span> @enderror
                        <input type="text" name="name" wire:model="product.name" id="name" class="mt-2 rounded border-gray-300" required />
                    </div>

                    <div class="flex flex-col mt-4">
                        <label for="price">Harga Produk <span class="text-red-500">*</span></label>
                        @error('product.price') <span class="text-red-500 text-xs tracking-wider">{{ $message }}</span> @enderror
                        <input type="number" name="price" wire:model="product.price" id="price" class="mt-2 rounded border-gray-300" required />
                    </div>

                    <div class="flex flex-col mt-4">
                        <label for="description">Deskripsi Produk <span class="text-red-500">*</span></label>
                        @error('product.description') <span class="text-red-500 text-xs tracking-wider">{{ $message }}</span> @enderror
                        <textarea name="description" wire:model="product.description" id="description" rows="5" class="mt-2 rounded border-gray-300"></textarea>
                    </div>

                    <div class="flex justify-end mt-4">
                        <x-button>
                            {{ $product->product_photo_path ? 'Perbarui' : 'Simpan' }}
                        </x-button>
                    </div>
                </form>
            </x-card.body>
        </x-card>

        <x-success-and-error-swal />
    </div>
</div>