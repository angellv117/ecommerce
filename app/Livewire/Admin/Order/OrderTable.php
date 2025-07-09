<?php

namespace App\Livewire\Admin\Order;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Order;
use App\Models\User;

class OrderTable extends DataTableComponent
{
    protected $model = Order::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        // Redirigir a la vista de la orden
        $this->setTableRowUrl(function($row) {
            return route('admin.orders.edit', $row->id);
        });
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("ID de pago", "payment_id")
                ->sortable(),
            Column::make("Cliente", "address")
                ->format(function ($value) {
                    $user = User::where('id', $value['user_id'])->first();
                    return $user->name . ' ' . $user->last_name;
                })
                ->sortable(),
            Column::make("Total", "total")
                ->format(function ($value) {
                    return '$' . number_format($value, 2);
                })
                ->sortable(),
            Column::make("Productos", "content")
                ->format(function ($value) {
                    return count($value);
                })
                ->sortable(),
            Column::make("Status", "status")
                ->format(function ($value) {
                    return '<span class="text-sm font-medium ' . $value->color() . ' rounded-full px-2 py-1">'
                        . $value->label() .
                        '</span>';
                })
                ->html()
                ->sortable(),
            Column::make("Método de pago", "payment_method")
                ->sortable(),
            Column::make("Status", "status")
                ->format(function ($value) {
                    return '<a>' . $value->label() . $value->color() . '</a>';
                })
                ->html(),
            Column::make("Fecha", "created_at")
                ->format(function ($value) {
                    return $value->format('d/m/Y H:i');
                })
                ->sortable(),
        ];
    }
}
