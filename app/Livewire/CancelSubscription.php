<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Subscription;

class CancelSubscription extends Component
{
    // 📧 Variable pública para almacenar el correo electrónico del usuario
    public $email;

    // ❌ Método para cancelar la suscripción de un usuario
    public function cancel()
    {
        // 🔍 Busca en la base de datos una suscripción con el correo ingresado
        $subscription = Subscription::where('email', $this->email)->first();

        // ✅ Si la suscripción existe, se elimina
        if ($subscription) {
            $subscription->delete(); // 🗑️ Elimina la suscripción de la base de datos
            
            // 💬 Muestra un mensaje de éxito en la sesión
            session()->flash('message', 'Tu suscripción ha sido cancelada exitosamente.');
        } else {
            // ❌ Si no se encuentra la suscripción, muestra un mensaje de error
            session()->flash('error', 'No se encontró una suscripción con este correo.');
        }
    }

    // 🎨 Renderiza la vista del componente Livewire
    public function render()
    {
        return view('livewire.cancel-subscription');
    }
}