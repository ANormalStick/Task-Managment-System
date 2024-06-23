<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>
    <p>Welcome, {{ Auth::user()->name }}!</p>
    <a href="{{ route('boards.index') }}">Manage Boards</a>
    <a href="{{ route('tasks.index') }}">Manage Tasks</a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
