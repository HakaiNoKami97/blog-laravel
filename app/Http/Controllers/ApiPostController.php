<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ExternalApiService;

class ApiPostController extends Controller
{
    protected $apiService;

    public function __construct(ExternalApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index()
    {
        $posts = $this->apiService->getAllPosts();
        return view('api.index', compact('posts'));
    }

    public function show($id)
    {
        $post = $this->apiService->getPostById($id);
        return view('api.show', compact('post'));
    }

    public function create()
    {
        return view('api.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'userId' => 'required|integer',
        ]);

        $this->apiService->createPost($data);

        return redirect()->route('api.posts.index')->with('success', 'Publicación creada en la API.');
    }

    public function edit($id)
    {
        $post = $this->apiService->getPostById($id);
        return view('api.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
        ]);

        $this->apiService->updatePost($id, $data);

        return redirect()->route('api.posts.index')->with('success', 'Publicación actualizada en la API.');
    }

    public function destroy($id)
    {
        $this->apiService->deletePost($id);

        return redirect()->route('api.posts.index')->with('success', 'Publicación eliminada.');
    }
}