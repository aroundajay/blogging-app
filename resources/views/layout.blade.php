<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Guest Page')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="top-right">
        @if(auth()->check())
            <a href="{{ route('logout') }}">Logout</a>
        @else
            <a href="{{ route('login.view') }}">Login</a>
        @endif
    </div>

    @yield('content')
</body>
</html>
