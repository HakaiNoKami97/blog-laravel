<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ExternalApiService;

class ApiPostController extends Controller
{
    protected $apiService;

    // Constructor de la clase, inyecta el servicio de la API externa
    public function __construct(ExternalApiService $apiService)
    {
        $this->apiService = $apiService; // Asigna el servicio de API externa a la propiedad de la clase
    }

    // Método para listar todas las publicaciones desde la API externa
    public function index()
    {
        $posts = $this->apiService->getAllPosts(); // Obtiene todas las publicaciones desde la API
        return view('api.index', compact('posts')); // Retorna la vista con los datos obtenidos
    }

    // Método para mostrar una publicación específica
    public function show($id)
    {
        $post = $this->apiService->getPostById($id); // Obtiene una publicación por su ID desde la API
        return view('api.show', compact('post')); // Retorna la vista con la publicación obtenida
    }

    // Método para mostrar el formulario de creación de una publicación
    public function create()
    {
        return view('api.create'); // Retorna la vista del formulario de creación
    }

    // Método para almacenar una nueva publicación en la API
    public function store(Request $request)
    {
        // Valida los datos enviados desde el formulario
        $data = $request->validate([
            'title' => 'required|string', // El título es obligatorio y debe ser una cadena
            'body' => 'required|string',  // El contenido es obligatorio y debe ser una cadena
            'userId' => 'required|integer', // El ID del usuario es obligatorio y debe ser un número entero
        ]);

        $this->apiService->createPost($data); // Llama al servicio para crear la publicación en la API

        // Redirige a la lista de publicaciones con un mensaje de éxito
        return redirect()->route('api.posts.index')->with('success', 'Publicación creada en la API.');
    }

    // Método para mostrar el formulario de edición de una publicación
    public function edit($id)
    {
        $post = $this->apiService->getPostById($id); // Obtiene la publicación por su ID desde la API
        return view('api.edit', compact('post')); // Retorna la vista con la publicación a editar
    }

    // Método para actualizar una publicación en la API externa
    public function update(Request $request, $id)
    {
        // Valida los datos enviados desde el formulario
        $data = $request->validate([
            'title' => 'required|string', // El título es obligatorio y debe ser una cadena
            'body' => 'required|string',  // El contenido es obligatorio y debe ser una cadena
        ]);

        $this->apiService->updatePost($id, $data); // Llama al servicio para actualizar la publicación en la API

        // Redirige a la lista de publicaciones con un mensaje de éxito
        return redirect()->route('api.posts.index')->with('success', 'Publicación actualizada en la API.');
    }

    // Método para eliminar una publicación de la API externa
    public function destroy($id)
    {
        $this->apiService->deletePost($id); // Llama al servicio para eliminar la publicación en la API

        // Redirige a la lista de publicaciones con un mensaje de éxito
        return redirect()->route('api.posts.index')->with('success', 'Publicación eliminada.');
    }
}