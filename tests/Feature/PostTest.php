<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Post;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_active_users_can_create_posts()
    {
        $user = User::factory()->create(['is_active' => false]); // Usuario inactivo

        $this->actingAs($user)
            ->post('/posts', [
                'title' => 'Nuevo Post',
                'description' => 'Contenido del post',
            ])
            ->assertForbidden(); // Debe rechazar la creación de la publicación

        $this->assertDatabaseMissing('posts', ['title' => 'Nuevo Post']); // No debe existir en la DB
    }
}