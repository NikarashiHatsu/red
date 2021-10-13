@php
    $pricing_keys = [
        'heading' => '',
        'application' => 'pricing.application',
        'release_on_google_play' => 'pricing.release_on_google_play',
        'product_count' => 'pricing.product_count',
        'blog' => 'pricing.blog',
        'hosting_and_domain' => 'pricing.hosting_and_domain',
        'self_manage' => 'pricing.self_manage',
        'online_payment' => 'pricing.online_payment',
        'whatsapp_integration' => 'pricing.whatsapp_integration',
        'sale_transaction' => 'pricing.sale_transaction',
        'aposerba_integration' => 'pricing.aposerba_integration',
        'ad_mob_integration' => 'pricing.ad_mob_integration',
        'price' => 'pricing.price',
        'button' => '',
    ];

    $pricing_perintis = [
        'heading' => 'pricing.pioneer',
        'application' => true,
        'release_on_google_play' => true,
        'product_count' => '12 Produk',
        'blog' => false,
        'hosting_and_domain' => false,
        'self_manage' => false,
        'online_payment' => false,
        'whatsapp_integration' => true,
        'sale_transaction' => false,
        'aposerba_integration' => false,
        'ad_mob_integration' => false,
        'price' => 'Rp 500.000,-',
        'button' => 'Pilih paket Perintis',
    ];

    $pricing_umkm = [
        'heading' => 'pricing.msme',
        'application' => true,
        'release_on_google_play' => true,
        'product_count' => '24 Produk',
        'blog' => true,
        'hosting_and_domain' => false,
        'self_manage' => false,
        'online_payment' => false,
        'whatsapp_integration' => true,
        'sale_transaction' => false,
        'aposerba_integration' => false,
        'ad_mob_integration' => false,
        'price' => 'Rp 900.000,-',
        'button' => 'Pilih paket UMKM',
    ];

    $pricing_berkembang = [
        'heading' => 'pricing.evolve',
        'application' => true,
        'release_on_google_play' => true,
        'product_count' => '52 Produk',
        'blog' => true,
        'hosting_and_domain' => false,
        'self_manage' => true,
        'online_payment' => true,
        'whatsapp_integration' => true,
        'sale_transaction' => false,
        'aposerba_integration' => false,
        'ad_mob_integration' => true,
        'price' => 'Rp 2.500.000,-',
        'button' => 'Pilih paket Berkembang',
    ];

    $pricing_pengusaha = [
        'heading' => 'pricing.enterprise',
        'application' => true,
        'release_on_google_play' => true,
        'product_count' => 'Unlimited',
        'blog' => true,
        'hosting_and_domain' => true,
        'self_manage' => true,
        'online_payment' => true,
        'whatsapp_integration' => true,
        'sale_transaction' => true,
        'aposerba_integration' => true,
        'ad_mob_integration' => true,
        'price' => 'Rp 13.500.000,-',
        'button' => 'Pilih paket Pengusaha',
    ];
@endphp
<x-app-layout>
    <x-slot name="header">
        {{ __('store.pricing_plan') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                                    <x-pricing-table.td :key="$pricing_key" :value="$pricing_perintis[$pricing_key]" :process="true" />
                                    <x-pricing-table.td :key="$pricing_key" :value="$pricing_umkm[$pricing_key]" :process="true" />
                                    <x-pricing-table.td :key="$pricing_key" :value="$pricing_berkembang[$pricing_key]" :process="true" />
                                    <x-pricing-table.td :key="$pricing_key" :value="$pricing_pengusaha[$pricing_key]" :process="true" />
                                </tr>
                            @endforeach
                        </x-pricing-table.tbody>
                    </x-pricing-table>

                </x-card.body>
            </x-card>
        </div>
    </div>
</x-app-layout>