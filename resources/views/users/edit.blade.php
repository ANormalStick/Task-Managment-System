<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ $user->name }}" required><br>
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ $user->email }}" required><br>
        <label for="role">Role</label>
        <select name="role">
            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="authenticated_user" {{ $user->role == 'authenticated_user' ? 'selected' : '' }}>Authenticated User</option>
            <option value="team_member" {{ $user->role == 'team_member' ? 'selected' : '' }}>Team Member</option>
        </select><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
