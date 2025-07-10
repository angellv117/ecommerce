<?php

namespace App\Livewire\Admin\Users;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;

class UserTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        // Redirigir a la vista de la orden
        $this->setTableRowUrl(function($row) {
            return route('admin.users.edit', $row->id);
        });
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nombre", "name")
                ->sortable(),
            Column::make("Apellidos", "last_name")
                ->sortable(),
            Column::make("Rol", "role_id")
                ->format(function ($value) {
                    if ($value == 1) {
                        return '<span class="text-white bg-yellow-500 text-center rounded-full px-2 py-1">Administrador</span>';
                    } else if ($value == 2) {
                        return '<span class="text-white bg-green-500 text-center rounded-full px-2 py-1">Vendedor</span>';
                    } else {
                        return '<span class="text-white bg-blue-500 text-center rounded-full px-2 py-1">Comprador</span>';
                    }
                })
                ->html()
                ->sortable(),
            Column::make("Teléfono", "phone")
                ->sortable(),
            Column::make("Correo electrónico", "email")
                ->sortable(),
        ];
    }
}
