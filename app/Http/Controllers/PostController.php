<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function __construct(private PostRepositoryInterface $postRepo)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Post::class);

        return view('pages.post.index', [
            'posts' => $this->postRepo->getPostsByUserId(auth()->user()->id)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Post::class);

        return view('pages.post.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        Gate::authorize('create', Post::class);

        $this->postRepo->createPost(
            array_merge(
                $request->all(),
                [ 'user_id' => auth()->user()->id ]
            )
        );

        return redirect()->to(route('posts.index'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        Gate::authorize('update', $post);

        return view('pages.post.form', [
            'post' => $this->postRepo->getPostById($post->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        Gate::authorize('update', $post);

        $this->postRepo->updatePost($post->id, $request->all());

        return redirect()->to(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Gate::authorize('delete', $post);

        $this->postRepo->deletePost($post->id);

        return redirect()->to(route('posts.index'));
    }
}
