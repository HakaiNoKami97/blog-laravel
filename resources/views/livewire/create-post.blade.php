<div class="bg-white p-6 shadow-lg rounded-lg border border-gray-300">
    <h2 class="text-xl font-bold mb-4">📝 Crear Publicación</h2>

    @if (session()->has('success'))
        <p class="bg-green-100 text-green-800 p-2 rounded">{{ session('success') }}</p>
    @endif

    <form wire:submit.prevent="createPost" class="space-y-4">
        <div>
            <label for="title" class="block text-gray-700 font-semibold">Título</label>
            <input type="text" wire:model="title" id="title"
                class="w-full p-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300">
            @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="description" class="block text-gray-700 font-semibold">Descripción</label>
            <textarea wire:model="description" id="description"
                class="w-full p-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300"></textarea>
            @error('description') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
            Publicar
        </button>
    </form>
</div>