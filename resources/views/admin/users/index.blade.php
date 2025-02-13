<x-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-center text-blue-700">👥 Gestión de Usuarios</h1>

        @if(session('status'))
            <p class="text-green-600 text-center">{{ session('status') }}</p>
        @endif

        <table class="w-full border-collapse bg-white shadow-md rounded-lg">
            <thead>
                <tr class="bg-blue-600 text-white">
                    <th class="p-3">ID</th>
                    <th class="p-3">Nombre</th>
                    <th class="p-3">Correo</th>
                    <th class="p-3">Estado</th>
                    <th class="p-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="border-b">
                        <td class="p-3 text-center">{{ $user->id }}</td>
                        <td class="p-3">{{ $user->name }}</td>
                        <td class="p-3">{{ $user->email }}</td>
                        <td class="p-3 text-center">
                            <span class="px-2 py-1 rounded text-white {{ $user->is_active ? 'bg-green-500' : 'bg-red-500' }}">
                                {{ $user->is_active ? 'Activo' : 'Inactivo' }}
                            </span>
                        </td>
                        <td class="p-3 text-center">
                            <form method="POST" action="{{ route('admin.users.toggle', $user) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="px-4 py-2 rounded text-white {{ $user->is_active ? 'bg-red-500' : 'bg-green-500' }}">
                                    {{ $user->is_active ? 'Inactivar' : 'Activar' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>