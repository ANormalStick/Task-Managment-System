<!DOCTYPE html>
<html>
<head>
    <title>Tasks</title>
</head>
<body>
    <h1>Tasks</h1>
    @if (Auth::user()->role === 'admin' || Auth::user()->role === 'team_member')
        <a href="{{ route('tasks.create') }}">Create a new task</a>
    @endif
    <ul>
        @foreach ($tasks as $task)
            <li>
                <a href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</a>
                @if (Auth::user()->role === 'admin' || Auth::user()->role === 'team_member')
                    <a href="{{ route('tasks.edit', $task->id) }}">Edit</a>
                @endif
                @if (Auth::user()->role === 'admin')
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>
</body>
</html>
