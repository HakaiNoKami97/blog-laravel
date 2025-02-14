<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class ExternalApiService
{
    // 🔹 Define la URL base de la API externa
    protected $apiUrl = 'https://jsonplaceholder.typicode.com/posts';

    // 🔹 Método para obtener todas las publicaciones desde la API
    public function getAllPosts()
    {
        $response = Http::get($this->apiUrl); // Realiza una solicitud GET a la API
        return $response->json(); // Devuelve la respuesta en formato JSON
    }

    // 🔹 Método para obtener una publicación específica por su ID
    public function getPostById($id)
    {
        $response = Http::get("{$this->apiUrl}/{$id}"); // Realiza una solicitud GET a la API con el ID especificado
        return $response->json(); // Devuelve la respuesta en formato JSON
    }

    // 🔹 Método para crear una nueva publicación en la API (POST)
    public function createPost($data)
    {
        $response = Http::post($this->apiUrl, $data); // Envía una solicitud POST con los datos proporcionados
        return $response->json(); // Devuelve la respuesta en formato JSON
    }

    // 🔹 Método para actualizar una publicación existente en la API (PUT)
    public function updatePost($id, $data)
    {
        $response = Http::put("{$this->apiUrl}/{$id}", $data); // Envía una solicitud PUT con el ID y los nuevos datos
        return $response->json(); // Devuelve la respuesta en formato JSON
    }

    // 🔹 Método para eliminar una publicación en la API (DELETE)
    public function deletePost($id)
    {
        $response = Http::delete("{$this->apiUrl}/{$id}"); // Envía una solicitud DELETE para eliminar el recurso con el ID dado
        return $response->status(); // Devuelve el código de estado de la respuesta (ej. 200 si fue exitoso)
    }
}