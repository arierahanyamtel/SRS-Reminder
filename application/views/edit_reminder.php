<h3 class="mt-4 mb-3">Edit Reminder</h3>

<form action="<?= base_url('reminder/update/' . $reminder['id']) ?>" method="post" class="mb-4">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="<?= $reminder['reminder_title'] ?>" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Deskripsi</label>
        <textarea name="description" id="description" class="form-control"><?= $reminder['reminder_description'] ?></textarea>
    </div>

    <div class="mb-3">
        <label for="date" class="form-label">Tanggal</label>
        <input type="date" name="date" id="date" class="form-control" value="<?= $reminder['reminder_date'] ?>" required>
    </div>

    <div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select name="status" id="status" class="form-control" required>
        <option value="1" <?= ($reminder['status'] == 1) ? 'selected' : ''; ?>>Sudah Terkirim</option>
        <option value="0" <?= ($reminder['status'] == 0) ? 'selected' : ''; ?>>Belum Terkirim</option>
    </select>
</div>


    <div class="mb-3">
        <label for="contacts" class="form-label">Kontak</label>
        <select name="contacts[]" id="contacts" class="form-control" multiple>
            <?php foreach ($contacts as $contact): ?>
                <option value="<?= $contact['id'] ?>" <?= in_array($contact['id'], $selected_contacts) ? 'selected' : '' ?>>
                    <?= $contact['name'] ?> (<?= $contact['email'] ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update Reminder</button>
</form>

<a href="<?= base_url('reminder') ?>" class="btn btn-secondary">Back to Reminder List</a>
