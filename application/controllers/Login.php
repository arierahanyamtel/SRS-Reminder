<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');

        $this->load->database();
        $this->load->helper(['url', 'form']);
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('login_view');
    }

    public function authenticate()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $user = $this->User_model->get_user_by_username($username);

        if ($user && password_verify($password, $user['password'])) {
            $this->session->set_userdata('user_id', $user['id']);
            $this->session->set_userdata('username', $user['username']);
            $this->session->set_userdata('role', $user['role']);
            redirect('reminder');
        } else {
            $this->session->set_flashdata('error', 'User / Password Salah!');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
