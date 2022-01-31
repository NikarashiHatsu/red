<div>
    <x-slot name="header">
        Data Kunjungan Toko
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-card class="p-4 mb-6">
                <div class="grid grid-cols-12 grid-flow-row gap-4 mb-4">
                    <div class="col-span-12 sm:col-span-6 md:col-span-4">
                        <select
                            wire:loading.class="cursor-not-allowed bg-gray-100"
                            wire:model="form_order_id"
                            class="rounded border border-gray-300 w-full"
                        >
                            <option value="">-Pilih Toko-</option>
                            @foreach ($form_orders as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-12 sm:col-span-6 md:col-span-4">
                        <input
                            wire:loading.class="cursor-not-allowed bg-gray-100"
                            wire:model="date_from"
                            type="date"
                            class="rounded border border-gray-300 w-full"
                        >
                    </div>
                    <div class="col-span-12 sm:col-span-6 md:col-span-4">
                        <input
                            wire:loading.class="cursor-not-allowed bg-gray-100"
                            wire:model="date_to"
                            type="date"
                            class="rounded border border-gray-300 w-full"
                        >
                    </div>
                </div>

                <canvas id="kunjunganToko" wire:ignore></canvas>
            </x-card>

            <x-card class="p-4">
                <livewire:data-kunjungan-toko-data-table
                    :date-from="\Carbon\Carbon::now()" />
            </x-card>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            let labels = @json($labels);
            let data = @json($data);
            let datasets = universalLineDataset('Banyak Kunjungan', data);
            let chart;

            if (chart == undefined) {
                chart = initChart(
                    'kunjunganToko',
                    'line',
                    datasets,
                    labels,
                    16/6
                );
            }

            Livewire.on('chartUpdate', (labels, data) => {
                chart.data.labels = labels;
                chart.data.datasets[0].data = data;
                chart.update({
                    duration: 500,
                    easing: 'easeInOut'
                });
            });
        });
    </script>
</div>
