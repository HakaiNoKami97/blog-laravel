@if (session('success')) 
    <!-- 📌 Verifica si hay un mensaje de éxito almacenado en la sesión -->

    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <!-- 📌 Muestra un contenedor con estilo verde para indicar éxito -->
        <!-- 📌 `bg-green-100` (fondo verde claro), `border-green-400` (borde verde), `text-green-700` (texto verde oscuro) -->
        <!-- 📌 `px-4 py-3` (espaciado interno), `rounded` (bordes redondeados), `relative` (posición relativa) -->

        <strong class="font-bold">¡Éxito!</strong> 
        <!-- 📌 Texto en negrita para resaltar el título del mensaje -->

        <span class="block sm:inline">{{ session('success') }}</span>
        <!-- 📌 Muestra el mensaje almacenado en la sesión bajo la clave 'success' -->
    </div>
@endif

@if (session('error')) 
    <!-- 📌 Verifica si hay un mensaje de error almacenado en la sesión -->

    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <!-- 📌 Muestra un contenedor con estilo rojo para indicar un error -->
        <!-- 📌 `bg-red-100` (fondo rojo claro), `border-red-400` (borde rojo), `text-red-700` (texto rojo oscuro) -->
        <!-- 📌 `px-4 py-3` (espaciado interno), `rounded` (bordes redondeados), `relative` (posición relativa) -->

        <strong class="font-bold">Error:</strong> 
        <!-- 📌 Texto en negrita para resaltar el título del mensaje de error -->

        <span class="block sm:inline">{{ session('error') }}</span>
        <!-- 📌 Muestra el mensaje almacenado en la sesión bajo la clave 'error' -->
    </div>
@endif