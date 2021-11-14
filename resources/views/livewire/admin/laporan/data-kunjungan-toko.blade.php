<div>
    <x-slot name="header">
        Data Kunjungan Toko
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-card class="p-4">
                <livewire:data-kunjungan-toko-data-table
                    :date-from="\Carbon\Carbon::now()" />
            </x-card>
        </div>
    </div>
</div>
