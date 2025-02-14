<x-layout> {{-- 📌 Usa un layout base para la estructura de la página --}}
    <div class="container mx-auto p-6"> {{-- 📌 Contenedor principal con márgenes automáticos y padding --}}
        
        {{-- 📌 Título de la página con estilos de Tailwind --}}
        <h1 class="text-3xl font-bold mb-6 text-center text-blue-700">🌍 Publicaciones Externas</h1>

        {{-- 📌 Enlace para crear una nueva publicación, con estilo de botón azul --}}
        <a href="{{ route('api.posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
            Crear Nueva Publicación
        </a>

        {{-- 📌 Contenedor que organiza las publicaciones en un grid responsivo --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            @foreach($posts as $post) {{-- 📌 Itera sobre la lista de publicaciones obtenidas de la API externa --}}
                
                {{-- 📌 Tarjeta para cada publicación con fondo blanco, sombras y bordes redondeados --}}
                <div class="bg-white p-6 shadow-lg rounded-lg border border-gray-300">
                    
                    {{-- 📌 Muestra el título de la publicación con tamaño grande y color gris oscuro --}}
                    <h2 class="text-xl font-semibold text-gray-800">{{ $post['title'] }}</h2>

                    {{-- 📌 Muestra el contenido de la publicación con un margen superior --}}
                    <p class="text-gray-700 mt-2">{{ $post['body'] }}</p>

                    {{-- 📌 Enlace para ver más detalles de la publicación --}}
                    <a href="{{ route('api.posts.show', $post['id']) }}" class="text-blue-500 mt-4 inline-block">
                        Ver más
                    </a>

                </div> {{-- 📌 Fin de la tarjeta --}}
            @endforeach {{-- 📌 Fin del bucle de publicaciones --}}
        </div> {{-- 📌 Fin del contenedor grid --}}
    </div> {{-- 📌 Fin del contenedor principal --}}
</x-layout> {{-- 📌 Cierre del layout --}}