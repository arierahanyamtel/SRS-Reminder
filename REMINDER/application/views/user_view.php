<h3 class="mt-4 mb-3">User List</h3>

<a href="<?php echo base_url('user/create'); ?>" class="btn btn-primary mb-3 btn-sm">Create New User</a>

<div class="table-responsive">
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Username</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['role']; ?></td>
                <td>
                    <a href="<?php echo base_url('user/edit/' . $user['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="<?php echo base_url('user/delete/' . $user['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
