<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PostRepository implements PostRepositoryInterface {
    public function getPosts(): Collection {
        return Post::with(['user'])->orderBy('updated_at', 'DESC')->get();
    }

    public function getPostsByUserId(string $user_id): Collection {
        return Post::with(['user'])->where('user_id', $user_id)->orderBy('updated_at', 'DESC')->get();
    }

    public function createPost(array $data): Post {
        return Post::create($data);
    }

    public function getPostById(string $id): Post {
        return Post::findOrFail($id);
    }

    public function updatePost(string $id, array $data): Post {
        $post = $this->getPostById($id);
        $post->update($data);

        return $post->fresh();
    }

    public function deletePost(string $id): bool {
        return Post::destroy($id);
    }
}
