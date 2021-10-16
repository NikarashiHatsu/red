<x-app-layout>
    <x-slot name="header">
        <h6 class="font-semibold">
            {{ __('navigation.form_order') }}
        </h6>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-form-order />

            <div class="max-w-xl mx-auto mt-6">
                <x-card>
                    <x-card.body>
                        <form action="" method="post" onsubmit="return false" autocomplete="off">
                            @csrf
                            <div class="flex flex-col">
                                <label for="nomor_whatsapp">Nomor WhatsApp <span class="text-red-500">*</span></label>
                                <input type="number" name="nomor_whatsapp" id="nomor_whatsapp" class="mt-2 rounded border-gray-300" placeholder="Gunakan awalan 62" required />
                            </div>

                            <div class="flex flex-col mt-4">
                                <label for="url_youtube">URL YouTube</label>
                                <input type="text" name="url_youtube" id="url_youtube" class="mt-2 rounded border-gray-300" placeholder="https://www.youtube.com/channel/id_channel_anda" />
                            </div>

                            <div class="flex flex-col mt-4">
                                <label for="url_facebook">URL Facebook</label>
                                <input type="text" name="url_facebook" id="url_facebook" class="mt-2 rounded border-gray-300" placeholder="https://www.facebook.com/id_facebook_anda" />
                            </div>

                            <div class="flex flex-col mt-4">
                                <label for="url_instagram">URL Instagram</label>
                                <input type="text" name="url_instagram" id="url_instagram" class="mt-2 rounded border-gray-300" placeholder="https://www.instagram.com/id_instagram_anda" />
                            </div>

                            <div class="flex flex-col mt-4">
                                <label for="url_twitter">URL Twitter</label>
                                <input type="text" name="url_twitter" id="url_twitter" class="mt-2 rounded border-gray-300" placeholder="https://www.twitter.com/id_twitter_anda" />
                            </div>

                            <div class="flex justify-end mt-4">
                                <x-button>
                                    Simpan
                                </x-button>
                            </div>
                        </form>
                    </x-card.body>
                </x-card>
            </div>
        </div>
    </div>
</x-app-layout>