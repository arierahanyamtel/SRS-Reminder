<h3 class="mt-4 mb-3">Edit Contact</h3>

<form action="<?php echo base_url('contact/update/' . $contact['id']); ?>" method="POST" class="mb-4">
    <div class="mb-3">
        <label for="name" class="form-label">Nama:</label>
        <input type="text" name="name" id="name" class="form-control" value="<?php echo $contact['name']; ?>" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" name="email" id="email" class="form-control" value="<?php echo $contact['email']; ?>" required>
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Hp:</label>
        <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $contact['phone_number']; ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Update Contact</button>
</form>

<a href="<?php echo base_url('contact'); ?>" class="btn btn-secondary">Back to Contact List</a>
