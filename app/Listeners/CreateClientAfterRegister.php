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
            'user_id' => $event->user->id,
            'name' => $event->user->name,
            'email' => $event->user->email,
            'phone_number' => null,
            'balance' => 0,
        ]);
    }
}
