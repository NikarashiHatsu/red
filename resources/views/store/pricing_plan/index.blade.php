<x-app-layout>
    <x-slot name="header">
        {{ __('store.pricing_plan') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <livewire:store-pricing-plan />
        </div>
    </div>
</x-app-layout>