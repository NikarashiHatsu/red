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
                        <livewire:store-social-media-information />
                    </x-card.body>
                </x-card>
            </div>
        </div>
    </div>
</x-app-layout>