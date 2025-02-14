<!DOCTYPE html>
<!-- 📌 Declara el tipo de documento como HTML5 -->

<html lang="es">
<!-- 📌 Define el idioma del documento como español -->

<head>
    <meta charset="UTF-8">
    <!-- 📌 Establece la codificación de caracteres en UTF-8 para soportar caracteres especiales -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 📌 Configura la vista para que sea responsive en dispositivos móviles -->
    <!-- 📌 `width=device-width` hace que el ancho sea el mismo que el del dispositivo -->
    <!-- 📌 `initial-scale=1.0` establece el nivel de zoom inicial -->

    <title>Blog</title>
    <!-- 📌 Define el título de la página que aparecerá en la pestaña del navegador -->

    @livewireStyles
    <!-- 📌 Inyecta los estilos necesarios para Livewire -->
</head>

<body class="bg-gray-100">
    <!-- 📌 Cuerpo de la página con un fondo gris claro (`bg-gray-100`) -->

    @livewire('blog-index')
    <!-- 📌 Inserta el componente Livewire llamado `blog-index` -->
    <!-- 📌 Este componente gestionará la visualización y lógica del blog -->

    @livewireScripts
    <!-- 📌 Inyecta los scripts necesarios para que Livewire funcione correctamente -->
</body>

</html>