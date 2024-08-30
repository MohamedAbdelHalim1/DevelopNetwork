<?php
namespace App\Repositories;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    public function getUserPosts($userId)
    {
        return Post::where('user_id', $userId)->orderBy('pinned', 'desc')->get();
    }

    public function storePost(array $data)
    {
        $post = Post::create($data);
        return $post;
    }

    public function getPost($id)
    {
        return Post::findOrFail($id);
    }

    public function updatePost($id, array $data)
    {
        $post = Post::findOrFail($id);
        $post->update($data);
        return $post;
    }

    public function deletePost($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return ['message' => 'Post deleted successfully.'];
    }

    public function getDeletedPosts($userId)
    {
        return Post::onlyTrashed()->where('user_id', $userId)->get();
    }

    public function restorePost($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->restore();
        return $post;
    }
}
