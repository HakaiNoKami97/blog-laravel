<div class="p-6 bg-white rounded shadow-lg">
    <!-- 📌 Contenedor principal con relleno, fondo blanco, bordes redondeados y sombra -->

    <h2 class="text-xl font-bold text-red-600 mb-4">Cancelar Suscripción</h2>
    <!-- 📌 Título de la sección en rojo, con tamaño grande, negrita y margen inferior -->

    @if (session()->has('message'))
        <!-- 📌 Verifica si existe un mensaje de éxito en la sesión -->

        <div class="p-3 mb-3 bg-green-200 text-green-800 rounded">
            <!-- 📌 Muestra un mensaje de éxito con fondo verde claro y texto verde oscuro -->

            {{ session('message') }}
            <!-- 📌 Muestra el mensaje almacenado en la sesión -->
        </div>

    @elseif (session()->has('error'))
        <!-- 📌 Verifica si existe un mensaje de error en la sesión -->

        <div class="p-3 mb-3 bg-red-200 text-red-800 rounded">
            <!-- 📌 Muestra un mensaje de error con fondo rojo claro y texto rojo oscuro -->

            {{ session('error') }}
            <!-- 📌 Muestra el mensaje de error almacenado en la sesión -->
        </div>
    @endif

    <input type="email" wire:model="email" placeholder="Ingresa tu correo"
        class="border border-gray-400 p-2 w-full rounded mb-2">
    <!-- 📌 Campo de entrada para el correo electrónico con borde gris, relleno, ancho completo y bordes redondeados -->
    <!-- 📌 Se vincula con la propiedad `email` en Livewire usando `wire:model` -->
    <!-- 📌 Muestra un texto de ayuda "Ingresa tu correo" como placeholder -->

    <button wire:click="cancel"
        class="bg-red-600 text-white px-4 py-2 rounded shadow hover:bg-red-700">
        <!-- 📌 Botón para cancelar la suscripción -->
        <!-- 📌 Vinculado al método `cancel` en Livewire usando `wire:click` -->
        <!-- 📌 Fondo rojo, texto blanco, relleno, bordes redondeados y sombra -->
        <!-- 📌 Cambia a un rojo más oscuro cuando se pasa el cursor encima (`hover:bg-red-700`) -->

        Cancelar Suscripción
    </button>
</div>