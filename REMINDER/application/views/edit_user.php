<h3 class="mt-4 mb-3">Edit User</h3>

<form action="<?php echo base_url('user/update/' . $user['id']); ?>" method="POST" class="mb-4">
    <div class="mb-3">
        <label for="username" class="form-label">Username:</label>
        <input type="text" name="username" id="username" class="form-control" value="<?php echo $user['username']; ?>" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>

    <div class="mb-3">
        <label for="role" class="form-label">Role:</label>
        <select name="role" id="role" class="form-control">
            <option value="admin" <?php echo ($user['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
            <option value="user" <?php echo ($user['role'] == 'user') ? 'selected' : ''; ?>>User</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update User</button>
</form>

<a href="<?php echo base_url('user'); ?>" class="btn btn-secondary">Back to User List</a>
