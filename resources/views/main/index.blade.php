<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management System</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <h1>Welcome to the Task Management System</h1>
        <div class="main-page-links">
            <a href="{{ route('register') }}">Register</a>
            <a href="{{ route('login') }}">Login</a>
        </div>
    </div>
</body>
</html>
