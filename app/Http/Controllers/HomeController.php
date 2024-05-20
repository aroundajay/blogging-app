<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\PostRepositoryInterface;

class HomeController extends Controller
{
    public function __construct(private PostRepositoryInterface $postRepo)
    {

    }

    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return view('pages.home', [
            'posts' => $this->postRepo->getPosts()
        ]);
    }
}
