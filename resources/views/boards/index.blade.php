<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boards</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <nav>
        <button class="logout-button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</button>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        @if(auth()->user()->role === 'admin')
            <a href="{{ route('admin.index') }}" class="admin-button">Go to Admin Panel</a>
        @endif
    </nav>
    <div class="container">
        <h1>Boards</h1>
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <ul class="board-list">
            @foreach($boards as $board)
            <li class="board-item">
                <a href="{{ route('boards.show', $board->id) }}">{{ $board->name }}</a>
                <div class="buttons">
                    <a href="{{ route('boards.edit', $board->id) }}" class="edit-button">Edit</a>
                    <form action="{{ route('boards.destroy', $board->id) }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button">Delete</button>
                    </form>
                </div>
            </li>
            @endforeach
        </ul>
        <a href="{{ route('boards.create') }}" class="back-button">Create a Board</a>
    </div>

</body>
</html>
