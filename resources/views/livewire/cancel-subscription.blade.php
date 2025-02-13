<div class="p-6 bg-white rounded shadow-lg">
    <h2 class="text-xl font-bold text-red-600 mb-4">Cancelar Suscripción</h2>
    
    @if (session()->has('message'))
        <div class="p-3 mb-3 bg-green-200 text-green-800 rounded">
            {{ session('message') }}
        </div>
    @elseif (session()->has('error'))
        <div class="p-3 mb-3 bg-red-200 text-red-800 rounded">
            {{ session('error') }}
        </div>
    @endif

    <input type="email" wire:model="email" placeholder="Ingresa tu correo"
        class="border border-gray-400 p-2 w-full rounded mb-2">
    
    <button wire:click="cancel"
        class="bg-red-600 text-white px-4 py-2 rounded shadow hover:bg-red-700">
        Cancelar Suscripción
    </button>
</div>