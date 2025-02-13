<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Subscription;

class CancelSubscription extends Component
{
    public $email;

    public function cancel()
    {
        $subscription = Subscription::where('email', $this->email)->first();

        if ($subscription) {
            $subscription->delete();
            session()->flash('message', 'Tu suscripción ha sido cancelada exitosamente.');
        } else {
            session()->flash('error', 'No se encontró una suscripción con este correo.');
        }
    }

    public function render()
    {
        return view('livewire.cancel-subscription');
    }
}