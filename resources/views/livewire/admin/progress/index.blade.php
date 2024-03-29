<div>
    <x-slot name="header">
        Progress
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 grid-flow-row gap-6">
                <div class="col-span-12">
                    <x-card>
                        <x-card.header class="bg-blue-500 text-white">
                            <div class="flex items-center justify-between">
                                <span>
                                    Belum diselesaikan
                                </span>
                                <button>
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </x-card.header>
                        @forelse ($incomplete_progresses as $incomplete_progress)
                            <div class="flex justify-between p-4 border-b" wire:key='completed-progress-{{ $incomplete_progress->id }}'>
                                <div class="flex justify-center w-full">
                                    <img src="{{ Storage::url($incomplete_progress->user->form_order->store_logo_path) }}" class="w-32 h-32 rounded object-cover max-w-none" />
                                    <div class="flex-col ml-4">
                                        <h5 class="text-lg">
                                            {{ $incomplete_progress->user->form_order->store_name }}
                                        </h5>
                                        <p class="mt-2">
                                            <span class="font-semibold mr-1">
                                                Nama aplikasi:
                                            </span>
                                            <span>
                                                {{ $incomplete_progress->user->form_order->application_name }}
                                            </span>
                                        </p>
                                        <p class="line-clamp-2">
                                            <span class="font-semibold mr-1">
                                                Deskripsi aplikasi:
                                            </span>
                                            <span>
                                                {{ $incomplete_progress->user->form_order->application_description }}
                                            </span>
                                        </p>
                                        <p class="line-clamp-2 mb-2">
                                            <span class="font-semibold mr-1">
                                                URL Toko:
                                            </span>
                                            <span>
                                                {{ $incomplete_progress->user->form_order->store_url ?? '-' }}
                                            </span>
                                        </p>
                                        <a href="{{ route('admin.user_request.show', $incomplete_progress->user->form_order) }}" target="_blank">
                                            <x-button>
                                                Lihat detail
                                            </x-button>
                                        </a>
                                    </div>
                                </div>
                                <div class="flex flex-col col-span-12 md:col-span-6 lg:col-span-5">
                                    <livewire:admin.progress.progress-detail
                                        :progress="$incomplete_progress"
                                        :key="$incomplete_progress->id"
                                    />
                                </div>
                            </div>
                        @empty
                            <div class="p-4">
                                Semua progress terselesaikan <i class="fas fa-thumbs-up"></i>
                            </div>
                        @endforelse

                        <div>
                            {{-- {{ $incomplete_progresses->links() }} --}}
                        </div>
                    </x-card>

                    <x-card>
                        <x-card.header class="bg-green-500 text-white mt-6">
                            <div class="flex items-center justify-between">
                                <span>
                                    Selesai
                                </span>
                                <button>
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </x-card.header>
                        @forelse ($completed_progresses as $completed_progress)
                            <div class="grid grid-cols-12 grid-flow-row gap-4 p-4 border-b" wire:key='completed-progress-{{ $completed_progress->id }}'>
                                <div class="flex flex-col sm:flex-row col-span-12 md:col-span-6 lg:col-span-7">
                                    <img src="{{ Storage::url($completed_progress->user->form_order->store_logo_path) }}" class="w-32 h-32 rounded object-cover max-w-none" />
                                    <div class="flex-col sm:ml-4 mt-4 sm:mt-0">
                                        <h5 class="text-lg">
                                            {{ $completed_progress->user->form_order->store_name }}
                                        </h5>
                                        <p class="mt-2">
                                            <span class="font-semibold mr-1">
                                                Nama aplikasi:
                                            </span>
                                            <span>
                                                {{ $completed_progress->user->form_order->application_name }}
                                            </span>
                                        </p>
                                        <p class="line-clamp-2">
                                            <span class="font-semibold mr-1">
                                                Deskripsi aplikasi:
                                            </span>
                                            <span>
                                                {{ $completed_progress->user->form_order->application_description }}
                                            </span>
                                        </p>
                                        <p class="line-clamp-2 mb-2">
                                            <span class="font-semibold mr-1">
                                                URL Toko:
                                            </span>
                                            <span>
                                                {{ $completed_progress->user->form_order->store_url ?? '-' }}
                                            </span>
                                        </p>
                                        <div class="flex items-center">
                                            <a href="{{ route('admin.user_request.show', $completed_progress->user->form_order) }}" target="_blank">
                                                <x-button>
                                                    Lihat detail
                                                </x-button>
                                            </a>
                                            <form wire:submit.prevent='deleteStore({{ $completed_progress->user->form_order->id }})' class="ml-2">
                                                <x-red-button onclick="return confirm('Apakah Anda yakin ingin menghapus Toko: {{ $completed_progress->user->form_order->application_name }}?')">
                                                    Hapus
                                                </x-red-button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col col-span-12 md:col-span-6 lg:col-span-5">
                                    <livewire:admin.progress.progress-detail
                                        :progress="$completed_progress"
                                        :key="$completed_progress->id"
                                    />
                                </div>
                            </div>
                        @empty
                            <div class="p-4">
                                Belum ada progress yang terselesaikan
                            </div>
                        @endforelse

                        <div class="p-4">
                            {{ $completed_progresses->links() }}
                        </div>
                    </x-card>
                </div>
            </div>
        </div>
    </div>
</div>
