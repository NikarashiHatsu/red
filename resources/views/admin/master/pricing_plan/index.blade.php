<x-app-layout>
    <x-slot name="header">
        <h6 class="font-semibold">
            {{ __('navigation.pricing_plan') }}
        </h6>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-card>
                <x-card.header>
                    <div class="flex items-center justify-between">
                        <h5 class="text-lg">
                            Daftar Paket Harga
                        </h5>
                        <a href="{{ route('admin.master.pricing_plan.create') }}">
                            <x-button>
                                Tambah
                            </x-button>
                        </a>
                    </div>
                </x-card.header>
                <x-card.body>
                    {{ $dataTable->table() }}
                </x-card.body>
            </x-card>
        </div>
    </div>

    {{ $dataTable->scripts() }}
</x-app-layout>
