<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class BlogIndex extends Component
{
    public $searchDate = '';

    protected $listeners = ['postCreated' => 'render']; // 🎯 Escuchar evento y recargar publicaciones

    public function render()
    {
        $query = Post::latest();

        if (!empty($this->searchDate)) {
            $query->whereDate('published_at', $this->searchDate);
        }

        $posts = $query->get();

        return view('livewire.blog-index', compact('posts'))
            ->layout('components.layout');
    }
}