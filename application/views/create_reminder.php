<h3 class="mt-4 mb-3">Create New Reminder</h3>

<form action="<?= base_url('reminder/store') ?>" method="post" class="mb-4">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Deskripsi</label>
        <textarea name="description" id="description" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label for="date" class="form-label">Tanggal</label>
        <input type="date" name="date" id="date" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="contacts" class="form-label">Kontak</label>
        <select name="contacts[]" id="contacts" class="form-control" multiple>
            <?php foreach ($contacts as $contact): ?>
                <option value="<?= $contact['id'] ?>"><?= $contact['name'] ?> (<?= $contact['email'] ?>)</option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Save Reminder</button>
</form>
