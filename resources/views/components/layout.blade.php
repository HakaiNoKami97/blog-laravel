<!DOCTYPE html> <!-- 📌 Define el tipo de documento como HTML5 -->
<html lang="es"> <!-- 📌 Inicia el documento HTML y define el idioma como español -->

<head>
    <meta charset="UTF-8"> <!-- 📌 Especifica la codificación de caracteres para admitir caracteres especiales -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- 📌 Configura la página para ser responsive en dispositivos móviles -->

    @vite(['resources/css/app.css', 'resources/js/app.js']) 
    <!-- 📌 Usa Vite para cargar los archivos CSS y JS desde Laravel (optimización de assets) -->

    <title>Blog</title> <!-- 📌 Define el título de la página que se mostrará en la pestaña del navegador -->

    @livewireStyles <!-- 📌 Inserta automáticamente los estilos necesarios para Livewire -->
</head>

<body class="bg-gray-100"> <!-- 📌 Define el color de fondo de la página usando clases de Tailwind CSS -->

    <main class="container mx-auto p-4"> <!-- 📌 Contenedor principal con margen automático y padding -->
        {{ $slot }} <!-- 📌 Espacio donde se insertará el contenido dinámico del layout -->
    </main>

    @livewireScripts <!-- 📌 Carga los scripts necesarios para que Livewire funcione correctamente -->
</body>

</html> <!-- 📌 Cierra la estructura del documento HTML -->