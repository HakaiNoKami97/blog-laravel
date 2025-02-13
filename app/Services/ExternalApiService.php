<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class ExternalApiService
{
    protected $apiUrl = 'https://jsonplaceholder.typicode.com/posts';

    // Obtener todas las publicaciones
    public function getAllPosts()
    {
        $response = Http::get($this->apiUrl);
        return $response->json();
    }

    // Obtener una publicación por ID
    public function getPostById($id)
    {
        $response = Http::get("{$this->apiUrl}/{$id}");
        return $response->json();
    }

    // Crear una nueva publicación (POST)
    public function createPost($data)
    {
        $response = Http::post($this->apiUrl, $data);
        return $response->json();
    }

    // Editar una publicación (PUT)
    public function updatePost($id, $data)
    {
        $response = Http::put("{$this->apiUrl}/{$id}", $data);
        return $response->json();
    }

    // Eliminar una publicación (DELETE)
    public function deletePost($id)
    {
        $response = Http::delete("{$this->apiUrl}/{$id}");
        return $response->status();
    }
}