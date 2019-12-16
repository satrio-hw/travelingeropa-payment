<?php

class Paket extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('paket_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["paket"] = $this->paket_model->getAll();
        $this->load->view("vpaket/list", $data);
    }

    public function add()
    {
        $paket = $this->paket_model;
        $validation = $this->form_validation;
        $validation->set_rules($paket->rules());

        if ($validation->run()) {
            $paket->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('cpaket/paket'));
        }
        $this->load->view('vpaket/new_form');
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('cpaket/paket');

        $paket = $this->paket_model;
        $validation = $this->form_validation;
        $validation->set_rules($paket->rules());

        if ($validation->run()) {
            $paket->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('cpaket/paket'));
        }

        $data['paket'] = $paket->getById($id);
        if (!$data['paket']) show_404();

        $this->load->view('vpaket/edit_form', $data);
    }
    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->paket_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('cpaket/paket'));
        }
    }
}