<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reminder_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Mendapatkan semua pengingat
    public function get_all_reminders() {
        $query = $this->db->get('reminder');
        return $query->result_array();
    }

    // Menyimpan pengingat baru
    public function insert_reminder($data) {
        $this->db->insert('reminder', $data);
        return $this->db->insert_id();  // Mengembalikan ID pengingat yang baru
    }

    // Mendapatkan pengingat berdasarkan ID
    public function get_reminder_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('reminder');
        return $query->row_array();
    }

    // Memperbarui pengingat
    public function update_reminder($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('reminder', $data);
    }

    // Menghapus pengingat
    public function delete_reminder($id) {
        $this->db->where('id', $id);
        $this->db->delete('reminder');
    }

    // Menghubungkan kontak ke pengingat
    public function link_contact_to_reminder($reminder_id, $contact_id) {
        $data = array(
            'reminder_id' => $reminder_id,
            'contact_id' => $contact_id
        );
        $this->db->insert('reminder_contact', $data);
    }

    // Menghapus semua kontak yang terhubung dengan pengingat
    public function delete_contacts_for_reminder($reminder_id) {
        $this->db->where('reminder_id', $reminder_id);
        $this->db->delete('reminder_contact');
    }
    public function get_contacts_for_reminder($reminder_id) {
        // Mengambil kontak terkait dengan reminder tertentu
        $this->db->select('contacts.id, contacts.name, contacts.email, contacts.phone_number');
        $this->db->from('contacts');
        $this->db->join('reminder_contact', 'contacts.id = reminder_contact.contact_id');
        $this->db->where('reminder_contact.reminder_id', $reminder_id);  // Menentukan ID reminder yang dicari
        $query = $this->db->get();  // Menjalankan query
        return $query->result_array();  // Mengembalikan hasil sebagai array
    }
    public function update_status($reminder_id, $status)
{
    $data = array(
        'status' => $status
    );

    $this->db->where('id', $reminder_id);
    $this->db->update('reminder', $data);  // Update status pengingat
}

public function get_reminders_by_status($status) {
    // Mengambil pengingat dengan status tertentu dan informasi kontak
    $this->db->select('r.*, c.email, c.phone_number'); // Ambil kolom dari tabel reminder dan kontak
    $this->db->from('reminder r');
    $this->db->join('reminder_contact rc', 'rc.reminder_id = r.id', 'left'); // Gabungkan dengan reminder_contact
    $this->db->join('contacts c', 'c.id = rc.contact_id', 'left'); // Gabungkan dengan contacts
    $this->db->where('r.status', $status); // Filter berdasarkan status
    $query = $this->db->get(); // Eksekusi query

    return $query->result_array(); // Mengembalikan hasil query dalam bentuk array
}
public function get_selected_contacts($reminder_id) {
    // Ambil kontak yang terhubung dengan pengingat berdasarkan ID pengingat
    $this->db->select('contact_id');
    $this->db->from('reminder_contact');
    $this->db->where('reminder_id', $reminder_id);
    $query = $this->db->get();

    // Ambil hasilnya sebagai array
    $result = $query->result_array();

    // Ambil hanya ID kontak yang terhubung
    $selected_contacts = array();
    foreach ($result as $row) {
        $selected_contacts[] = $row['contact_id'];
    }

    return $selected_contacts;
}


    
}
