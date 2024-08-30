<?php
namespace App\Interfaces;

interface TagRepositoryInterface
{
    public function getAllTags();
    public function storeTag(array $data);
    public function updateTag($id, array $data);
    public function deleteTag($id);
}
