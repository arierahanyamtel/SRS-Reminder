<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class Reminder extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->helper(['url', 'form']);
        $this->load->library('session');

        $this->load->model('Reminder_model');
        $this->load->model('Contact_model');

        $this->check_login();
    }

    private function check_login()
    {

        if (!$this->session->userdata('user_id')) {

            redirect('login');
        }
    }





    public function index()
    {

        $data['reminders'] = $this->Reminder_model->get_all_reminders();

        $data['is_admin'] = ($this->session->userdata('username') == 'admin') ? true : false;
        $this->load->view('tema-set/header');
        $this->load->view('reminder_view', $data);
        $this->load->view('tema-set/footer');

    }
    

    public function create()
    {

        $data['contacts'] = $this->Contact_model->get_all_contacts();
        $this->load->view('tema-set/header');
        $this->load->view('create_reminder', $data);
        $this->load->view('tema-set/footer');
    }

    public function store()
    {

        $reminder_data = array(
            'reminder_title' => $this->input->post('title'),
            'reminder_description' => $this->input->post('description'),
            'reminder_date' => $this->input->post('date')
        );


        $reminder_id = $this->Reminder_model->insert_reminder($reminder_data);


        $contact_ids = $this->input->post('contacts');


        if ($contact_ids) {
            foreach ($contact_ids as $contact_id) {
                $this->Reminder_model->link_contact_to_reminder($reminder_id, $contact_id);
            }
        }


        redirect('reminder');
    }

    public function edit($id)
    {

        $data['reminder'] = $this->Reminder_model->get_reminder_by_id($id);

        if (!$data['reminder']) {

            show_404();
        }


        $data['contacts'] = $this->Contact_model->get_all_contacts();



        $data['selected_contacts'] = $this->Reminder_model->get_selected_contacts($id);

        $this->load->view('tema-set/header');
        $this->load->view('edit_reminder', $data);
        $this->load->view('tema-set/footer');
    }


    public function update($id)
    {

        $reminder_data = array(
            'reminder_title' => $this->input->post('title'),
            'reminder_description' => $this->input->post('description'),
            'reminder_date' => $this->input->post('date'),
            'status' => $this->input->post('status')
        );


        $this->Reminder_model->update_reminder($id, $reminder_data);


        $this->Reminder_model->delete_contacts_for_reminder($id);


        $contact_ids = $this->input->post('contacts');


        if ($contact_ids) {
            foreach ($contact_ids as $contact_id) {
                $this->Reminder_model->link_contact_to_reminder($id, $contact_id);
            }
        }


        redirect('reminder');
    }

    public function delete($id)
    {

        $this->Reminder_model->delete_reminder($id);
        redirect('reminder');
    }


    public function send_reminders()
    {

        $reminders = $this->Reminder_model->get_reminders_by_status(0);


        if (!empty($reminders)) {
            foreach ($reminders as $reminder) {

                $this->send_reminder($reminder);
            }
        } else {
            echo "Tidak ada pengingat dengan status 0 yang ditemukan.";
        }
    }


    private function send_reminder($reminder)
    {

        if ($this->is_reminder_date_today($reminder['reminder_date']) && $reminder['status'] == 0) {


            $this->send_email($reminder);


            $this->send_whatsapp_message($reminder);


            $this->Reminder_model->update_status($reminder['id'], 1);
        } else {
            echo "Reminder dengan ID " . $reminder['id'] . " tidak memenuhi syarat untuk dikirimkan.<br>";
        }
    }


    private function is_reminder_date_today($reminder_date)
    {

        $today = date('Y-m-d');


        return $reminder_date == $today;
    }



    private function send_email($reminder)
    {
        $mail = new PHPMailer(true);

        try {

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'ari.it.smi@gmail.com';
            $mail->Password = 'kkaj ckob ngyq wria';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;


            $mail->setFrom('ari.it.smi@gmail.com', $reminder['reminder_title']);
            $mail->addAddress($reminder['email']);


            $mail->isHTML(true);
            $mail->Subject = 'Reminder: ' . $reminder['reminder_title'];
            $mail->Body = $reminder['reminder_description'];


            if ($mail->send()) {
                echo "Email berhasil dikirim ke: " . $reminder['email'] . "<br>";
            } else {
                echo "Gagal mengirim email ke: " . $reminder['email'] . "<br>";
            }

        } catch (Exception $e) {
            echo "Gagal mengirim email. Kesalahan: {$mail->ErrorInfo}<br>";
        }
    }

    private function send_whatsapp_message($reminder)
    {
        $target_number = $reminder['phone_number'];
        $message = $reminder['reminder_description']; // Gunakan pesan yang sama dengan email

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $target_number,
                'message' => 'Hai, ' . $message, 
                'delay' => '5',
                'countryCode' => '62', // Ganti dengan kode negara yang sesuai
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: +9HR#38X5to#hK!Qze3#' // Ganti dengan token yang sebenarnya
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        if ($response) {
            echo "Pesan WhatsApp berhasil dikirim ke: " . $target_number . "<br>";
        } else {
            echo "Gagal mengirim pesan WhatsApp ke: " . $target_number . "<br>";
        }
    }


    
}
