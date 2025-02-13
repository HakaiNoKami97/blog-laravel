<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Subscription;

class SubscriptionForm extends Component
{
    public $email; // Variable para capturar el email

    public function subscribe()
    {
        // Validación
        $this->validate([
            'email' => 'required|email|unique:subscriptions,email',
        ]);

        // Crear la suscripción
        Subscription::create([
            'email' => $this->email,
        ]);

        // Limpiar el campo después de suscribirse
        $this->reset('email');

        // Mensaje de confirmación
        session()->flash('message', '¡Suscripción exitosa!');
    }

    public function render()
    {
        return view('livewire.subscription-form');
    }
}