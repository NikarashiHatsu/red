@if (auth()->user()->role == 'admin')
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <x-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')">
            {{ __('navigation.dashboard') }}
        </x-nav-link>
    </div>
@endif