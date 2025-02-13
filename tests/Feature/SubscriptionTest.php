<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Livewire\Livewire;
use App\Livewire\BlogIndex;
use App\Models\Post;

class SubscriptionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function post_list_updates_when_a_new_post_is_created()
    {
        Livewire::test(BlogIndex::class)
            ->assertSee('No hay publicaciones aún.');

        Post::factory()->create(['title' => 'Nuevo Post']);

        Livewire::test(BlogIndex::class)
            ->assertSee('Nuevo Post'); // Ahora sí debería aparecer en la vista
    }
}