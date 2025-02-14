<div class="bg-white p-6 rounded-lg shadow-md text-center">
    <!-- 📌 Contenedor principal con fondo blanco, relleno, bordes redondeados y sombra -->
    <!-- 📌 `text-center` centra el contenido dentro del div -->

    <h2 class="text-xl font-semibold mb-4">📩 Suscríbete a nuestro blog</h2>
    <!-- 📌 Título del formulario con icono, tamaño de texto grande (`text-xl`), negrita (`font-semibold`) y margen inferior -->

    @if (session()->has('message'))
        <!-- 📌 Verifica si existe un mensaje en la sesión -->

        <div class="bg-green-200 text-green-800 p-3 rounded mb-3">
            <!-- 📌 Muestra un mensaje de éxito si la suscripción se realizó correctamente -->
            <!-- 📌 Fondo verde claro (`bg-green-200`), texto verde oscuro (`text-green-800`), relleno y esquinas redondeadas -->

            {{ session('message') }}
            <!-- 📌 Muestra el mensaje almacenado en la sesión -->
        </div>
    @endif

    <input type="email" wire:model="email"
        class="border border-gray-400 p-3 rounded-lg w-full mb-3"
        placeholder="Ingresa tu email">
    <!-- 📌 Campo de entrada para el correo electrónico -->
    <!-- 📌 `wire:model="email"` vincula este input con la propiedad `email` en Livewire -->
    <!-- 📌 `border border-gray-400` agrega un borde gris -->
    <!-- 📌 `p-3` añade espacio interno -->
    <!-- 📌 `rounded-lg` aplica esquinas redondeadas -->
    <!-- 📌 `w-full` hace que ocupe el 100% del ancho disponible -->
    <!-- 📌 `mb-3` añade margen inferior -->
    <!-- 📌 `placeholder="Ingresa tu email"` muestra un texto de ayuda dentro del campo -->

    <button wire:click="subscribe"
        class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-lg">
        <!-- 📌 Botón para suscribirse -->
        <!-- 📌 `wire:click="subscribe"` ejecuta el método `subscribe` en Livewire al hacer clic -->
        <!-- 📌 `bg-blue-500` color de fondo azul -->
        <!-- 📌 `hover:bg-blue-700` cambia el color al pasar el mouse -->
        <!-- 📌 `text-white` hace que el texto sea blanco -->
        <!-- 📌 `py-2 px-4` agrega relleno vertical y horizontal -->
        <!-- 📌 `rounded-lg` aplica esquinas redondeadas más grandes -->

        Suscribirse
    </button>
</div>