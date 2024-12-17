<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(['url', 'form']);
        $this->load->library('session');
        $this->load->model('Contact_model');
        $this->check_login();
    }

    private function check_login() {
        if (!$this->session->userdata('user_id')) {
            redirect('login'); 
        }

        
    }

    public function index()
    {
        $data['contacts'] = $this->Contact_model->get_all_contacts();
        $this->load->view('tema-set/header');
        $this->load->view('contact_view', $data);
        $this->load->view('tema-set/footer');
    }

    public function create()
    {
        $this->load->view('tema-set/header');
        $this->load->view('create_contact');
        $this->load->view('tema-set/footer');
    }

    public function store()
    {
        $contact_data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone_number' => $this->input->post('phone')
        );

        $this->Contact_model->insert_contact($contact_data);
        redirect('contact');
    }

    public function edit($id)
    {
        $data['contact'] = $this->Contact_model->get_contact_by_id($id);
        $this->load->view('tema-set/header');
        $this->load->view('edit_contact', $data);
        $this->load->view('tema-set/footer');
    }

    public function update($id)
    {
        $contact_data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone_number' => $this->input->post('phone')
        );

        $this->Contact_model->update_contact($id, $contact_data);
        redirect('contact');
    }

    public function delete($id)
    {
        $this->Contact_model->delete_contact($id);
        redirect('contact');
    }
}
