<?php
class cindex extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pembayaran_model');
        $this->load->model('paket_model');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
    }
    public function index()
    {
        $sessionData = $this->session->all_userdata();
        foreach ($sessionData as $key => $val) {
            if (
                $key != 'stat'
                && $key != 'email'
            ) {
                $this->session->unset_userdata($key);
            }
        }
        if ($this->session->userdata('stat') == 'uploadgagal') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role = "alert">Gagal Upload Gambar Bukti</div>');
        }
        if ($this->session->userdata('stat') == 'uploadberhasil') {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role = "alert">Bukti Pembayaran berhasil diupload</div>');
        }
        if ($this->session->userdata('stat') == 'gagalkirimemail') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role = "alert">Mail Error :<br>1. Cek koneksi internet anda<br>2. Bila masalah berlanjut, hubungi Customer Service kami</div>');
        }
        $this->load->view("index.php");
    }
    public function cekemail()
    {
        if ($this->input->post('email') != NULL) {
            $this->session->set_userdata('email', $this->input->post('email'));
            $this->session->userdata('email');
            $this->load->view('addpj');
        }
    }
    public function addpjtodb()
    {
        $datapaket = [
            'listpaket' => $this->db->get('paket')->result_array(),
            'nama' => $this->session->userdata('namapenyetor'),
            'email' => $this->session->userdata('sendto'),
            'ttl' => $this->session->userdata('ttlpenyetor'),
            'hp' => $this->session->userdata('hppenyetor')
        ];
        $data = [
            'nama' => $this->session->userdata('namapenyetor'),
            'email' => $this->session->userdata('sendto'),
            'tanggal_lahir ' => $this->session->userdata('ttlpenyetor'),
            'hp' => $this->session->userdata('hppenyetor')
        ];
        // var_dump($data);
        $this->db->insert('pemesan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role = "alert">Email notifikasi telah dikirimkan. Silahkan cek inbox pada email anda</div>');

        $this->load->view("dp", $datapaket);
    }
    public function addpj()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('hp', 'No. HP', 'required|trim');

        # cek pemesan di tabel pemesan
        $cekpemesan = $this->db->get_where('pemesan', ['email' => $this->input->post('email')])->result_array();

        if (isset($_POST['bayardp'])) {

            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role = "alert">Input salah, cek kembali data yang diinput</div>');
                $this->load->view('addpj');
            } else {
                // var_dump($cekpemesan);
                $newemail = 0;
                $authflag = 1;

                # Jika tidak terdaftar di tabel pemesan
                if ($cekpemesan == null) {
                    $newemail = 1;
                } else {
                    if ($cekpemesan[0]['nama'] != $this->input->post('nama')) {
                        $authflag = 0;
                    } else if ($cekpemesan[0]['email'] != htmlspecialchars($this->input->post('email', true))) {
                        $authflag = 0;
                    } else if ($cekpemesan[0]['tanggal_lahir'] != $this->input->post('tanggal_lahir')) {
                        $authflag = 0;
                    } else if ($cekpemesan[0]['hp'] != $this->input->post('hp')) {
                        $authflag = 0;
                    }
                }


                if ($authflag == 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pastikan data yang anda masukan sama persis dengan data yang anda input pertama (cek inbox email anda untuk info lebih lanjut)</div>');
                    $this->load->view('addpj');
                } else {
                    if ($newemail == 1) {
                        $this->session->set_userdata('sendto', $this->input->post('email', true));
                        $this->session->set_userdata('namapenyetor', $this->input->post('nama'));
                        $this->session->set_userdata('ttlpenyetor', $this->input->post('tanggal_lahir'));
                        $this->session->set_userdata('hppenyetor', $this->input->post('hp'));
                        $this->session->set_userdata('notif', 'userbaru');
                        redirect(base_url('mailer'));
                    } else {
                        redirect(base_url('cindex/addpjtodb'));
                    }
                }
            }
        }
        if (isset($_POST['cicilan'])) {

            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role = "alert">Input salah, cek kembali data yang diinput</div>');
                $this->load->view('addpj');
            } else {
                // var_dump($cekpemesan);
                $newemail = 0;
                $authflag = 1;

                if ($cekpemesan == null) {
                    $newemail = 1;
                } else {
                    if ($cekpemesan[0]['nama'] != $this->input->post('nama')) {
                        $authflag = 0;
                    } else if ($cekpemesan[0]['email'] != htmlspecialchars($this->input->post('email', true))) {
                        $authflag = 0;
                    } else if ($cekpemesan[0]['tanggal_lahir'] != $this->input->post('tanggal_lahir')) {
                        $authflag = 0;
                    } else if ($cekpemesan[0]['hp'] != $this->input->post('hp')) {
                        $authflag = 0;
                    }
                }


                if ($authflag == 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pastikan data yang anda masukan sama persis dengan data yang anda input pertama (cek inbox email anda untuk info lebih lanjut)</div>');
                    $this->load->view('addpj');
                } else if ($authflag == 1 or $newemail == 1) {
                    if ($newemail == 1) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data anda belum terdaftar melakukan upload bukti cicilan sebelumnya</div>');
                        redirect(base_url('cindex'));
                    } else {
                        $this->session->set_userdata('sendto', $this->input->post('email', true));
                        $this->session->set_userdata('namapenyetor', $this->input->post('nama'));
                        $this->session->set_userdata('ttlpenyetor', $this->input->post('tanggal_lahir'));
                        $this->session->set_userdata('hppenyetor', $this->input->post('hp'));
                        $data = [
                            'id_order' => $this->db->get_where('order', ['email_pemesan' => htmlspecialchars($this->input->post('email', true))])->result_array()
                        ];
                        // var_dump($data['id_order'][0]['id_paket']);
                        $this->load->view('cicilan', $data);
                    }
                }
            }
        }
    }
}
