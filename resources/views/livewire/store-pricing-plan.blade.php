<x-card>
    <x-card.body>
        <x-alert.warning>
            <i class="fas fa-exclamation-triangle"></i>
            <span class="ml-2">
                Pembayaran akan dilakukan pada saat pengajuan
            </span>
        </x-alert.warning>

        <x-pricing-table class="mt-6">
            <x-pricing-table.tbody>
                @foreach ($pricing_keys as $pricing_key => $pricing_value)
                    <tr class="{{ $loop->even ? 'bg-gray-100' : '' }}">
                        <x-pricing-table.td orientation="justify-left">
                            {{ __($pricing_value) }}
                        </x-pricing-table.td>
                        @foreach ($pricing_plans as $pricing_plan)
                            <x-pricing-table.td
                                :form-order="$formOrder"
                                :key="$pricing_key"
                                :value="$pricing_plan->$pricing_key"
                                :process="true"
                                :pricing-plan-id="$pricing_plan->id" />
                        @endforeach
                    </tr>
                @endforeach
            </x-pricing-table.tbody>
        </x-pricing-table>
    </x-card.body>

    <x-success-and-error-swal />
</x-card>