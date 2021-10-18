<x-app-layout>
    <x-slot name="header">
        <h6 class="font-semibold">
            Dashboard
        </h6>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 grid-flow-row gap-4">
                <div class="col-span-12 sm:col-span-6 lg:col-span-8">
                    <x-card>
                        <x-card.header>
                            <h5 class="text-lg">
                                {{ __('store.greeting', ['name' => auth()->user()->name]) }}
                            </h5>
                        </x-card.header>
                        <x-card.body>
                            <p>
                                {{ __('store.further_notification') }}
                            </p>
                        </x-card.body>
                    </x-card>
                </div>

                <div class="col-span-12 sm:col-span-6 lg:col-span-4">
                    <livewire:request-store-approval />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>