<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_must_be_adult_to_register()
    {
        $response = $this->post('/register', [
            'name' => 'Juan Pérez',
            'email' => 'juan@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'birthdate' => now()->subYears(17)->format('Y-m-d'), // Menor de edad
        ]);

        $response->assertSessionHasErrors('birthdate'); // Debe fallar por ser menor de edad
    }
}