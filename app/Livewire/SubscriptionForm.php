<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Subscription;

class SubscriptionForm extends Component
{
    // 📌 Variable pública para capturar el correo electrónico ingresado por el usuario
    public $email;

    public function subscribe()
    {
        // ✅ Validación del email ingresado
        $this->validate([
            'email' => 'required|email|unique:subscriptions,email', // 🔹 El campo es obligatorio, debe ser un email válido y único en la tabla 'subscriptions'
        ]);

        // 📝 Crear una nueva suscripción en la base de datos
        Subscription::create([
            'email' => $this->email, // 📌 Guarda el email ingresado en la base de datos
        ]);

        // 🔄 Limpiar el campo de email después de completar la suscripción
        $this->reset('email');

        // 💬 Mensaje de confirmación para informar al usuario que la suscripción fue exitosa
        session()->flash('message', '¡Suscripción exitosa!');
    }

    // 🎨 Renderiza la vista del formulario de suscripción
    public function render()
    {
        return view('livewire.subscription-form');
    }
}