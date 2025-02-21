<?php

namespace App\Listeners;

use App\Models\Client;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

class CreateClientAfterRegister
{
    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        // Crear un cliente asociado al nuevo usuario registrado
        Client::create([
            'user_id' => $event->user->id,  // Asociamos el cliente con el ID del usuario registrado
            'name' => $event->user->name,    // Opcional: Puedes copiar el nombre del usuario
            'email' => $event->user->email,  // Opcional: Puedes copiar el email del usuario
            'phone_number' => null,           // Puedes asignar valores predeterminados o vacíos
            'balance' => 0,                   // Balance inicial
        ]);
    }
}
