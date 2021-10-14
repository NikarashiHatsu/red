<x-app-layout>
    <x-slot name="header">
        <h6 class="font-semibold">
            {{ __('navigation.form_order') }}
        </h6>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-form-order />

            <div class="grid grid-cols-12 grid-flow-row gap-6 mt-6">
                <x-card class="col-span-12 sm:col-span-6 lg:col-span-8">
                    <x-card.header>
                        List Produk
                    </x-card.header>
                    <x-card.body>
                        <table class="w-full hidden sm:table">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="border py-2">Foto</th>
                                    <th class="border py-2">Nama</th>
                                    <th class="border py-2">Deskripsi</th>
                                    <th class="border py-2">Harga</th>
                                    <th class="border py-2">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="5" class="border py-2 text-center">
                                        Belum ada data
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div>
                            {{-- TODO: List Produk Responsive --}}
                        </div>
                    </x-card.body>
                </x-card>

                <x-card class="col-span-12 sm:col-span-6 lg:col-span-4">
                    <x-card.body>
                        <form action="" method="post" onsubmit="return false" autocomplete="off">
                            @csrf
                            <div class="flex flex-col">
                                <label for="foto_produk">Foto Produk <span class="text-red-500">*</span></label>
                                <div class="w-36 mt-2">
                                    <div class="aspect-w-1 aspect-h-1">
                                        <label for="foto_produk" class="transition duration-300 ease-in-out hover:bg-gray-50 w-full h-full rounded border border-gray-300 flex items-center justify-center cursor-pointer text-sm text-gray-500"></label>
                                    </div>
                                </div>
                                <input type="file" name="foto_produk" id="foto_produk" class="hidden" required />
                            </div>

                            <div class="flex flex-col mt-4">
                                <label for="nama_produk">Nama Produk <span class="text-red-500">*</span></label>
                                <input type="text" name="nama_produk" id="nama_produk" class="mt-2 rounded border-gray-300" required />
                            </div>

                            <div class="flex flex-col mt-4">
                                <label for="harga_produk">Harga Produk <span class="text-red-500">*</span></label>
                                <input type="number" name="harga_produk" id="harga_produk" class="mt-2 rounded border-gray-300" required />
                            </div>

                            <div class="flex flex-col mt-4">
                                <label for="deskripsi_produk">Deskripsi Produk <span class="text-red-500">*</span></label>
                                <textarea name="deskripsi_produk" id="deskripsi_produk" rows="5" class="mt-2 rounded border-gray-300"></textarea>
                            </div>

                            <div class="flex justify-end mt-4">
                                <x-button>
                                    Simpan
                                </x-button>
                            </div>
                        </form>
                    </x-card.body>
                </x-card>
            </div>
        </div>
    </div>
</x-app-layout>