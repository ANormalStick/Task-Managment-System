<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label for="email">Email</label>
        <input type="email" name="email" required><br>
        <label for="password">Password</label>
        <input type="password" name="password" required><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
