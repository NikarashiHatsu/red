@props([
    'orientation' => 'justify-center',
    'value' => null,
    'process' => false,
    'key' => null,
])

<td {{ $attributes->merge(['class' => 'px-4 py-3 border']) }}>
    <div class="flex {{ $orientation }}">
        @if ($process)
            {{-- Indicate key is button --}}
            @if ($key == 'button')
                <x-button>
                    {{ __($value) }}
                </x-button>

            {{-- Indicate string --}}
            @elseif (is_string($value))
                {{ __($value) }}

            {{-- Indicates boolean --}}
            @else
                @if ($value)
                    <div class="w-4 h-4 rounded-full flex items-center justify-center bg-green-500 text-white">
                        <i class="fas fa-check fa-xs"></i>
                    </div>
                @else
                    <div class="w-4 h-4 rounded-full flex items-center justify-center bg-red-500 text-white">
                        <i class="fas fa-times fa-xs"></i>
                    </div>
                @endif
            @endif
        @else

            {{-- Raw value --}}
            {{ $slot }}
        @endif
    </div>
</td>