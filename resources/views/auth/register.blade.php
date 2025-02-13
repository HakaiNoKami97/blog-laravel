<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nombre -->
        <div>
            <label for="name">Nombre</label>
            <input id="name" type="text" name="name" required>
            @error('name') <p class="text-red-500">{{ $message }}</p> @enderror
        </div>

        <!-- Correo -->
        <div>
            <label for="email">Correo Electrónico</label>
            <input id="email" type="email" name="email" required>
            @error('email') <p class="text-red-500">{{ $message }}</p> @enderror
        </div>

        <!-- Fecha de Nacimiento -->
        <div>
            <label for="date_of_birth">Fecha de Nacimiento</label>
            <input id="date_of_birth" type="date" name="date_of_birth" required>
            @error('date_of_birth') <p class="text-red-500">{{ $message }}</p> @enderror
        </div>

        <!-- Contraseña -->
        <div>
            <label for="password">Contraseña</label>
            <input id="password" type="password" name="password" required>
            @error('password') <p class="text-red-500">{{ $message }}</p> @enderror
        </div>

        <!-- Confirmación de Contraseña -->
        <div>
            <label for="password_confirmation">Confirmar Contraseña</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required>
        </div>

        <button type="submit">Registrarse</button>
    </form>
</x-guest-layout>