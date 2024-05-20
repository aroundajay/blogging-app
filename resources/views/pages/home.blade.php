@extends('layout')

@section('title', 'Your Posts')

@section('content')
<div class="container">
    <h1>Blog Posts</h1>
    <div class="blog-posts">
        @foreach ($posts as $post)
        <div class="blog-post">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <small>Posted by {{ $post->user->name }} on {{ $post->created_at->format('F j, Y') }}</small>
        </div>
        @endforeach
    </div>
</div>
@endsection
