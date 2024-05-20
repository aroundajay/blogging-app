<?php

namespace App\Repositories\Interfaces;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;


interface PostRepositoryInterface {
    public function getPosts(): Collection;

    public function getPostsByUserId(string $user_id): Collection;

    public function createPost(array $data): Post;

    public function getPostById(string $id): Post;

    public function updatePost(string $id, array $data): Post;

    public function deletePost(string $id): bool;
}
