<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class BlogIndex extends Component
{
    // 🗓️ Variable pública para almacenar la fecha de búsqueda
    public $searchDate = '';

    // 🎯 Define un listener que escucha el evento 'postCreated' y ejecuta el método 'render'
    protected $listeners = ['postCreated' => 'render']; 

    // 📌 Método que obtiene y muestra las publicaciones del blog
    public function render()
    {
        // 🔍 Obtiene todas las publicaciones ordenadas desde la más reciente
        $query = Post::latest();

        // 🗓️ Si hay una fecha de búsqueda seleccionada, filtra las publicaciones por esa fecha
        if (!empty($this->searchDate)) {
            $query->whereDate('published_at', $this->searchDate);
        }

        // 📋 Obtiene todas las publicaciones después de aplicar el filtro
        $posts = $query->get();

        // 🖥️ Renderiza la vista del componente Livewire con los posts obtenidos
        return view('livewire.blog-index', compact('posts'))
            ->layout('components.layout');
    }
}