<div>
    <x-slot name="header">
        Data Pengguna
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-card class="p-4">
                <livewire:datatable
                    model="\App\Models\User"
                    include="id, name|Nama, email"
                    hide="role, email_verified_at, created_at, updated_at"
                    searchable="name, email"
                    exportable
                />
            </x-card>
        </div>
    </div>
</div>
