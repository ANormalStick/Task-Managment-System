<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Task Management System')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="navbar">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('boards.index') }}">Boards</a>
        @auth
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endauth
    </div>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
