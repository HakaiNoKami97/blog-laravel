<x-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-center text-blue-700">📚 Publicaciones del Blog</h1>

        <!-- Campo de búsqueda por fecha -->
        <div class="mb-6 flex justify-center">
            <input type="date" wire:model="searchDate"
                class="border border-gray-400 p-3 rounded-lg shadow-md w-64 text-gray-700">
        </div>

        <!-- Lista de publicaciones -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
                <div class="bg-white p-6 shadow-lg rounded-lg border border-gray-300">
                    <h2 class="text-xl font-semibold text-gray-800">{{ $post->title }}</h2>
                    <p class="text-gray-700 mt-2">{{ $post->description }}</p>
                    <small class="text-gray-500 block mt-4">📅 Publicado el: {{ \Carbon\Carbon::parse($post->published_at)->format('d/m/Y') }}</small>
                </div>
            @endforeach
        </div>

        <!-- Formulario de suscripción -->
        <div class="mb-6 flex justify-center">
            @livewire('subscription-form')
        </div>

        <div class="mb-6 flex justify-center">
            @livewire('cancel-subscription')
        </div>

        @if($posts->isEmpty())
            <p class="text-gray-600 text-center mt-6 text-lg">📭 No hay publicaciones en esta fecha.</p>
        @endif
    </div>
</x-layout>