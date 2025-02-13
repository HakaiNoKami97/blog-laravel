<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    @livewireStyles
</head>
<body class="bg-gray-100">
    <main class="container mx-auto p-4">
        {{ $slot }}
    </main>
    @livewireScripts
</body>
</html>