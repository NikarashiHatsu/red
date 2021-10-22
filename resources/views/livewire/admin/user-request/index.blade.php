<div class="grid grid-cols-12 grid-flow-row gap-4">
    <div class="col-span-12 sm:col-span-6 lg:col-span-4">
        <x-card x-data="{ open: true }">
            <x-card.header class="bg-yellow-500 text-white">
                <div class="flex items-center justify-between">
                    <h5 class="text-lg">
                        Menunggu Persetujuan
                    </h5>
                    <button @click="open = !open">
                        <div x-show="open">
                            <i class="far fa-eye"></i>
                        </div>
                        <div x-show="!open">
                            <i class="far fa-eye-slash"></i>
                        </div>
                    </button>
                </div>
            </x-card.header>
            <div x-bind:class="open ? 'flex' : 'hidden'" class="flex-col">
                @forelse ($waiting_for_approval as $form_order)
                    <div class="p-4 border-b flex items-center justify-between" href="{{ route('admin.user_request.show', $form_order) }}" target="_blank">
                        <div class="flex">
                            <div class="w-24 h-24">
                                <img src="{{ Storage::url($form_order->store_logo_path) }}" class="w-24 h-24 max-w-none border rounded object-cover">
                            </div>
                            <div class="ml-4">
                                <p>
                                    {{ $form_order->store_name }}
                                </p>
                                <p class="line-clamp-1 text-sm">
                                    {{ $form_order->store_address }}
                                </p>
                                <p class="text-sm mt-2">
                                    <i class="fas fa-box fa-sm"></i>
                                    {{ $form_order->user->products()->count() }} produk
                                </p>
                                <div class="flex mt-1">
                                    <i class="fas fa-globe {{ $form_order->store_url ? 'text-red-500' : 'text-gray-300' }}"></i>
                                    <i class="fab fa-whatsapp ml-1.5 {{ $form_order->whatsapp_number ? 'text-green-500' : 'text-gray-300' }}"></i>
                                    <i class="fab fa-facebook ml-1.5 {{ $form_order->facebook_url ? 'text-blue-500' : 'text-gray-300' }}"></i>
                                    <i class="fab fa-twitter ml-1.5 {{ $form_order->facebook_url ? 'text-sky-500' : 'text-gray-300' }}"></i>
                                    <i class="fab fa-instagram ml-1.5 {{ $form_order->facebook_url ? 'text-purple-500' : 'text-gray-300' }}"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <a href="{{ route('admin.user_request.show', $form_order) }}" target="_blank" class="bg-blue-500 text-white text-center w-6 h-6 rounded mb-1">
                                <i class="fas fa-eye fa-sm"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <x-card.body>
                        <p>Belum ada toko yang menunggu persetujuan.</p>
                    </x-card.body>
                @endforelse
            </div>
        </x-card>
    </div>

    <div class="col-span-12 sm:col-span-6 lg:col-span-4">
        <x-card x-data="{ open: true }">
            <x-card.header class="bg-green-500 text-white">
                <div class="flex items-center justify-between">
                    <h5 class="text-lg">
                        Diterima
                    </h5>
                    <button @click="open = !open">
                        <div x-show="open">
                            <i class="far fa-eye"></i>
                        </div>
                        <div x-show="!open">
                            <i class="far fa-eye-slash"></i>
                        </div>
                    </button>
                </div>
            </x-card.header>
            <div x-show="open">
                @forelse ($accepted as $form_order)
                    <div class="p-4 border-b flex items-center justify-between" href="{{ route('admin.user_request.show', $form_order) }}" target="_blank">
                        <div class="flex">
                            <div class="w-24 h-24">
                                <img src="{{ Storage::url($form_order->store_logo_path) }}" class="w-24 h-24 max-w-none border rounded object-cover">
                            </div>
                            <div class="ml-4">
                                <p>
                                    {{ $form_order->store_name }}
                                </p>
                                <p class="line-clamp-1 text-sm">
                                    {{ $form_order->store_address }}
                                </p>
                                <p class="text-sm mt-2">
                                    <i class="fas fa-box fa-sm"></i>
                                    {{ $form_order->user->products()->count() }} produk
                                </p>
                                <div class="flex mt-1">
                                    <i class="fas fa-globe {{ $form_order->store_url ? 'text-red-500' : 'text-gray-300' }}"></i>
                                    <i class="fab fa-whatsapp ml-1.5 {{ $form_order->whatsapp_number ? 'text-green-500' : 'text-gray-300' }}"></i>
                                    <i class="fab fa-facebook ml-1.5 {{ $form_order->facebook_url ? 'text-blue-500' : 'text-gray-300' }}"></i>
                                    <i class="fab fa-twitter ml-1.5 {{ $form_order->facebook_url ? 'text-sky-500' : 'text-gray-300' }}"></i>
                                    <i class="fab fa-instagram ml-1.5 {{ $form_order->facebook_url ? 'text-purple-500' : 'text-gray-300' }}"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <a href="{{ route('admin.user_request.show', $form_order) }}" target="_blank" class="bg-blue-500 text-white text-center w-6 h-6 rounded mb-1">
                                <i class="fas fa-eye fa-sm"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <x-card.body>
                        <p>Belum ada pengajuan toko yang diterima.</p>
                    </x-card.body>
                @endforelse
            </div>
        </x-card>
    </div>

    <div class="col-span-12 sm:col-span-6 lg:col-span-4">
        <x-card x-data="{ open: true }">
            <x-card.header class="bg-red-500 text-white">
                <div class="flex items-center justify-between">
                    <h5 class="text-lg">
                        Ditolak
                    </h5>
                    <button @click="open = !open">
                        <div x-show="open">
                            <i class="far fa-eye"></i>
                        </div>
                        <div x-show="!open">
                            <i class="far fa-eye-slash"></i>
                        </div>
                    </button>
                </div>
            </x-card.header>
            <div x-show="open">
                @forelse ($rejected as $form_order)
                    <div class="p-4 border-b flex items-center justify-between" href="{{ route('admin.user_request.show', $form_order) }}" target="_blank">
                        <div class="flex">
                            <div class="w-24 h-24">
                                <img src="{{ Storage::url($form_order->store_logo_path) }}" class="w-24 h-24 max-w-none border rounded object-cover">
                            </div>
                            <div class="ml-4">
                                <p>
                                    {{ $form_order->store_name }}
                                </p>
                                <p class="line-clamp-1 text-sm">
                                    {{ $form_order->store_address }}
                                </p>
                                <p class="text-sm mt-2">
                                    <i class="fas fa-box fa-sm"></i>
                                    {{ $form_order->user->products()->count() }} produk
                                </p>
                                <div class="flex mt-1">
                                    <i class="fas fa-globe {{ $form_order->store_url ? 'text-red-500' : 'text-gray-300' }}"></i>
                                    <i class="fab fa-whatsapp ml-1.5 {{ $form_order->whatsapp_number ? 'text-green-500' : 'text-gray-300' }}"></i>
                                    <i class="fab fa-facebook ml-1.5 {{ $form_order->facebook_url ? 'text-blue-500' : 'text-gray-300' }}"></i>
                                    <i class="fab fa-twitter ml-1.5 {{ $form_order->facebook_url ? 'text-sky-500' : 'text-gray-300' }}"></i>
                                    <i class="fab fa-instagram ml-1.5 {{ $form_order->facebook_url ? 'text-purple-500' : 'text-gray-300' }}"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <a href="{{ route('admin.user_request.show', $form_order) }}" target="_blank" class="bg-blue-500 text-white text-center w-6 h-6 rounded mb-1">
                                <i class="fas fa-eye fa-sm"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <x-card.body>
                        <p>Belum ada pengajuan toko yang diterima.</p>
                    </x-card.body>
                @endforelse
            </div>
        </x-card>
    </div>
</div>