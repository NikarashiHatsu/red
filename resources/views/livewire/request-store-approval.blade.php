<x-card>
    <x-card.header>
        <h5 class="text-lg">
            {{ __('store.submission_requirements') }}
        </h5>
    </x-card.header>

    <x-card.list href="{{ route('store.pricing_plan.index') }}" class="flex items-center">
        @if ($have_chosen_pricing_plan)
            <span class="w-4 h-4 bg-green-500 text-white rounded-full flex items-center justify-center">
                <i class="fas fa-check fa-xs"></i>
            </span>
        @else
            <span class="w-4 h-4 bg-red-500 text-white rounded-full flex items-center justify-center">
                <i class="fas fa-times fa-xs"></i>
            </span>
        @endif

        <span class="ml-2">
            {{ __('store.pricing_plan') }}
        </span>
    </x-card.list>

    <x-card.list href="{{ route('store.form_order.index') }}" class="flex items-center">
        @if ($have_store_information)
            <span class="w-4 h-4 bg-green-500 text-white rounded-full flex items-center justify-center">
                <i class="fas fa-check fa-xs"></i>
            </span>
        @else
            <span class="w-4 h-4 bg-red-500 text-white rounded-full flex items-center justify-center">
                <i class="fas fa-times fa-xs"></i>
            </span>
        @endif

        <span class="ml-2">
            {{ __('store.store_information') }}
        </span>
    </x-card.list>

    <x-card.list href="{{ route('store.form_order.application_information') }}" class="flex items-center">
        @if ($have_application_information)
            <span class="w-4 h-4 bg-green-500 text-white rounded-full flex items-center justify-center">
                <i class="fas fa-check fa-xs"></i>
            </span>
        @else
            <span class="w-4 h-4 bg-red-500 text-white rounded-full flex items-center justify-center">
                <i class="fas fa-times fa-xs"></i>
            </span>
        @endif

        <span class="ml-2">
            {{ __('store.application_information') }}
        </span>
    </x-card.list>

    <x-card.list href="{{ route('store.form_order.social_media_information') }}" class="flex items-center">
        @if ($have_whatsapp_number)
            <span class="w-4 h-4 bg-green-500 text-white rounded-full flex items-center justify-center">
                <i class="fas fa-check fa-xs"></i>
            </span>
        @else
            <span class="w-4 h-4 bg-red-500 text-white rounded-full flex items-center justify-center">
                <i class="fas fa-times fa-xs"></i>
            </span>
        @endif

        <span class="ml-2">
            {{ __('store.social_media_information') }}
        </span>
    </x-card.list>

    <x-card.list href="{{ route('store.form_order.product_information') }}" class="flex items-center">
        @if (auth()->user()->products()->count() > 0)
            <span class="w-4 h-4 bg-green-500 text-white rounded-full flex items-center justify-center">
                <i class="fas fa-check fa-xs"></i>
            </span>
        @else
            <span class="w-4 h-4 bg-red-500 text-white rounded-full flex items-center justify-center">
                <i class="fas fa-times fa-xs"></i>
            </span>
        @endif

        <span class="ml-2">
            {{ __('store.product_list') }}
        </span>
    </x-card.list>

    <x-card.list href="{{ route('store.form_order.layout_picker') }}" class="flex items-center">
        @if ($have_chosen_layout_and_color_theme)
            <span class="w-4 h-4 bg-green-500 text-white rounded-full flex items-center justify-center">
                <i class="fas fa-check fa-xs"></i>
            </span>
        @else
            <span class="w-4 h-4 bg-red-500 text-white rounded-full flex items-center justify-center">
                <i class="fas fa-times fa-xs"></i>
            </span>
        @endif

        <span class="ml-2">
            {{ __('store.layout_and_color_theme') }}
        </span>
    </x-card.list>

    <x-card.body>
        <div class="flex justify-end">
            @if ($have_all_prerequisites)
                <x-button>
                    {{ __('store.submit_application_creation') }}
                </x-button>
            @else
                <x-button disabled>
                    {{ __('store.submit_application_creation') }}
                </x-button>
            @endif
        </div>
    </x-card.body>
</x-card>