<?php
namespace App\Services;

use App\Interfaces\TagRepositoryInterface;

class TagService
{
    protected $tagRepository;

    public function __construct(TagRepositoryInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function getAllTags()
    {
        $tags = $this->tagRepository->getAllTags();
        return response()->json([
            'Flag' => 'Success',
            'Message' => 'Tags retrieved successfully.',
            'Data' => $tags
        ]);
    }

    public function storeTag(array $data)
    {
        $tag = $this->tagRepository->storeTag($data);
        return response()->json([
            'Flag' => 'Success',
            'Message' => 'Tag created successfully.',
            'Data' => $tag
        ]);
    }

    public function updateTag($id, array $data)
    {
        $tag = $this->tagRepository->updateTag($id, $data);
        return response()->json([
            'Flag' => 'Success',
            'Message' => 'Tag updated successfully.',
            'Data' => $tag
        ]);
    }

    public function deleteTag($id)
    {
        $result = $this->tagRepository->deleteTag($id);
        return response()->json($result);
    }
}
