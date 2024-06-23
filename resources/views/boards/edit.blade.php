<!DOCTYPE html>
<html>
<head>
    <title>Edit Board</title>
</head>
<body>
    <h1>Edit Board</h1>
    <form method="POST" action="{{ route('boards.update', $board->id) }}">
        @csrf
        @method('PUT')
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ $board->name }}" required><br>
        <label for="description">Description</label>
        <textarea name="description">{{ $board->description }}</textarea><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
