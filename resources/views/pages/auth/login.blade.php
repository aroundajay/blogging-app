@extends('layout')

@section('title', 'Login')

@section('content')
<div class="login-container">
    <form class="login-form" action="{{ route('login.action') }}" method="POST">
        @csrf
        <h2>Login</h2>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Login</button>
    </form>
</div>
@endsection
