<x-app-layout>
    <x-slot name="header">
        <h6 class="font-semibold">
            {{ __('navigation.pricing_plan') }}
        </h6>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <x-card>
                <x-card.header>
                    <div class="flex items-center justify-between">
                        <a href="{{ route('admin.master.pricing_plan.index') }}">
                            <x-button>
                                <i class="fas fa-arrow-left mr-2"></i>
                                <span>
                                    Kembali
                                </span>
                            </x-button>
                        </a>
                        <h5 class="text-lg">
                            Tambah Paket Harga
                        </h5>
                    </div>
                </x-card.header>
                <x-card.body>
                    <livewire:master-pricing-plan-form />
                </x-card.body>
            </x-card>
        </div>
    </div>
</x-app-layout>