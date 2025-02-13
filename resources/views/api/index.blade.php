<x-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-center text-blue-700">🌍 Publicaciones Externas</h1>

        <a href="{{ route('api.posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Crear Nueva Publicación</a>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            @foreach($posts as $post)
                <div class="bg-white p-6 shadow-lg rounded-lg border border-gray-300">
                    <h2 class="text-xl font-semibold text-gray-800">{{ $post['title'] }}</h2>
                    <p class="text-gray-700 mt-2">{{ $post['body'] }}</p>
                    <a href="{{ route('api.posts.show', $post['id']) }}" class="text-blue-500 mt-4 inline-block">Ver más</a>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>