<div class="bg-white p-6 shadow-lg rounded-lg border border-gray-300">
    <!-- 📌 Contenedor principal con fondo blanco, relleno, sombra, bordes redondeados y un borde gris -->

    <h2 class="text-xl font-bold mb-4">📝 Crear Publicación</h2>
    <!-- 📌 Título del formulario con icono, texto grande y en negrita, con margen inferior -->

    @if (session()->has('success'))
        <!-- 📌 Verifica si hay un mensaje de éxito en la sesión -->

        <p class="bg-green-100 text-green-800 p-2 rounded">{{ session('success') }}</p>
        <!-- 📌 Muestra el mensaje de éxito con fondo verde claro, texto verde oscuro, relleno y bordes redondeados -->
    @endif

    <form wire:submit.prevent="createPost" class="space-y-4">
        <!-- 📌 Formulario vinculado a Livewire -->
        <!-- 📌 Usa `wire:submit.prevent="createPost"` para evitar que la página se recargue y llamar al método `createPost` en Livewire -->
        <!-- 📌 `class="space-y-4"` agrega espacio vertical entre los elementos del formulario -->

        <div>
            <!-- 📌 Grupo para el campo del título -->

            <label for="title" class="block text-gray-700 font-semibold">Título</label>
            <!-- 📌 Etiqueta para el campo del título con texto gris oscuro y negrita -->

            <input type="text" wire:model="title" id="title"
                class="w-full p-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300">
            <!-- 📌 Campo de entrada para el título -->
            <!-- 📌 `wire:model="title"` vincula este campo con la propiedad `title` en Livewire -->
            <!-- 📌 `w-full` hace que ocupe el 100% del ancho disponible -->
            <!-- 📌 `p-2` agrega padding -->
            <!-- 📌 `border rounded-md` agrega un borde con esquinas redondeadas -->
            <!-- 📌 `focus:outline-none focus:ring focus:ring-blue-300` aplica efectos cuando el usuario selecciona el campo -->

            @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            <!-- 📌 Muestra un mensaje de error si hay problemas con la validación del título -->
            <!-- 📌 Texto rojo (`text-red-500`) y tamaño pequeño (`text-sm`) -->
        </div>

        <div>
            <!-- 📌 Grupo para el campo de descripción -->

            <label for="description" class="block text-gray-700 font-semibold">Descripción</label>
            <!-- 📌 Etiqueta para el campo de descripción con texto gris oscuro y negrita -->

            <textarea wire:model="description" id="description"
                class="w-full p-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300"></textarea>
            <!-- 📌 Área de texto para la descripción -->
            <!-- 📌 `wire:model="description"` vincula este campo con la propiedad `description` en Livewire -->
            <!-- 📌 Estilos similares al campo de título -->

            @error('description') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            <!-- 📌 Muestra un mensaje de error si hay problemas con la validación de la descripción -->
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
            <!-- 📌 Botón para enviar el formulario -->
            <!-- 📌 `bg-blue-500` pone un fondo azul -->
            <!-- 📌 `text-white` hace que el texto sea blanco -->
            <!-- 📌 `px-4 py-2` agrega relleno horizontal y vertical -->
            <!-- 📌 `rounded` agrega esquinas redondeadas -->
            <!-- 📌 `hover:bg-blue-700` cambia el color cuando el usuario pasa el mouse por encima -->

            Publicar
        </button>
    </form>
</div>