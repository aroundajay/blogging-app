<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Guest Page')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="navbar">
        <div class="top-right">
            <a href="/">Home</a>
            @if(auth()->check())
                <a href="{{ route('posts.index') }}">Posts</a>
                <a href="{{ route('logout') }}">Logout</a>
            @else
                <a href="{{ route('login') }}">Login</a>
            @endif
        </div>
    </div>

    @yield('content')
</body>
</html>
