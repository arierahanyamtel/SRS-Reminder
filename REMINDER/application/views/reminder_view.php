
<?php if ($this->session->flashdata('error')): ?>
        <p style="color: red;"><?php echo $this->session->flashdata('error'); ?></p>
    <?php endif; ?>
       <h3 class="my-4">Reminder List</h3>
        
        <!-- Link to create a new reminder -->
        <a href="<?= base_url('reminder/create') ?>" class="btn btn-primary mb-3 btn-sm">Create New Reminder</a>

        <!-- Displaying the reminder list -->
        <div class="table-responsive">
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Deskripsi</th>
                    <th>Tanggal</th>
                    <th>Kontak</th>
                    <th>Status</th> <!-- New column for status -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($reminders)): ?>
                    <?php foreach ($reminders as $reminder): ?>
                        <tr>
                            <td><?= htmlspecialchars($reminder['reminder_title']) ?></td>
                            <td><?= htmlspecialchars($reminder['reminder_description']) ?></td>
                            <td><?= date('d-m-Y', strtotime($reminder['reminder_date'])) ?></td>
                            <td>
                                <!-- Menampilkan kontak yang terhubung dengan reminder -->
                                <?php
                                    $contacts = $this->Reminder_model->get_contacts_for_reminder($reminder['id']);
                                    foreach ($contacts as $contact) {
                                        echo "<p>" . htmlspecialchars($contact['name']) . " (" . htmlspecialchars($contact['email']) . ") (" . htmlspecialchars($contact['phone_number']) . ")</p>";
                                    }
                                ?>
                            </td>
                            <td>
                                <!-- Status reminder -->
                                <?php if ($reminder['status'] == 0): ?>
                                    <span class="badge badge-warning">Belum Terkirim</span>
                                <?php else: ?>
                                    <span class="badge badge-success">Sudah Terkirim</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <!-- Actions (edit & delete) -->
                                <a href="<?= base_url('reminder/edit/' . $reminder['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= base_url('reminder/delete/' . $reminder['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this reminder?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No reminders found</td> <!-- Update colspan to 6 -->
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
 </div>

