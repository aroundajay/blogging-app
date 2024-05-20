@extends('layout')

@section('title', 'Your Posts')

@section('content')
<div class="container">
    <h1>Your Blog Posts</h1>
    <a href="{{ route('posts.create') }}">Create post</a>
    <div class="blog-posts">
        @foreach ($posts as $post)
        <div class="blog-post">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <small>Posted by {{ $post->user->name }} on {{ $post->created_at->format('F j, Y') }}</small>

            <div class="post-edit-delete-btn">
                <form class="post-btn" action="{{ route('posts.edit', $post) }}" method="GET">
                    <button type="submit">
                        Edit
                    </button>
                </form>

                <form class="post-btn" action="{{ route('posts.destroy', $post) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="delete" />
                    <button type="submit">
                        Delete
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
