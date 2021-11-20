<?php

namespace App\Http\Livewire\Datatables;

use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DataPengguna extends LivewireDatatable
{
    public $exportable = true;

    public function builder()
    {
        return User::query()
            ->with('sales');
    }

    public function columns()
    {
        return [
            Column::name('id')
                ->label('ID User')
                ->searchable(),

            Column::name('name')
                ->label('Nama')
                ->searchable(),

            Column::name('email')
                ->label('Email')
                ->searchable(),

            Column::name('sales.phone_number')
                ->label('Nomor HP')
                ->searchable(),
        ];
    }
}