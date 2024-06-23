<!DOCTYPE html>
<html>
<head>
    <title>Create Board</title>
</head>
<body>
    <h1>Create a new Board</h1>
    @if ($errors->any())
        <div>
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
        <input type="text" name="name" required><br>
        <label for="description">Description</label>
        <textarea name="description"></textarea><br>
        <button type="submit">Create</button>
    </form>
</body>
</html>
