<x-layout> {{-- 📌 Usa un layout base para la estructura de la página --}}
    <div class="container mx-auto p-6"> {{-- 📌 Contenedor con márgenes automáticos y padding --}}
        <h1 class="text-3xl font-bold mb-6 text-center text-blue-700">👥 Gestión de Usuarios</h1> {{-- 📌 Título principal estilizado --}}

        {{-- 📌 Muestra un mensaje de estado si existe una notificación en la sesión --}}
        @if(session('status'))
            <p class="text-green-600 text-center">{{ session('status') }}</p>
        @endif

        {{-- 📌 Tabla para mostrar la lista de usuarios --}}
        <table class="w-full border-collapse bg-white shadow-md rounded-lg">
            <thead> {{-- 📌 Encabezado de la tabla --}}
                <tr class="bg-blue-600 text-white"> {{-- 📌 Fila del encabezado con fondo azul y texto blanco --}}
                    <th class="p-3">ID</th> {{-- 📌 Columna de ID --}}
                    <th class="p-3">Nombre</th> {{-- 📌 Columna de Nombre --}}
                    <th class="p-3">Correo</th> {{-- 📌 Columna de Correo --}}
                    <th class="p-3">Estado</th> {{-- 📌 Columna de Estado --}}
                    <th class="p-3">Acciones</th> {{-- 📌 Columna de Acciones --}}
                </tr>
            </thead>
            <tbody> {{-- 📌 Cuerpo de la tabla con los usuarios --}}
                @foreach($users as $user) {{-- 📌 Itera sobre la lista de usuarios --}}
                    <tr class="border-b"> {{-- 📌 Fila con borde inferior --}}
                        <td class="p-3 text-center">{{ $user->id }}</td> {{-- 📌 Muestra el ID del usuario --}}
                        <td class="p-3">{{ $user->name }}</td> {{-- 📌 Muestra el nombre del usuario --}}
                        <td class="p-3">{{ $user->email }}</td> {{-- 📌 Muestra el correo del usuario --}}
                        <td class="p-3 text-center"> {{-- 📌 Columna de estado del usuario --}}
                            <span class="px-2 py-1 rounded text-white {{ $user->is_active ? 'bg-green-500' : 'bg-red-500' }}"> {{-- 📌 Aplica color verde si está activo, rojo si está inactivo --}}
                                {{ $user->is_active ? 'Activo' : 'Inactivo' }} {{-- 📌 Muestra el estado del usuario --}}
                            </span>
                        </td>
                        <td class="p-3 text-center"> {{-- 📌 Columna de acciones --}}
                            <form method="POST" action="{{ route('admin.users.toggle', $user) }}"> {{-- 📌 Formulario para cambiar el estado del usuario --}}
                                @csrf {{-- 📌 Token de seguridad CSRF --}}
                                @method('PATCH') {{-- 📌 Define el método HTTP como PATCH --}}
                                <button type="submit" class="px-4 py-2 rounded text-white {{ $user->is_active ? 'bg-red-500' : 'bg-green-500' }}"> {{-- 📌 Botón con color dinámico según el estado --}}
                                    {{ $user->is_active ? 'Inactivar' : 'Activar' }} {{-- 📌 Cambia el texto del botón según el estado actual --}}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach {{-- 📌 Fin del bucle de usuarios --}}
            </tbody>
        </table>
    </div>
</x-layout> {{-- 📌 Cierre del layout --}}