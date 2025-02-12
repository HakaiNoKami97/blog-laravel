<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4">Publicaciones del Blog</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($posts as $post)
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-xl font-semibold">{{ $post->title }}</h2>
                <p class="text-gray-600">{{ $post->description }}</p>
                <p class="text-sm text-gray-500">Publicado el: {{ $post->published_at }}</p>
            </div>
        @endforeach
    </div>
</div>