<h3 class="mt-4 mb-3">Create New Contact</h3>

<form action="<?php echo base_url('contact/store'); ?>" method="POST" class="mb-4">
    <div class="mb-3">
        <label for="name" class="form-label">Nama:</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Hp:</label>
        <input type="text" name="phone" id="phone" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Create Contact</button>
</form>

<a href="<?php echo base_url('contact'); ?>" class="btn btn-secondary">Back to Contact List</a>
