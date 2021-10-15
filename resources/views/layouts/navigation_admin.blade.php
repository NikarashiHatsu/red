@if (auth()->user()->role == 'admin')
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <x-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')">
            {{ __('navigation.dashboard') }}
        </x-nav-link>
    </div>

    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <x-nav-link :href="route('admin.user_request.index')" :active="request()->routeIs('admin.user_request.index')">
            {{ __('navigation.user_request') }}
        </x-nav-link>
    </div>
@endif