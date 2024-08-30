<?php
namespace App\Interfaces;

interface PostRepositoryInterface
{
    public function getUserPosts($userId);
    public function storePost(array $data);
    public function getPost($id);
    public function updatePost($id, array $data);
    public function deletePost($id);
    public function getDeletedPosts($userId);
    public function restorePost($id);
}
