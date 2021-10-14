@props([
    'href' => 'javascript:void(0)',
    'active' => false,
])

<div class="relative flex flex-row sm:flex-col items-center my-2">
    <a href="{{ $href }}" class="{{ $active ? 'bg-gray-500 text-white' : '' }} transition-colors duration-300 ease-in-out z-10 w-12 sm:w-16 h-12 sm:h-16 flex items-center justify-center rounded-full border text-xl border-gray-500 bg-gray-100 hover:bg-gray-500 hover:text-white">
        {{ $counter }}
    </a>

    <span class="mt-0 sm:mt-2 ml-2 sm:ml-0 text-base">
        {{ $slot }}
    </span>
</div>