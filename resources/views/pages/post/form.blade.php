@extends('layout')

@section('title', 'Your Posts')

@section('content')
<div class="container">
    <h1>Your Blog Posts</h1>
    <a href="{{ route('posts.index') }}">Back</a>
    <div class="login-container">
        @empty($post)
        <form class="login-form post-form" action="{{ route('posts.store') }}" method="POST">
        @else
        <form class="login-form post-form" action="{{ route('posts.update', $post) }}" method="POST">
        <input type="hidden" name="_method" value="put" />
        @endempty
            @csrf
            <h2>
                @empty($post)
                    Create
                @else
                    Update
                @endempty

                 Post
            </h2>
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="title" id="title" name="title" value="{{ (isset($post)) ? $post->title : '' }}" required>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="content-textarea" name="content" id="content" rows="20">@isset($post){{ $post->content }}@endisset</textarea>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit">
                @empty($post)
                    Create
                @else
                    Update
                @endempty
            </button>
        </form>
    </div>
</div>


@endsection
