<form wire:submit.prevent="update" autocomplete="off">
    @csrf
    <div class="flex flex-col">
        <label for="whatsapp_number">Nomor WhatsApp <span class="text-red-500">*</span></label>
        <input type="number" name="whatsapp_number" wire:model.defer="form_order.whatsapp_number" id="whatsapp_number" class="mt-2 rounded border-gray-300" placeholder="Gunakan awalan 62" required />
    </div>

    <div class="flex flex-col mt-4">
        <label for="youtube_url">URL YouTube</label>
        <input type="text" name="youtube_url" wire:model.defer="form_order.youtube_url" id="youtube_url" class="mt-2 rounded border-gray-300" placeholder="https://www.youtube.com/channel/id_channel_anda" />
    </div>

    <div class="flex flex-col mt-4">
        <label for="facebook_url">URL Facebook</label>
        <input type="text" name="facebook_url" wire:model.defer="form_order.facebook_url" id="facebook_url" class="mt-2 rounded border-gray-300" placeholder="https://www.facebook.com/id_facebook_anda" />
    </div>

    <div class="flex flex-col mt-4">
        <label for="instagram_url">URL Instagram</label>
        <input type="text" name="instagram_url" wire:model.defer="form_order.instagram_url" id="instagram_url" class="mt-2 rounded border-gray-300" placeholder="https://www.instagram.com/id_instagram_anda" />
    </div>

    <div class="flex flex-col mt-4">
        <label for="twitter_url">URL Twitter</label>
        <input type="text" name="twitter_url" wire:model.defer="form_order.twitter_url" id="twitter_url" class="mt-2 rounded border-gray-300" placeholder="https://www.twitter.com/id_twitter_anda" />
    </div>

    <div class="flex justify-end mt-4">
        <x-button>
            Simpan
        </x-button>
    </div>

    <x-success-and-error-swal />
</form>