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
                                <label for="nama_aplikasi">Nama Aplikasi <span class="text-red-500">*</span></label>
                                <input type="text" name="nama_aplikasi" id="nama_aplikasi" class="mt-2 rounded border-gray-300" required />
                            </div>

                            <div class="flex flex-col mt-4">
                                <label for="deskripsi_aplikasi">Deskripsi Aplikasi <span class="text-red-500">*</span></label>
                                <textarea name="deskripsi_aplikasi" id="deskripsi_aplikasi" rows="5" class="mt-2 rounded border-gray-300"></textarea>
                            </div>

                            <div class="flex flex-col mt-4">
                                <label for="alamat_perusahaan">Alamat Perusahaan/Toko <span class="text-red-500">*</span></label>
                                <textarea name="alamat_perusahaan" id="alamat_perusahaan" rows="5" class="mt-2 rounded border-gray-300"></textarea>
                            </div>

                            <div class="flex flex-col mt-4">
                                <label for="url_perusahaan">URL Perusahaan/Toko</label>
                                <input type="text" name="url_perusahaan" id="url_perusahaan" class="mt-2 rounded border-gray-300" placeholder="Opsional, isi jika ada" />
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