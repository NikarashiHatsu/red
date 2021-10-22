@if (auth()->user()->role == 'admin')
    <x-responsive-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')">
        {{ __('navigation.dashboard') }}
    </x-responsive-nav-link>

    <x-responsive-nav-link :href="route('admin.user_request.index')" :active="request()->routeIs('admin.user_request.index')">
        {{ __('navigation.user_request') }}
    </x-responsive-nav-link>

    <x-responsive-nav-link :href="route('admin.progress.index')" :active="request()->routeIs('admin.progress.index')">
        Progress
    </x-responsive-nav-link>
@endif