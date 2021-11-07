@php
    # $transaction = auth()->user()->transaction;
    $transaction = auth()->user()->duitku_transaction;
    $form_order = auth()->user()->form_order;
    $progress = auth()->user()->progress;
@endphp

<x-app-layout>
    <x-slot name="header">
        <h6 class="font-semibold">
            Dashboard
        </h6>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 grid-flow-row gap-4">
                <div class="col-span-12 sm:col-span-6 lg:col-span-8">
                    <x-card>
                        <x-card.header>
                            <h5 class="text-lg">
                                @if ($transaction)
                                    <div class="flex items-center justify-between">
                                        <span>
                                            {{ __('store.greeting', ['name' => auth()->user()->name]) }}
                                        </span>

                                        @if ($transaction->result_code == '02')
                                            <span class="text-base px-3 py-2 rounded border bg-blue-50 border-blue-300 text-blue-700">
                                                Pembayaran belum diselesaikan
                                            </span>
                                        @elseif ($transaction->result_code == '00')
                                            @if ($form_order->is_request_accepted)
                                                <span class="text-base px-3 py-2 rounded border bg-green-50 border-green-300 text-green-700">
                                                    Permintaan pengajuan dalam antrian
                                                </span>
                                            @elseif ($form_order->disapproval_message)
                                                <span class="text-base px-3 py-2 rounded border bg-red-50 border-red-300 text-red-700">
                                                    Permintaan pengajuan ditolak
                                                </span>
                                            @else
                                                <span class="text-base px-3 py-2 rounded border bg-yellow-50 border-yellow-300 text-yellow-700">
                                                    Permintaan pengajuan belum disetujui
                                                </span>
                                            @endif
                                        @endif

                                    </div>
                                @else
                                    {{ __('store.greeting', ['name' => auth()->user()->name]) }}
                                @endif
                            </h5>
                        </x-card.header>
                        <x-card.body>
                            @if ($transaction != null && $form_order->is_request_accepted)
                                <div class="flex items-center">
                                    <div class="flex flex-col">
                                        <img src="{{ Storage::url($form_order->store_logo_path) }}" class="h-32 w-32 max-w-none object-cover rounded border">
                                    </div>
                                    <div class="flex flex-col ml-4">
                                        <p class="font-semibold">
                                            {{ $form_order->store_name}}
                                        </p>
                                        <p class="mt-2 line-clamp-2">
                                            {{ $form_order->store_address }}
                                        </p>
                                        <p class="mt-2">
                                            <i class="fas fa-boxes"></i>
                                            <span class="ml-2">
                                                {{ auth()->user()->products()->count() }} produk
                                            </span>
                                        </p>
                                    </div>
                                </div>
                                @if ($progress)
                                    <div class="flex flex-col border-t pt-4 mt-4">
                                        <h5 class="text-lg">
                                            Progress Pembuatan Aplikasi
                                        </h5>
                                        <div class="grid grid-cols-3 grid-flow-row mt-2">
                                            <div class="col-span-1 px-3 py-2 border rounded-l {{ $form_order->is_request_accepted ? 'bg-green-50 border-green-300 text-green-700' : '' }}">
                                                <p class="font-semibold">
                                                    1. Penerimaan
                                                </p>
                                                <p class="text-sm">
                                                    Permintaan pengajuan aplikasi diterima oleh admin.
                                                </p>
                                            </div>
                                            <div class="col-span-1 px-3 py-2 border border-l-0 {{ $progress->is_apk_created ? 'bg-green-50 border-green-300 text-green-700' : '' }}">
                                                <p class="font-semibold">
                                                    2. Pembuatan Aplikasi
                                                </p>
                                                <p class="text-sm">
                                                    Pembuatan aplikasi oleh developer dari BWI App Store
                                                </p>
                                            </div>
                                            <div class="col-span-1 px-3 py-2 border border-l-0 rounded-r {{ $progress->is_published_on_google_play ? 'bg-green-50 border-green-300 text-green-700' : '' }}">
                                                <p class="font-semibold">
                                                    3. Pengunggahan Aplikasi
                                                </p>
                                                <p class="text-sm">
                                                    Aplikasi yang sudah dibuat akan diunggah ke Google Play Store
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @elseif ($form_order->disapproval_message ?? false)
                                <p>
                                    Permintaan pengajuan tidak disetujui, alasan: <i>{{ $form_order->disapproval_message }}</i>.
                                </p>
                                <p>
                                    Anda bisa mengirimkan pengajuan kembali setelah memperbaiki kesalahan di atas.
                                </p>
                            @else
                                <p>
                                    {{ __('store.further_notification') }}
                                </p>
                            @endif
                        </x-card.body>
                    </x-card>
                </div>

                <div class="col-span-12 sm:col-span-6 lg:col-span-4">
                    <livewire:request-store-approval />
                </div>
            </div>
        </div>
    </div>

    <x-success-and-error-swal />
</x-app-layout>