
    <h3 class="my-4">Contact List</h3>

    <a href="<?php echo base_url('contact/create'); ?>" class="btn btn-primary mb-3 btn-sm">Create New Contact</a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead >
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Hp</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $contact): ?>
                    <tr>
                        <td><?php echo $contact['name']; ?></td>
                        <td><?php echo $contact['email']; ?></td>
                        <td><?php echo $contact['phone_number']; ?></td>
                        <td>
                            <a href="<?php echo base_url('contact/edit/' . $contact['id']); ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="<?php echo base_url('contact/delete/' . $contact['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

