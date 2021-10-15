@if (auth()->user()->role == 'user')
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <x-nav-link :href="route('store.index')" :active="request()->routeIs('store.index')">
            {{ __('navigation.dashboard') }}
        </x-nav-link>
    </div>

    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <x-nav-link :href="route('store.pricing_plan')" :active="request()->routeIs('store.pricing_plan')">
            {{ __('navigation.pricing_plan') }}
        </x-nav-link>
    </div>

    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <x-nav-link :href="route('store.form_order.index')" :active="request()->routeIs('store.form_order.index')">
            {{ __('navigation.form_order') }}
        </x-nav-link>
    </div>
@endif