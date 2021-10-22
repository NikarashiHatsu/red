<form wire:submit.prevent="{{ $pricingPlan->created_at ? 'update' : 'save' }}" autocomplete="off">
    @csrf

    <div class="flex flex-col">
        <label for="name">Nama Paket Harga <span class="text-red-500">*</span></label>
        @error('pricingPlan.name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        <input type="text" wire:model.defer="pricingPlan.name" id="name" class="rounded border border-gray-300 mt-2" required />
    </div>

    <div class="flex flex-col mt-4">
        <label for="has_app">Apakah User mendapat 1 Aplikasi? <span class="text-red-500">*</span></label>
        @error('pricingPlan.has_app') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        <div class="flex">
            <div class="flex items-center mt-2">
                <input type="radio" name="has_app" wire:model.defer="pricingPlan.has_app" id="has_app_true" value="1" />
                <label for="has_app_true" class="ml-1">Ya</label>
            </div>
            <div class="flex items-center mt-2 ml-4">
                <input type="radio" name="has_app" wire:model.defer="pricingPlan.has_app" id="has_app_false" value="0" />
                <label for="has_app_false" class="ml-1">Tidak</label>
            </div>
        </div>
    </div>

    <div class="flex flex-col mt-4">
        <label for="has_released_on_google_play">Apakah Aplikasi akan dirilis di Google Play? <span class="text-red-500">*</span></label>
        @error('pricingPlan.has_released_on_google_play') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        <div class="flex">
            <div class="flex items-center mt-2">
                <input type="radio" name="has_released_on_google_play" wire:model.defer="pricingPlan.has_released_on_google_play" id="has_released_on_google_play_true" value="1" />
                <label for="has_released_on_google_play_true" class="ml-1">Ya</label>
            </div>
            <div class="flex items-center mt-2 ml-4">
                <input type="radio" name="has_released_on_google_play" wire:model.defer="pricingPlan.has_released_on_google_play" id="has_released_on_google_play_false" value="0" />
                <label for="has_released_on_google_play_false" class="ml-1">Tidak</label>
            </div>
        </div>
    </div>

    <div class="flex flex-col mt-4">
        <label for="number_of_products">Banyaknya produk <span class="text-red-500">*</span></label>
        @error('pricingPlan.number_of_products') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        <input type="number" name="number_of_products" wire:model.defer="pricingPlan.number_of_products" id="number_of_products" class="rounded border border-gray-300 mt-2" required />
    </div>

    <div class="flex flex-col mt-4">
        <label for="has_blog">Apakah User akan mendapatkan blog? <span class="text-red-500">*</span></label>
        @error('pricingPlan.has_blog') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        <div class="flex">
            <div class="flex items-center mt-2">
                <input type="radio" name="has_blog" wire:model.defer="pricingPlan.has_blog" id="has_blog_true" value="1" />
                <label for="has_blog_true" class="ml-1">Ya</label>
            </div>
            <div class="flex items-center mt-2 ml-4">
                <input type="radio" name="has_blog" wire:model.defer="pricingPlan.has_blog" id="has_blog_false" value="0" />
                <label for="has_blog_false" class="ml-1">Tidak</label>
            </div>
        </div>
    </div>

    <div class="flex flex-col mt-4">
        <label for="has_hosting_and_domain">Apakah User akan mendapatkan domain dan hosting? <span class="text-red-500">*</span></label>
        @error('pricingPlan.has_hosting_and_domain') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        <div class="flex">
            <div class="flex items-center mt-2">
                <input type="radio" name="has_hosting_and_domain" wire:model.defer="pricingPlan.has_hosting_and_domain" id="has_hosting_and_domain_true" value="1" />
                <label for="has_hosting_and_domain_true" class="ml-1">Ya</label>
            </div>
            <div class="flex items-center mt-2 ml-4">
                <input type="radio" name="has_hosting_and_domain" wire:model.defer="pricingPlan.has_hosting_and_domain" id="has_hosting_and_domain_false" value="0" />
                <label for="has_hosting_and_domain_false" class="ml-1">Tidak</label>
            </div>
        </div>
    </div>

    <div class="flex flex-col mt-4">
        <label for="has_self_manage">Apakah User akan bisa memanage aplikasinya sendiri? <span class="text-red-500">*</span></label>
        @error('pricingPlan.has_self_manage') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        <div class="flex">
            <div class="flex items-center mt-2">
                <input type="radio" name="has_self_manage" wire:model.defer="pricingPlan.has_self_manage" id="has_self_manage_true" value="1" />
                <label for="has_self_manage_true" class="ml-1">Ya</label>
            </div>
            <div class="flex items-center mt-2 ml-4">
                <input type="radio" name="has_self_manage" wire:model.defer="pricingPlan.has_self_manage" id="has_self_manage_false" value="0" />
                <label for="has_self_manage_false" class="ml-1">Tidak</label>
            </div>
        </div>
    </div>

    <div class="flex flex-col mt-4">
        <label for="has_online_payment">Apakah aplikasi akan mempunyai opsi pembayaran online? <span class="text-red-500">*</span></label>
        @error('pricingPlan.has_online_payment') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        <div class="flex">
            <div class="flex items-center mt-2">
                <input type="radio" name="has_online_payment" wire:model.defer="pricingPlan.has_online_payment" id="has_online_payment_true" value="1" />
                <label for="has_online_payment_true" class="ml-1">Ya</label>
            </div>
            <div class="flex items-center mt-2 ml-4">
                <input type="radio" name="has_online_payment" wire:model.defer="pricingPlan.has_online_payment" id="has_online_payment_false" value="0" />
                <label for="has_online_payment_false" class="ml-1">Tidak</label>
            </div>
        </div>
    </div>

    <div class="flex flex-col mt-4">
        <label for="has_whatsapp_integration">Apakah aplikasi bisa terintegrasi dengan WhatsApp? <span class="text-red-500">*</span></label>
        @error('pricingPlan.has_whatsapp_integration') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        <div class="flex">
            <div class="flex items-center mt-2">
                <input type="radio" name="has_whatsapp_integration" wire:model.defer="pricingPlan.has_whatsapp_integration" id="has_whatsapp_integration_true" value="1" />
                <label for="has_whatsapp_integration_true" class="ml-1">Ya</label>
            </div>
            <div class="flex items-center mt-2 ml-4">
                <input type="radio" name="has_whatsapp_integration" wire:model.defer="pricingPlan.has_whatsapp_integration" id="has_whatsapp_integration_false" value="0" />
                <label for="has_whatsapp_integration_false" class="ml-1">Tidak</label>
            </div>
        </div>
    </div>

    <div class="flex flex-col mt-4">
        <label for="has_sale_transaction">Apakah aplikasi bisa mengakses transaksi penjualan? <span class="text-red-500">*</span></label>
        @error('pricingPlan.has_sale_transaction') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        <div class="flex">
            <div class="flex items-center mt-2">
                <input type="radio" name="has_sale_transaction" wire:model.defer="pricingPlan.has_sale_transaction" id="has_sale_transaction_true" value="1" />
                <label for="has_sale_transaction_true" class="ml-1">Ya</label>
            </div>
            <div class="flex items-center mt-2 ml-4">
                <input type="radio" name="has_sale_transaction" wire:model.defer="pricingPlan.has_sale_transaction" id="has_sale_transaction_false" value="0" />
                <label for="has_sale_transaction_false" class="ml-1">Tidak</label>
            </div>
        </div>
    </div>

    <div class="flex flex-col mt-4">
        <label for="has_aposerba_integration">Apakah aplikasi bisa terintegrasi dengan Aposerba? <span class="text-red-500">*</span></label>
        @error('pricingPlan.has_aposerba_integration') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        <div class="flex">
            <div class="flex items-center mt-2">
                <input type="radio" name="has_aposerba_integration" wire:model.defer="pricingPlan.has_aposerba_integration" id="has_aposerba_integration_true" value="1" />
                <label for="has_aposerba_integration_true" class="ml-1">Ya</label>
            </div>
            <div class="flex items-center mt-2 ml-4">
                <input type="radio" name="has_aposerba_integration" wire:model.defer="pricingPlan.has_aposerba_integration" id="has_aposerba_integration_false" value="0" />
                <label for="has_aposerba_integration_false" class="ml-1">Tidak</label>
            </div>
        </div>
    </div>

    <div class="flex flex-col mt-4">
        <label for="has_ad_mob_integration">Apakah aplikasi bisa terintegrasi dengan AdMob? <span class="text-red-500">*</span></label>
        @error('pricingPlan.has_ad_mob_integration') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        <div class="flex">
            <div class="flex items-center mt-2">
                <input type="radio" name="has_ad_mob_integration" wire:model.defer="pricingPlan.has_ad_mob_integration" id="has_ad_mob_integration_true" value="1" />
                <label for="has_ad_mob_integration_true" class="ml-1">Ya</label>
            </div>
            <div class="flex items-center mt-2 ml-4">
                <input type="radio" name="has_ad_mob_integration" wire:model.defer="pricingPlan.has_ad_mob_integration" id="has_ad_mob_integration_false" value="0" />
                <label for="has_ad_mob_integration_false" class="ml-1">Tidak</label>
            </div>
        </div>
    </div>

    <div class="flex flex-col mt-4">
        <label for="price">Harga Paket Harga ini <span class="text-red-500">*</span></label>
        @error('pricingPlan.price') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        <input type="number" wire:model.defer="pricingPlan.price" id="price" class="rounded border border-gray-300 mt-2" required />
    </div>

    <div class="flex justify-end mt-4">
        <x-button type="submit">
            {{ $pricingPlan->created_at ? 'Perbarui' : 'Simpan' }}
        </x-button>
    </div>

    <x-success-and-error-swal />
</form>