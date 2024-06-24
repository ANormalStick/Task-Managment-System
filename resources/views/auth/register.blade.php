<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="login-register-container">
        <h2>Register</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
