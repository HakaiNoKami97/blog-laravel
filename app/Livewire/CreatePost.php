<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CreatePost extends Component
{
    public $title;
    public $description;

    protected $rules = [
        'title' => 'required|min:5',
        'description' => 'required|min:10',
    ];

    public function createPost()
    {
        $this->validate();

        Post::create([
            'title' => $this->title,
            'description' => $this->description,
            'published_at' => now(),
            'user_id' => Auth::id(),
        ]);

        session()->flash('success', 'Publicación creada exitosamente.');

        // Limpiar los campos
        $this->reset(['title', 'description']);

        // Emitir evento para actualizar la lista de publicaciones
        $this->dispatch('postCreated');
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}