<!DOCTYPE html>
<html>
<head>
    <title>{{ $board->name }}</title>
</head>
<body>
    <h1>{{ $board->name }}</h1>
    <p>{{ $board->description }}</p>
    <a href="{{ route('boards.index') }}">Back to Boards</a>
</body>
</html>
