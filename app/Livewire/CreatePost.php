<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CreatePost extends Component
{
    // 📌 Variables públicas para almacenar el título y la descripción de la publicación
    public $title;
    public $description;

    // ✅ Definición de reglas de validación para los campos del formulario
    protected $rules = [
        'title' => 'required|min:5', // 🔹 El título es obligatorio y debe tener al menos 5 caracteres
        'description' => 'required|min:10', // 🔹 La descripción es obligatoria y debe tener al menos 10 caracteres
    ];

    // 📝 Método para crear una nueva publicación
    public function createPost()
    {
        // 🔍 Validar los datos ingresados según las reglas definidas
        $this->validate();

        // 📌 Crear un nuevo registro en la base de datos con los datos ingresados
        Post::create([
            'title' => $this->title, // 📌 Asigna el título ingresado por el usuario
            'description' => $this->description, // 📌 Asigna la descripción ingresada por el usuario
            'published_at' => now(), // 📅 Asigna la fecha y hora actual como fecha de publicación
            'user_id' => Auth::id(), // 🆔 Asigna el ID del usuario autenticado como autor de la publicación
        ]);

        // 💬 Mensaje de éxito para informar al usuario que la publicación se creó correctamente
        session()->flash('success', 'Publicación creada exitosamente.');

        // 🔄 Restablece los valores de los campos del formulario después de la creación de la publicación
        $this->reset(['title', 'description']);

        // 🔥 Emitir un evento para notificar a otros componentes Livewire que se ha creado una nueva publicación
        $this->dispatch('postCreated');
    }

    // 🎨 Renderiza la vista del formulario para crear publicaciones
    public function render()
    {
        return view('livewire.create-post');
    }
}