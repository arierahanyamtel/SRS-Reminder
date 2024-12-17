<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {

    public function get_all_contacts() {
        $query = $this->db->get('contacts');
        return $query->result_array();
    }

    public function insert_contact($data)
    {
        $this->db->insert('contacts', $data);
    }

    public function get_contact_by_id($id)
    {
        return $this->db->get_where('contacts', ['id' => $id])->row_array();
    }

    public function update_contact($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('contacts', $data);
    }

    public function delete_contact($id)
    {
        $this->db->delete('contacts', ['id' => $id]);
    }
}
