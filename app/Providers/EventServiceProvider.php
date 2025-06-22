<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Los listeners del evento para la aplicación.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        \illuminate\Auth\Events\Login::class => [
            \App\Listeners\Login\RestoreCartItems::class,
        ],
    ];
        

        
   
    /**
     * Registra los eventos para tu aplicación.
     */
    public function boot(): void
    {
        parent::boot();

        //
    }

    /**
     * Registra cualquier evento para el arranque.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
