<x-app-layout>
    <x-slot name="header">
        <h6 class="font-semibold">
            {{ __('navigation.form_order') }}
        </h6>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-form-order />

            <div class="max-w-xl mx-auto mt-6">
                <x-card>
                    <x-card.body>
                        <form action="" method="post" onsubmit="return false" autocomplete="off">
                            @csrf
                            <div class="flex flex-col">
                                <label for="banner_toko">Banner Toko <span class="text-red-500">*</span></label>
                                <div class="aspect-w-16 aspect-h-5 mt-2">
                                    <label for="banner_toko" class="transition duration-300 ease-in-out hover:bg-gray-50 w-full h-full rounded border border-gray-300 flex items-center justify-center cursor-pointer text-sm text-gray-500">
                                        16:5
                                    </label>
                                </div>
                                <input type="file" name="banner_toko" id="banner_toko" class="hidden" required />
                            </div>

                            <div class="flex flex-col mt-4 w-24">
                                <label for="logo_toko">Logo Toko <span class="text-red-500">*</span></label>
                                <div class="aspect-w-1 aspect-h-1 mt-2">
                                    <label for="logo_toko" class="transition duration-300 ease-in-out hover:bg-gray-50 w-full h-full rounded-full border border-gray-300 flex items-center justify-center text-center cursor-pointer text-sm text-gray-500">
                                        1:1
                                    </label>
                                </div>
                                <input type="file" name="logo_toko" id="logo_toko" class="hidden" required>
                            </div>

                            <div class="flex flex-col mt-4">
                                <label for="nama_pemilik_toko">Nama Pemilik Toko <span class="text-red-500">*</span></label>
                                <input type="text" name="nama_pemilik_toko" id="nama_pemilik_toko" class="mt-2 rounded border-gray-300" required>
                            </div>

                            <div class="flex flex-col mt-4">
                                <label for="nama_toko">Nama Toko <span class="text-red-500">*</span></label>
                                <input type="text" name="nama_toko" id="nama_toko" class="mt-2 rounded border-gray-300" required>
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