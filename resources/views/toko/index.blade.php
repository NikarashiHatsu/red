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
                    <x-card>
                        <x-card.header>
                            <h5 class="text-lg">
                                {{ __('store.submission_requirements') }}
                            </h5>
                        </x-card.header>
                        <x-card.list href="javascript:void(0)" class="flex items-center">
                            <span class="w-4 h-4 bg-red-500 text-white rounded-full flex items-center justify-center">
                                <i class="fas fa-times fa-xs"></i>
                            </span>
                            <span class="ml-2">
                                {{ __('store.pricing_plan') }}
                            </span>
                        </x-card.list>
                        <x-card.list href="javascript:void(0)" class="flex items-center">
                            <span class="w-4 h-4 bg-red-500 text-white rounded-full flex items-center justify-center">
                                <i class="fas fa-times fa-xs"></i>
                            </span>
                            <span class="ml-2">
                                {{ __('store.store_information') }}
                            </span>
                        </x-card.list>
                        <x-card.list href="javascript:void(0)" class="flex items-center">
                            <span class="w-4 h-4 bg-red-500 text-white rounded-full flex items-center justify-center">
                                <i class="fas fa-times fa-xs"></i>
                            </span>
                            <span class="ml-2">
                                {{ __('store.application_information') }}
                            </span>
                        </x-card.list>
                        <x-card.list href="javascript:void(0)" class="flex items-center">
                            <span class="w-4 h-4 bg-red-500 text-white rounded-full flex items-center justify-center">
                                <i class="fas fa-times fa-xs"></i>
                            </span>
                            <span class="ml-2">
                                {{ __('store.social_media_information') }}
                            </span>
                        </x-card.list>
                        <x-card.list href="javascript:void(0)" class="flex items-center">
                            <span class="w-4 h-4 bg-red-500 text-white rounded-full flex items-center justify-center">
                                <i class="fas fa-times fa-xs"></i>
                            </span>
                            <span class="ml-2">
                                {{ __('store.product_list') }}
                            </span>
                        </x-card.list>
                        <x-card.list href="javascript:void(0)" class="flex items-center">
                            <span class="w-4 h-4 bg-red-500 text-white rounded-full flex items-center justify-center">
                                <i class="fas fa-times fa-xs"></i>
                            </span>
                            <span class="ml-2">
                                {{ __('store.layout_and_color_theme') }}
                            </span>
                        </x-card.list>
                        <x-card.body>
                            <div class="flex justify-end">
                                <x-button>
                                    {{ __('store.submit_application_creation') }}
                                </x-button>
                            </div>
                        </x-card.body>
                    </x-card>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>