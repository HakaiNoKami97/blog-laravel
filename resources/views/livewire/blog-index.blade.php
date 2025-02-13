<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Publicaciones del Blog</h1>

        @foreach($posts as $post)
            <div class="bg-white p-4 shadow rounded mb-4">
                <h2 class="text-xl font-semibold">{{ $post->title }}</h2>
                <p>{{ $post->description }}</p>
                <small class="text-gray-500">Publicado el: {{ $post->created_at->format('d/m/Y') }}</small>
            </div>
        @endforeach

        @if($posts->isEmpty())
            <p class="text-gray-600">No hay publicaciones aún.</p>
        @endif
    </div>
</x-layout>