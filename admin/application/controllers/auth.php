<?php
defined('BASEPATH') or exit('No direct script access allowed');
#class Auth extends CI_Controller
#{

 #   public function index()
  #  {
   #     redirect(base_url('admin/Login'));
#    }
#}

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_login");
        $this->load->library('form_validation');
    }

    public function index()
    {
        // jika form login disubmit
        if ($this->input->post()) {
            if ($this->m_login->doLogin()) {
                redirect(site_url('cmanagementpembayaran/mp'));
            }
        }

        // tampilkan halaman login
        $this->load->view("admin/login");
    }

    public function logout()
    {
        // hancurkan semua
        $this->session->sess_destroy();
        redirect('admin/login');
    }
}
