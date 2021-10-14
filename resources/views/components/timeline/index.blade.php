@props([
    'horizontal-line-class' => '',
    'vertical-line-class' => ''
])

<div class="relative flex flex-col sm:flex-row justify-evenly ml-4 sm:ml-0">
    {{ $slot }}

    <div class="{{ $horizontalLineClass }} hidden sm:flex absolute w-full border-t border-gray-500 z-0"></div>
    <div class="{{ $verticalLineClass }} flex sm:hidden absolute h-full border-r border-gray-500 z-0"></div>
</div>