<?php
namespace App\Repositories;

use App\Models\Tag;
use App\Interfaces\TagRepositoryInterface;

class TagRepository implements TagRepositoryInterface
{
    public function getAllTags()
    {
        return Tag::all();
    }

    public function storeTag(array $data)
    {
        $tag = Tag::create($data);
        return $tag;
    }

    public function updateTag($id, array $data)
    {
        $tag = Tag::findOrFail($id);
        $tag->update($data);
        return $tag;
    }

    public function deleteTag($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return ['message' => 'Tag deleted successfully.'];
    }
}
