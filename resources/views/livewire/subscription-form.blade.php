<div class="bg-white p-6 rounded-lg shadow-md text-center">
    <h2 class="text-xl font-semibold mb-4">📩 Suscríbete a nuestro blog</h2>

    @if (session()->has('message'))
        <div class="bg-green-200 text-green-800 p-3 rounded mb-3">
            {{ session('message') }}
        </div>
    @endif

    <input type="email" wire:model="email"
        class="border border-gray-400 p-3 rounded-lg w-full mb-3"
        placeholder="Ingresa tu email">

    <button wire:click="subscribe"
        class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-lg">
        Suscribirse
    </button>
</div>