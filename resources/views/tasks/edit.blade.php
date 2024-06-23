<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>
    <h1>Edit Task</h1>
    <form method="POST" action="{{ route('tasks.update', $task->id) }}">
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
        <label for="board_id">Board</label>
        <select name="board_id">
            @foreach ($boards as $board)
                <option value="{{ $board->id }}" {{ $task->board_id == $board->id ? 'selected' : '' }}>{{ $board->name }}</option>
            @endforeach
        </select><br>
        <label for="assigned_user_id">Assigned User</label>
        <select name="assigned_user_id">
            @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ $task->assigned_user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
            @endforeach
        </select><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
