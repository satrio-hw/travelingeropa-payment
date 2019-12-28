<?php

class mp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pembayaran_model');
        $this->load->library('form_validation');

        if ($this->session->userdata('email') == false || $this->session->userdata('role') == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">AKSES DITOLAK !!! Silahkan masukan email dan password yang terdaftar</div>');
            redirect(base_url('admin/Login'));
        }
    }

    public function index()
    {
        // load view vmanagementpembayaran/vmp.php
        $data['pembayaran'] = $this->pembayaran_model->getAllPembayaran();
        $this->load->view("vmanagementpembayaran/vmp", $data);
    }

    public function konfirmasi()
    {
        $data = ['konfirmasi' => 'ok'];
        $this->db->where('email', base64_decode($_GET['e']));
        $this->db->update('pembayaran', $data);
        $this->session->set_userdata('konfirmasi', 'ok');
        $this->session->set_userdata('sendto', base64_decode($_GET['e']));
        $this->session->set_userdata('event', base64_decode($_GET['id']));
        redirect(base_url('cmanagementpembayaran/mailer'));
    }
    public function addpembayaran()
    {
        $this->form_validation->set_rules('status_pembayaran', 'Status Pembayaran', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('id_order', 'id_order', 'required|trim');
        $this->form_validation->set_rules('waktu', 'Waktu', 'required|trim');


        //$this->form_validation->set_rules('bukti', 'bukti', 'required');
        //$this->form_validation->set_rules('admin', 'admin', 'required');


        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role = "alert">Input salah, cek kembali data yang diinput</div>');
            $this->load->view('vmanagementpembayaran/addpembayaran');
        } else {

            /*if (!isset($_FILES['bukti'])){
                if (is_uploaded_file($_FILES['bukti']['bukti'])){
                    $imgData = addslashes(file_get_contents($_FILES['bukti']['tmp_name']));
                }
            }*/
            $data = [
                'status_pembayaran' => $this->input->post('status_pembayaran'),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'id_order' => htmlspecialchars($this->input->post('id_order', true)),
                'waktu' => $this->input->post('waktu'),
                'pembayaran' => '0'
                // 'bukti' => $imgData
                //'admin' => $this->input->post('admin')
            ];
            $this->db->insert('pembayaran', $data);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            $this->load->view('vmanagementpembayaran/vmp');
            redirect('cmanagementpembayaran/mp');
        }
        $this->load->view('vmanagementpembayaran/addpembayaran');
    }
    public function export_pembayaran()
    {
        $data['pembayaran'] = $this->pembayaran_model->getAllPembayaran();
        $this->load->view('vmanagementpembayaran/export_pembayaran', $data);
    }
}
