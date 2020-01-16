<?php

class Peserta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mjoin');
        $this->load->model('peserta_model');
        $this->load->library('form_validation');

        if ($this->session->userdata('email') == false || $this->session->userdata('role') == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">AKSES DITOLAK !!! Silahkan masukan email dan password yang terdaftar</div>');
            redirect(base_url('admin/Login'));
        }
    }

    public function index()
    {

        $data["peserta"] = $this->peserta_model->getAll();
        $this->load->view("vpeserta/list", $data);
    }

    public function berorder()
    {
        $id = (int) $_GET['id'];

        $data["peserta"] = $this->peserta_model->getByIdOrder($id);
        $this->load->view("vpeserta/list", $data);
        // $data["peserta"] = $this->peserta_model->getById($id);
        // $this->load->view("vpeserta/list", $data);
    }

    public function add()
    {
        $peserta = $this->peserta_model;
        $validation = $this->form_validation;
        $validation->set_rules($peserta->rules());

        if ($validation->run()) {
            $peserta->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('cpeserta/peserta'));
        }
        $this->load->view('vpeserta/new_form');
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('cpeserta/peserta');

        $peserta = $this->peserta_model;
        $validation = $this->form_validation;
        $validation->set_rules($peserta->rules());

        if ($validation->run()) {
            $peserta->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('cpeserta/peserta'));
        }

        $data['peserta'] = $peserta->getById($id);
        if (!$data['peserta']) show_404();

        $this->load->view('vpeserta/edit_form', $data);
    }
    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->peserta_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('cpeserta/peserta'));
        }
    }
}
