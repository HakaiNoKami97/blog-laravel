<x-layout>
    <!-- 📌 Componente de diseño base que envuelve la estructura de la página -->

    <div class="container mx-auto p-6">
        <!-- 📌 Contenedor principal con margen automático, espaciado interno de 6 -->

        <h1 class="text-3xl font-bold mb-6 text-center text-blue-700">📚 Publicaciones del Blog</h1>
        <!-- 📌 Título de la página con estilo grande, negrita, margen inferior y color azul -->

        @auth
            <!-- 📌 Verifica si el usuario está autenticado -->

            @if(auth()->user()->status === 'active')
                <!-- 📌 Verifica si el usuario autenticado tiene estado "activo" -->

                <livewire:create-post />
                <!-- 📌 Componente Livewire para crear una nueva publicación -->
            @endif

        @endauth

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            <!-- 📌 Contenedor de publicaciones en una cuadrícula adaptable -->
            <!-- 📌 1 columna en móviles, 2 en pantallas medianas, 3 en pantallas grandes -->
            <!-- 📌 `gap-6` agrega espacio entre los elementos -->

            @foreach($posts as $post)
                <!-- 📌 Recorre la colección de publicaciones y las muestra -->

                <div class="bg-white p-6 shadow-lg rounded-lg border border-gray-300">
                    <!-- 📌 Tarjeta de publicación con fondo blanco, sombra, bordes redondeados y borde gris -->

                    <h2 class="text-xl font-semibold text-gray-800">{{ $post->title }}</h2>
                    <!-- 📌 Título de la publicación con tamaño grande y color gris oscuro -->

                    <p class="text-gray-700 mt-2">{{ $post->description }}</p>
                    <!-- 📌 Descripción de la publicación con margen superior -->

                    <small class="text-gray-500 block mt-4">📅 Publicado el: {{ $post->published_at->format('d/m/Y') }}</small>
                    <!-- 📌 Fecha de publicación formateada como día/mes/año -->
                </div>
            @endforeach
        </div>

        @if($posts->isEmpty())
            <!-- 📌 Verifica si no hay publicaciones y muestra un mensaje -->

            <p class="text-gray-600 text-center mt-6 text-lg">📭 No hay publicaciones.</p>
            <!-- 📌 Mensaje de que no hay publicaciones, con estilo centrado y gris -->
        @endif
    </div>

    <!-- 📌 Formulario de suscripción -->
    <div class="mb-6 flex justify-center">
        @livewire('subscription-form')
        <!-- 📌 Componente Livewire para suscribirse a actualizaciones del blog -->
    </div>

    <!-- 📌 Formulario para cancelar suscripción -->
    <div class="mb-6 flex justify-center">
        @livewire('cancel-subscription')
        <!-- 📌 Componente Livewire para cancelar la suscripción -->
    </div>

    @if($posts->isEmpty())
        <!-- 📌 Verifica nuevamente si no hay publicaciones en la fecha seleccionada -->

        <p class="text-gray-600 text-center mt-6 text-lg">📭 No hay publicaciones en esta fecha.</p>
        <!-- 📌 Mensaje indicando que no hay publicaciones disponibles en la fecha filtrada -->
    @endif

</x-layout>
<!-- 📌 Cierre del componente de diseño -->