<div class="flex flex-col items-end">
    <p>
        Progress
    </p>

    <div class="flex flex-col">
        <div class="grid grid-cols-3 grid-flow-row mt-2">
            <div class="col-span-1 px-2 py-1 border rounded-l bg-green-50 border-green-300 text-green-700">
                Approval
            </div>
            <div class="col-span-1 px-2 py-1 border border-l-0 {{ $progress->is_apk_created ? 'bg-green-50 border-green-300 text-green-700' : '' }}">
                Generate APK
            </div>
            <div class="col-span-1 px-2 py-1 border rounded-r border-l-0 {{ $progress->is_published_on_google_play ? 'bg-green-50 border-green-300 text-green-700' : '' }}">
                Upload PlayStore
            </div>
        </div>

        <div class="grid grid-cols-3 grid-flow-row gap-4 mt-2">
            <div class="col-span-1">
                <a href="{{ route('merchant.show', $progress->user->form_order) }}"> 
                    <x-button>
                        Buka Web
                    </x-button>
                </a>
            </div>
            <div class="col-span-1 flex flex-col">
                @if ($progress->is_apk_created)
                    <x-button wire:click="completeApk" disabled>
                        APK <i class="fas fa-check ml-2"></i>
                    </x-button>
                @else
                    <x-button wire:click="completeApk">
                        APK <i class="fas fa-check ml-2"></i>
                    </x-button>
                @endif
            </div>
            <div class="col-span-1 flex flex-col">
                @if ($progress->is_published_on_google_play)
                    <x-button wire:click="completePublish" disabled>
                        Upload <i class="fas fa-check ml-2"></i>
                    </x-button>
                @else
                    <x-button wire:click="completePublish">
                        Upload <i class="fas fa-check ml-2"></i>
                    </x-button>
                @endif
            </div>
        </div>
    </div>
</div>