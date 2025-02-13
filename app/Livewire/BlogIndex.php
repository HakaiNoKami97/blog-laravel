<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class BlogIndex extends Component
{
    public function render()
    {
        $posts = Post::select('title', 'description', 'published_at')
                     ->latest()
                     ->get();
                     
        return view('livewire.blog-index', compact('posts'))
            ->layout('components.layout');
    }
}