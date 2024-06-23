<!DOCTYPE html>
<html>
<head>
    <title>Create Task</title>
</head>
<body>
    <h1>Create a new Task</h1>
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <label for="title">Title</label>
        <input type="text" name="title" required><br>
        <label for="description">Description</label>
        <textarea name="description"></textarea><br>
        <label for="status">Status</label>
        <select name="status">
            <option value="pending">Pending</option>
            <option value="in_progress">In Progress</option>
            <option value="completed">Completed</option>
        </select><br>
        <label for="priority">Priority</label>
        <select name="priority">
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
        </select><br>
        <label for="board_id">Board</label>
        <select name="board_id">
            @foreach ($boards as $board)
                <option value="{{ $board->id }}">{{ $board->name }}</option>
            @endforeach
        </select><br>
        <label for="assigned_user_id">Assigned User</label>
        <select name="assigned_user_id">
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select><br>
        <button type="submit">Create</button>
    </form>
</body>
</html>
