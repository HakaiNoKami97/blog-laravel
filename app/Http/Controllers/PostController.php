<?php
use Illuminate\Support\Facades\Log;
use Exception;

public function store(Request $request)
{
    try {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        if (!auth()->user()->is_active) {
            return redirect()->back()->with('error', 'No tienes permisos para publicar.');
        }

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'published_at' => now(),
        ]);

        return redirect()->route('posts.index')->with('success', 'Publicación creada correctamente.');
    } catch (Exception $e) {
        Log::error('Error al crear el post: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Ocurrió un error al guardar el post.');
    }
}