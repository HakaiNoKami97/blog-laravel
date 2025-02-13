<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Carbon\Carbon;

class BlogIndex extends Component
{
    public $searchDate = ''; // Variable para el filtro de fecha

    public function render()
    {
        $query = Post::query()->orderBy('published_at', 'desc');

        if (!empty($this->searchDate)) {
            $query->whereDate('published_at', $this->searchDate);
        }

        $posts = $query->get();

        return view('livewire.blog-index', compact('posts'))
            ->layout('components.layout');
    }
}