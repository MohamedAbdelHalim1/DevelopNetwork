<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TagService;

class TagController extends Controller
{
    protected $tagService;

    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }

    public function index()
    {
        return $this->tagService->getAllTags();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:tags',
        ]);

        return $this->tagService->storeTag($validated);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:tags,name,' . $id,
        ]);

        return $this->tagService->updateTag($id, $validated);
    }

    public function destroy($id)
    {
        return $this->tagService->deleteTag($id);
    }
}
