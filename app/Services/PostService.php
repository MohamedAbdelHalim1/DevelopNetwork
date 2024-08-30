<?php
namespace App\Services;

use App\Interfaces\PostRepositoryInterface;

class PostService
{
    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getUserPosts($userId)
    {
        $posts = $this->postRepository->getUserPosts($userId);
        return response()->json([
            'Flag' => 'Success',
            'Message' => 'Posts retrieved successfully.',
            'Data' => $posts
        ]);
    }

    public function storePost(array $data)
    {
        $post = $this->postRepository->storePost($data);
        return response()->json([
            'Flag' => 'Success',
            'Message' => 'Post created successfully.',
            'Data' => $post
        ]);
    }

    public function getPost($id)
    {
        $post = $this->postRepository->getPost($id);
        return response()->json([
            'Flag' => 'Success',
            'Message' => 'Post retrieved successfully.',
            'Data' => $post
        ]);
    }

    public function updatePost($id, array $data)
    {
        $post = $this->postRepository->updatePost($id, $data);
        return response()->json([
            'Flag' => 'Success',
            'Message' => 'Post updated successfully.',
            'Data' => $post
        ]);
    }

    public function deletePost($id)
    {
        $result = $this->postRepository->deletePost($id);
        return response()->json($result);
    }

    public function getDeletedPosts($userId)
    {
        $posts = $this->postRepository->getDeletedPosts($userId);
        return response()->json([
            'Flag' => 'Success',
            'Message' => 'Deleted posts retrieved successfully.',
            'Data' => $posts
        ]);
    }

    public function restorePost($id)
    {
        $post = $this->postRepository->restorePost($id);
        return response()->json([
            'Flag' => 'Success',
            'Message' => 'Post restored successfully.',
            'Data' => $post
        ]);
    }
}
