<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>
    <h1>Edit Task</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('boards.tasks.update', [$board, $task]) }}">
        @csrf
        @method('PUT')
        <label for="title">Title</label>
        <input type="text" name="title" value="{{ $task->title }}" required><br>
        <label for="description">Description</label>
        <textarea name="description">{{ $task->description }}</textarea><br>
        <label for="status">Status</label>
        <select name="status">
            <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
            <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
        </select><br>
        <label for="priority">Priority</label>
        <select name="priority">
            <option value="low" {{ $task->priority == 'low' ? 'selected' : '' }}>Low</option>
            <option value="medium" {{ $task->priority == 'medium' ? 'selected' : '' }}>Medium</option>
            <option value="high" {{ $task->priority == 'high' ? 'selected' : '' }}>High</option>
        </select><br>
        <label for="assigned_user_id">Assigned User</label>
        <select name="assigned_user_id">
            <option value="">None</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ $task->assigned_user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
            @endforeach
        </select><br>
        <button type="submit">Update</button>
    </form>

    <a href="{{ route('boards.show', $board) }}">Back to Board</a>
</body>
</html>
