@if (auth()->user()->role == 'user')
    <x-responsive-nav-link :href="route('store.index')" :active="request()->routeIs('store.index')">
        {{ __('navigation.dashboard') }}
    </x-responsive-nav-link>

    <x-responsive-nav-link :href="route('store.pricing_plan.index')" :active="request()->routeIs('store.pricing_plan.index')">
        {{ __('navigation.pricing_plan') }}
    </x-responsive-nav-link>

    @if (auth()->user()->formOrder?->pricing_plan_id)
        <x-responsive-nav-link :href="route('store.form_order.index')" :active="request()->routeIs('store.form_order.index')">
            {{ __('navigation.form_order') }}
        </x-responsive-nav-link>
    @endif
@endif