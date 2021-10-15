<x-app-layout>
    <x-slot name="header">
        <h6 class="font-semibold">
            {{ __('navigation.user_request') }}
        </h6>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 grid-flow-row gap-4">
                <div class="col-span-12 sm:col-span-6 lg:col-span-4">
                    <x-card x-data="{ open: true }">
                        <x-card.header class="bg-yellow-500 text-white">
                            <div class="flex items-center justify-between">
                                <h5 class="text-lg">
                                    Menunggu Persetujuan
                                </h5>
                                <button @click="open = !open">
                                    <div x-show="open">
                                        <i class="far fa-eye"></i>
                                    </div>
                                    <div x-show="!open">
                                        <i class="far fa-eye-slash"></i>
                                    </div>
                                </button>
                            </div>
                        </x-card.header>
                        <div x-show="open">
                            <x-card.body>
                                <p>Belum ada toko yang menunggu persetujuan.</p>
                            </x-card.body>
                        </div>
                    </x-card>
                </div>

                <div class="col-span-12 sm:col-span-6 lg:col-span-4">
                    <x-card x-data="{ open: true }">
                        <x-card.header class="bg-green-500 text-white">
                            <div class="flex items-center justify-between">
                                <h5 class="text-lg">
                                    Diterima
                                </h5>
                                <button @click="open = !open">
                                    <div x-show="open">
                                        <i class="far fa-eye"></i>
                                    </div>
                                    <div x-show="!open">
                                        <i class="far fa-eye-slash"></i>
                                    </div>
                                </button>
                            </div>
                        </x-card.header>
                        <div x-show="open">
                            <x-card.body>
                                <p>Belum ada pengajuan toko yang diterima.</p>
                            </x-card.body>
                        </div>
                    </x-card>
                </div>

                <div class="col-span-12 sm:col-span-6 lg:col-span-4">
                    <x-card x-data="{ open: true }">
                        <x-card.header class="bg-red-500 text-white">
                            <div class="flex items-center justify-between">
                                <h5 class="text-lg">
                                    Ditolak
                                </h5>
                                <button @click="open = !open">
                                    <div x-show="open">
                                        <i class="far fa-eye"></i>
                                    </div>
                                    <div x-show="!open">
                                        <i class="far fa-eye-slash"></i>
                                    </div>
                                </button>
                            </div>
                        </x-card.header>
                        <div x-show="open">
                            <x-card.body>
                                <p>Belum ada pengajuan toko yang ditolak.</p>
                            </x-card.body>
                        </div>
                    </x-card>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>