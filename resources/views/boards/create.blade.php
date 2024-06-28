<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Board</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="form-container">
        <h1>Create a new Board</h1>
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('boards.store') }}">
            @csrf
            <label for="name">Name</label>
            <input type="text" name="name" required>
            <label for="description">Description</label>
            <textarea name="description"></textarea>
            <button type="submit">Create</button>
        </form>
        <a href="{{ route('boards.index') }}" class="back-button">Back to Boards</a>
    </div>
</body>
</html>
