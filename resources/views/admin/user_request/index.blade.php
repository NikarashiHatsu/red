<x-app-layout>
    <x-slot name="header">
        <h6 class="font-semibold">
            {{ __('navigation.user_request') }}
        </h6>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <livewire:admin.user-request.index />
        </div>
    </div>
</x-app-layout>