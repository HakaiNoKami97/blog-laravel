<x-guest-layout> {{-- 📌 Usa un layout específico para usuarios invitados (sin sesión iniciada) --}}

    {{-- 📌 Formulario para el registro de usuarios, enviando datos vía POST a la ruta 'register' --}}
    <form method="POST" action="{{ route('register') }}">
        @csrf {{-- 📌 Token de seguridad para prevenir ataques CSRF --}}

        <!-- Nombre -->
        <div> {{-- 📌 Contenedor del campo de entrada para el nombre --}}
            <label for="name">Nombre</label> {{-- 📌 Etiqueta para el campo de nombre --}}
            <input id="name" type="text" name="name" required> {{-- 📌 Input para el nombre, obligatorio --}}
            @error('name') {{-- 📌 Muestra un mensaje de error si la validación falla --}}
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Correo -->
        <div> {{-- 📌 Contenedor del campo de entrada para el correo --}}
            <label for="email">Correo Electrónico</label> {{-- 📌 Etiqueta para el campo de correo --}}
            <input id="email" type="email" name="email" required> {{-- 📌 Input para el email, obligatorio --}}
            @error('email') {{-- 📌 Muestra un mensaje de error si la validación falla --}}
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Fecha de Nacimiento -->
        <div> {{-- 📌 Contenedor del campo de entrada para la fecha de nacimiento --}}
            <label for="date_of_birth">Fecha de Nacimiento</label> {{-- 📌 Etiqueta para el campo de fecha de nacimiento --}}
            <input id="date_of_birth" type="date" name="date_of_birth" required> {{-- 📌 Input tipo fecha, obligatorio --}}
            @error('date_of_birth') {{-- 📌 Muestra un mensaje de error si la validación falla --}}
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Contraseña -->
        <div> {{-- 📌 Contenedor del campo de entrada para la contraseña --}}
            <label for="password">Contraseña</label> {{-- 📌 Etiqueta para el campo de contraseña --}}
            <input id="password" type="password" name="password" required> {{-- 📌 Input tipo password, obligatorio --}}
            @error('password') {{-- 📌 Muestra un mensaje de error si la validación falla --}}
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirmación de Contraseña -->
        <div> {{-- 📌 Contenedor del campo de entrada para confirmar la contraseña --}}
            <label for="password_confirmation">Confirmar Contraseña</label> {{-- 📌 Etiqueta para la confirmación de contraseña --}}
            <input id="password_confirmation" type="password" name="password_confirmation" required> {{-- 📌 Input para repetir la contraseña --}}
        </div>

        {{-- 📌 Botón para enviar el formulario y registrar al usuario --}}
        <button type="submit">Registrarse</button>

    </form>
</x-guest-layout> {{-- 📌 Cierre del layout para invitados --}}