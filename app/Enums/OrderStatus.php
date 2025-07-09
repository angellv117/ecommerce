<?php

namespace App\Enums;

enum OrderStatus : int
{ 
    case PENDIENTE = 1;
    case PROCESANDO = 2;
    case ENVIADO = 3;
    case COMPLETADO = 4;
    case CANCELADO = 5;
    case FALLIDO = 6;
    case DEVOLUCION = 7;

    public function color(): string
    {
        return match($this) {
            self::PENDIENTE => 'text-white bg-yellow-500 text-center',
            self::PROCESANDO => 'text-white bg-blue-500 text-center',
            self::ENVIADO => 'text-white bg-indigo-500 text-center',
            self::COMPLETADO => 'text-white bg-green-500 text-center',
            self::CANCELADO, self::FALLIDO => 'text-white bg-red-600 text-center',
            self::DEVOLUCION => 'text-white bg-gray-500 text-center',
        };
    }

    public function label(): string
    {
        return match($this) {
            self::PENDIENTE => 'Pendiente',
            self::PROCESANDO => 'Procesando',
            self::ENVIADO => 'Enviado',
            self::COMPLETADO => 'Completado',
            self::CANCELADO => 'Cancelado',
            self::FALLIDO => 'Fallido',
            self::DEVOLUCION => 'Devolución',
        };
    }
}
