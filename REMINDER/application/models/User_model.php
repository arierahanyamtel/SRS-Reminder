<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function get_all_users()
    {
        return $this->db->get('users')->result_array();
    }

    public function insert_user($data)
    {
        $this->db->insert('users', $data);
    }

    public function get_user_by_username($username)
    {
        return $this->db->get_where('users', ['username' => $username])->row_array();
    }

    public function get_user_by_id($id)
    {
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }

    public function update_user($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    public function delete_user($id)
    {
        $this->db->delete('users', ['id' => $id]);
    }
}
