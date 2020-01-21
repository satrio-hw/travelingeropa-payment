<?php

class admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->library('form_validation');

        if ($this->session->userdata('email') == false || $this->session->userdata('role') == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">AKSES DITOLAK !!! Silahkan masukan email dan password yang terdaftar</div>');
            redirect(base_url('admin/Login'));
        }
    }

    // --------------------------------------------- VIEW CONTROLLERS START --------------------------------------------- //
    public function index()
    {
        $data = [
            'admins' => $this->admin_model->getAllAdmins()
        ];
        //sebagai testing, session predivined
        //$this->session->set_userdata('email', 'sa1@te.com');
        //$this->session->set_userdata('role', 'spadm');
        // load view vadmin
        $this->load->view("vadmin/table", $data);
    }
    public function form()
    {
        // load view vadmin
        if ($this->input->post('export') == "export") {
            redirect('cadmin/adm_export/exp_excel');
        } else {
            $this->load->view("vadmin/form");
        }
    }
    // --------------------------------------------- VIEW CONTROLLERS END --------------------------------------------- //

    // hapus admin pada tabel
    public function deletelist()
    {
        if (isset($_POST['auth_confirm'])) {

            $auth_email = $this->session->userdata('email');
            $role = $this->admin_model->getAdminByEmail($auth_email)['role'];

            //validasi akun yang melakukan aktifitas (harusa super admin)
            if ($role == 'spadm') {
                $this->form_validation->set_rules('auth_pass', 'auth_pass', 'required');
                //validasi password yang dimasukan super admin
                if ($this->form_validation->run() == false) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password yang dimasukan salah</div>');
                    $this->load->view("vadmin/table");
                } else {
                    $data = [
                        'password' => $this->input->post('auth_pass'),
                        'id_todo' => htmlspecialchars($this->input->post('email_record', true))
                    ];

                    $auth_sa = $this->db->get_where('admin', ['email' => $auth_email])->row_array();

                    $baseline_pass = $auth_sa['password']; //password yang ada di DB
                    $inserted_pass = $data['password']; //password yang dimasukan user
                    $unhash = password_verify($inserted_pass, $baseline_pass);

                    if ($unhash == true) {
                        $this->db->delete('admin', ['email' => $data['id_todo']]);
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Admin dengan ID : ' . $data['id_todo'] . ' telah dihapus</div>');
                        redirect('cadmin/admin');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah</div>');
                        redirect('cadmin/admin');
                    }
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda login sebagai ' . $auth_email . '<br>AKSES DITOLAK</div>');
                redirect('cadmin/admin');
            }
        } else {
            $record_todo = [
                'email' => base64_decode($_GET['id']),
                'record_admin' => $this->admin_model->getAdminByEmail(base64_decode($_GET['id']))
            ];
            $list_admin = [
                'admins' => $this->admin_model->getAllAdmins(),
                'record_todo' => $record_todo
            ];

            $this->load->view("vadmin/table", $list_admin);
        }
    }
    // Edit admin pada tabel
    public function editlist()
    {
        $the_user = $this->session->userdata('email');
        if (isset($_POST['submit'])) {

            $this->form_validation->set_rules('namaadmin', 'Nama Admin', 'required|trim');
            $this->form_validation->set_rules('role', 'Role Admin', 'required|trim');
            $this->form_validation->set_rules('alamatadmin', 'Alamat Admin', 'required|max_length[120]|trim');
            $this->form_validation->set_rules('tlpadmin', 'No. Tlp. Admin', 'required|trim|numeric|max_length[12]|min_length[12]', [
                'max_length' => 'masukan 12 digit no. tlp',
                'min_length' => 'masukan 12 digit no. tlp'
            ]);

            if ($this->input->post('emailadmin')) {
                $this->form_validation->set_rules('emailadmin', 'Email Admin', 'trim|valid_email|is_unique[admin.email]', [
                    'is_unique' => 'Email sudah terdaftar'
                ]);
                $data1 = [
                    'nama' => htmlspecialchars($this->input->post('namaadmin', true)),
                    'email' => htmlspecialchars($this->input->post('emailadmin', true)),
                    'role' => $this->input->post('role'),
                    'alamat' => $this->input->post('alamatadmin'),
                    'notlp' => $this->input->post('tlpadmin')
                ];
            } else {
                $data1 = [
                    'nama' => htmlspecialchars($this->input->post('namaadmin', true)),
                    'role' => $this->input->post('role'),
                    'email' => $this->session->userdata('email_value'),
                    'alamat' => $this->input->post('alamatadmin'),
                    'notlp' => $this->input->post('tlpadmin')
                ];
            }

            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Input salah, cek kembali data yang dimasukan</div>');
                $this->load->view("vadmin/editform", $data1);
            } else {
                $record_todo = $this->input->post('email_record');
                if ($this->admin_model->getAdminByEmail($the_user)['role'] != "spadm" && $data1['role'] != 'adm') {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda tidak dapat mengubah role anda</div>');
                    $this->load->view("vadmin/editform", $data1);
                } else {
                    $this->db->where('email', $record_todo);
                    $this->db->update('admin', $data1);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Detail profil admin(' . $record_todo . ') BERHASIL diubah</div>');
                    redirect('cadmin/admin');
                }
            }
        } else {
            $decrypt_email = base64_decode($_GET['id']);
            $this->session->set_userdata('email_value', $decrypt_email);

            if (($the_user == $this->admin_model->getAdminByEmail($decrypt_email)['email']) || ($this->admin_model->getAdminByEmail($the_user)['role'] == "spadm")) {
                $data = [
                    'nama' => $this->admin_model->getAdminByEmail($decrypt_email)['nama'],
                    'email' => $this->admin_model->getAdminByEmail($decrypt_email)['email'],
                    'role' => $this->admin_model->getAdminByEmail($decrypt_email)['role'],
                    'alamat' => $this->admin_model->getAdminByEmail($decrypt_email)['alamat'],
                    'notlp' => $this->admin_model->getAdminByEmail($decrypt_email)['notlp']
                ];
                $this->load->view("vadmin/editform", $data);
            } else {
                //echo $the_user;
                //echo $this->admin_model->getAdminByEmail($the_user)['role'];
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Hak akses dilarang</div>');
                redirect('cadmin/admin');
            }
        }
    }
    // Registrasi NEW ADMIN
    public function regisadmin()
    {
        $this->form_validation->set_rules('namaadmin', 'Nama Admin', 'required|trim');
        $this->form_validation->set_rules('emailadmin', 'Email Admin', 'required|trim|valid_email|is_unique[admin.email]', [
            'is_unique' => 'Email sudah terdaftar'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'password yang anda masukan tidak sama ',
            'min_length' => 'password terlalu pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|min_length[6]|matches[password1]|trim', [
            'matches' => 'password yang anda masukan tidak sama ',
            'min_length' => 'password terlalu pendek'
        ]);
        $this->form_validation->set_rules('role', 'Role Admin', 'required|trim');
        $this->form_validation->set_rules('alamatadmin', 'Alamat Admin', 'required|max_length[120]|trim');
        $this->form_validation->set_rules('tlpadmin', 'No. Tlp. Admin', 'required|trim|numeric|max_length[12]|min_length[12]', [
            'max_length' => 'masukan 12 digit no. tlp',
            'min_length' => 'masukan 12 digit no. tlp'
        ]);


        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Input salah, cek kembali data yang dimasukan</div>');
            $this->load->view("vadmin/form");
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('namaadmin', true)),
                'email' => htmlspecialchars($this->input->post('emailadmin', true)),
                'role' => $this->input->post('role'),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'alamat' => $this->input->post('alamatadmin'),
                'notlp' => $this->input->post('tlpadmin')
            ];
            $this->db->insert('admin', $data);
            redirect('cadmin/admin');
        }
    }
    // Ubah password
    public function change_pass()
    {
        if (isset($_POST['reset_admin'])) {

            $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
                'matches' => 'password yang anda masukan tidak sama ',
                'min_length' => 'password terlalu pendek'
            ]);
            $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|min_length[6]|matches[password1]|trim', [
                'matches' => 'password yang anda masukan tidak sama ',
                'min_length' => 'password terlalu pendek'
            ]);

            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kesalahan pada Input "Ubah Password"</div>');
                redirect('cadmin/admin');
            } else {
                $add_newpass = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
                $this->db->set('password', $add_newpass);
                $this->db->where('email', $this->input->post('email_record'));
                $this->db->update('admin');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">password berhasil diubah oleh Super Admin</div>');
                redirect('cadmin/admin');
            }
        } else if (isset($_POST['submit1'])) {
            if ($this->input->post('email_record') == $this->session->userdata('email')) {
                $baseline_pass = $this->admin_model->getAdminByEmail($this->input->post('email_record'))['password'];
                $inserted_pass = $this->input->post('passwordold');
                $unhash = password_verify($inserted_pass, $baseline_pass);

                if ($unhash) {

                    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
                        'matches' => 'password yang anda masukan tidak sama ',
                        'min_length' => 'password terlalu pendek'
                    ]);
                    $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|min_length[6]|matches[password1]|trim', [
                        'matches' => 'password yang anda masukan tidak sama ',
                        'min_length' => 'password terlalu pendek'
                    ]);

                    if ($this->form_validation->run() == false) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kesalahan Input</div>');
                        redirect('cadmin/admin');
                    } else {
                        $add_newpass = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
                        $this->db->set('password', $add_newpass);
                        $this->db->where('email', $this->input->post('email_record'));
                        $this->db->update('admin');
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">password berhasil diubah</div>');
                        redirect('cadmin/admin');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password lama tidak sesuai</div>');
                    redirect('cadmin/admin');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Ubah password hanya bisa dilakukan oleh akun terpaut</div>');
                redirect('cadmin/admin');
            }
        } else {
            $email_todo['email'] = htmlspecialchars($this->input->post('email_record'));
            $this->load->view("vadmin/passform", $email_todo);
        }
    }
    // Edit Sender
    public function editsender()
    {
        if (isset($_POST['submitmailer'])) {

            $this->form_validation->set_rules('emailsender', 'Nama Admin', 'required|trim');
            $this->form_validation->set_rules('smtpmailer', 'Alamat Admin', 'required|max_length[120]|trim');
            $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
                'matches' => 'password yang anda masukan tidak sama ',
                'min_length' => 'password terlalu pendek'
            ]);
            $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|min_length[6]|matches[password1]|trim', [
                'matches' => 'password yang anda masukan tidak sama ',
                'min_length' => 'password terlalu pendek'
            ]);

            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Konfigurasi mailer gagal, cek kembali input yang dimasukan</div>');
                redirect('cadmin/admin');
            } else {
                $mailer = $this->input->post('emailsender');
                $senderemail = $this->db->get_where('admin', ['role' => 'mailer'])->row_array();
                $passmailer = $senderemail['password'];

                if ($this->input->post('passwordold') == base64_decode($passmailer)) {
                    $data1 = [
                        'email' => htmlspecialchars($this->input->post('emailsender', true)),
                        'alamat' => htmlspecialchars($this->input->post('smtpmailer', true)),
                        'password' => base64_encode($this->input->post('password1'))
                    ];
                    $this->db->where('role', 'mailer');
                    $this->db->update('admin', $data1);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Mailer Berhasil diubah</div>');
                    redirect('cadmin/admin');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Konfigurasi mailer gagal, cek password yang dimasukan</div>');
                    redirect('cadmin/admin');
                }
            }
        } else {
            $data = ['mailer' => $_GET['id']];
            $this->load->view("vadmin/themailer", $data);
        }
    }
}
