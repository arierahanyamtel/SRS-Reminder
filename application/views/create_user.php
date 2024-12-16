<h3 class="mt-4 mb-3">Create New User</h3>

<form action="<?php echo base_url('user/store'); ?>" method="POST">
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" name="username" id="username" required>
    </div>

    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" id="password" required>
    </div>

    <div class="form-group">
        <label for="role">Role:</label>
        <select class="form-control" name="role" id="role" required>
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Create User</button>
</form>

<a href="<?php echo base_url('user'); ?>" class="btn btn-secondary mt-3">Back to User List</a>
