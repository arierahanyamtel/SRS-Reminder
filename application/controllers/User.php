<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('User_model');
        $this->load->helper(['url', 'form']);
        $this->load->library('session');
        $this->check_login();
    }

    private function check_login() {
        
        if (!$this->session->userdata('user_id')) {
           
            redirect('login'); 
        }
        if ($this->session->userdata('role') !== 'admin') {
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses untuk mengakses halaman user');
            redirect('');
        }
    }
    public function index()
    {
        $data['users'] = $this->User_model->get_all_users();
        $this->load->view('tema-set/header');
        $this->load->view('user_view', $data);
        $this->load->view('tema-set/footer');
    }

    public function create()
    {
        $this->load->view('tema-set/header');
        $this->load->view('create_user');
        $this->load->view('tema-set/footer');
    }

    public function store()
    {
        $user_data = array(
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role' => $this->input->post('role')
        );

        $this->User_model->insert_user($user_data);
        redirect('user');
    }

    public function edit($id)
    {
        $data['user'] = $this->User_model->get_user_by_id($id);
        $this->load->view('tema-set/header');
        $this->load->view('edit_user', $data);
        $this->load->view('tema-set/footer');
    }

    public function update($id)
    {
        $user_data = array(
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role' => $this->input->post('role')
        );

        $this->User_model->update_user($id, $user_data);
        redirect('user');
    }

    public function delete($id)
    {
        $this->User_model->delete_user($id);
        redirect('user');
    }
    
}
