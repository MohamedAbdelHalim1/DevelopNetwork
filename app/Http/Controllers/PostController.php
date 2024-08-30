<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PostService;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        return $this->postService->getUserPosts(auth()->id());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'cover_image' => 'nullable|image',
            'pinned' => 'required|boolean',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        return $this->postService->storePost($validated);
    }

    public function show($id)
    {
        return $this->postService->getPost($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'cover_image' => 'nullable|image',
            'pinned' => 'required|boolean',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        return $this->postService->updatePost($id, $validated);
    }

    public function destroy($id)
    {
        return $this->postService->deletePost($id);
    }

    public function deletedPosts()
    {
        return $this->postService->getDeletedPosts(auth()->id());
    }

    public function restore($id)
    {
        return $this->postService->restorePost($id);
    }
}
