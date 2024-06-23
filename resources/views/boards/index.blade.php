<!DOCTYPE html>
<html>
<head>
    <title>Boards</title>
</head>
<body>
    <h1>Boards</h1>
    <a href="{{ route('boards.create') }}">Create a new board</a>
    <ul>
        @foreach ($boards as $board)
            <li>
                <a href="{{ route('boards.show', $board->id) }}">{{ $board->name }}</a>
                <a href="{{ route('boards.edit', $board->id) }}">Edit</a>
                <form action="{{ route('boards.destroy', $board->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
