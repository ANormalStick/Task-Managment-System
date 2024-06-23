<!DOCTYPE html>
<html>
<head>
    <title>{{ $task->title }}</title>
</head>
<body>
    <h1>{{ $task->title }}</h1>
    <p>{{ $task->description }}</p>
    <p>Status: {{ $task->status }}</p>
    <p>Priority: {{ $task->priority }}</p>
    <p>Board: {{ $task->board->name }}</p>
    <p>Assigned User: {{ $task->assignedUser->name }}</p>
    <a href="{{ route('tasks.index') }}">Back to Tasks</a>
</body>
</html>
