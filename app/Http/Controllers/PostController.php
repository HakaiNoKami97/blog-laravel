<?php
use Illuminate\Support\Facades\Log;
use Exception;

public function store(Request $request)
{
    try {
        // Valida los datos recibidos del formulario
        $request->validate([
            'title' => 'required|string|max:255', // El título es obligatorio, debe ser una cadena y no mayor a 255 caracteres
            'description' => 'required|string',   // La descripción es obligatoria y debe ser una cadena
        ]);

        // Verifica si el usuario está activo antes de permitirle publicar
        if (!auth()->user()->is_active) {
            // Si el usuario no está activo, redirige de vuelta con un mensaje de error
            return redirect()->back()->with('error', 'No tienes permisos para publicar.');
        }

        // Crea una nueva publicación en la base de datos
        Post::create([
            'title' => $request->title,           // Asigna el título recibido en el formulario
            'description' => $request->description, // Asigna la descripción recibida en el formulario
            'published_at' => now(),              // Asigna la fecha y hora actual como fecha de publicación
        ]);

        // Redirige a la lista de publicaciones con un mensaje de éxito
        return redirect()->route('posts.index')->with('success', 'Publicación creada correctamente.');
    } catch (Exception $e) {
        // Registra el error en los logs con el mensaje de la excepción
        Log::error('Error al crear el post: ' . $e->getMessage());

        // Redirige de vuelta con un mensaje de error para el usuario
        return redirect()->back()->with('error', 'Ocurrió un error al guardar el post.');
    }
}