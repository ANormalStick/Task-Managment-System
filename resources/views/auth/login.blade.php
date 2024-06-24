<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const loginForm = document.getElementById('login-form');
            loginForm.addEventListener('submit', function(event) {
                event.preventDefault();
                const formData = new FormData(loginForm);
                fetch("{{ route('login') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Accept": "application/json",
                    },
                    body: formData
                })
                .then(response => {
                    if (response.ok) {
                        window.location.href = "{{ route('boards.index') }}";
                    } else {
                        // Handle login errors here
                        alert("Login failed. Please check your credentials.");
                    }
                })
                .catch(error => console.error("Error:", error));
            });
        });
    </script>
</head>
<body>
    <div class="login-register-container">
        <h2>Login</h2>
        <form id="login-form">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
