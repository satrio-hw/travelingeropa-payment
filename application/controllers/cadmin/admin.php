<?php

class admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->library('form_validation');
    }

    // --------------------------------------------- VIEW CONTROLLERS START --------------------------------------------- //
    public function index()
    {
        $data = [
            'admins' => $this->admin_model->getAllAdmins()
        ];
        //sebagai testing, session predivined
        $this->session->set_userdata('email', 'sa1@te.com');
        // load view vadmin
        $this->load->view("vadmin/table", $data);
    }
    public function form()
    {
        // load view vadmin
        if ($this->input->post('export') == "export") {
            echo "export clicked";
            redirect('cadmin/admin');
        } else {
            $this->load->view("vadmin/form");
        }
    }
    // --------------------------------------------- VIEW CONTROLLERS END --------------------------------------------- //

    // ---------------------------------------------CONFIRMATION SA START--------------------------------------------- //
    public function deletelist()
    {
        if (isset($_POST['auth_confirm'])) {

            $auth_email = $this->session->userdata('email');
            $role = $this->admin_model->getAdminByEmail($auth_email)['role'];

            if ($role == 'spadm') {
                $this->form_validation->set_rules('auth_pass', 'auth_pass', 'required');
                $this->form_validation->set_rules('id_record', 'id_record', 'required');

                if ($this->form_validation->run() == false) {
                    echo '<script>alert("INPUT PASSWORD, ID or ACTIONS ERROR")</script>';
                    $this->load->view("vadmin/table");
                } else {
                    $data = [
                        'password' => $this->input->post('auth_pass'),
                        'id_todo' => htmlspecialchars($this->input->post('id_record', true))
                    ];

                    $email_sa = $this->db->get_where('admin', ['email' => $data['email']])->row_array();
                    $auth_sa = $this->db->get_where('admin', ['email' => $email_sa])->row_array();

                    $baseline_pass = $auth_sa['password'];
                    $inserted_pass = $data['password'];
                    $unhash = password_verify($inserted_pass, $baseline_pass);

                    if ($unhash == true) {
                        $this->db->delete('admin', ['id_admin' => $data['id_todo']])->row_array();
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
                'id' => $_GET['id'],
                'record_admin' => $this->admin_model->getAdminByID($_GET['id'])
            ];
            $list_admin = [
                'admins' => $this->admin_model->getAllAdmins(),
                'record_todo' => $record_todo
            ];

            $this->load->view("vadmin/table", $list_admin);
        }
    }
    // ---------------------------------------------CONFIRMATION SA END--------------------------------------------- //


    // Edit admin pada tabel
    public function editlist()
    {
        $the_user = $this->session->userdata('email');
        if(isset($_POST['submit'])){
            $this->form_validation->set_rules('id_record', 'id_record', 'required');
            $this->form_validation->set_rules('namaadmin', 'Nama Admin', 'required|trim');
            $this->form_validation->set_rules('emailadmin', 'Email Admin', 'required|trim|valid_email');
            $this->form_validation->set_rules('role', 'Role Admin', 'required|trim');
            $this->form_validation->set_rules('alamatadmin', 'Alamat Admin', 'required|max_length[120]|trim');
            $this->form_validation->set_rules('tlpadmin', 'No. Tlp. Admin', 'required|trim|numeric|max_length[12]|min_length[12]', [
                'max_length' => 'masukan 12 digit no. tlp',
                'min_length' => 'masukan 12 digit no. tlp'
            ]);

            if ($this->form_validation->run() == false) {
                echo "something wrong";
            } else {
                $record_todo = $this->input->post('id_record'); 
                $data1 = [
                    'nama' => htmlspecialchars($this->input->post('namaadmin', true)),
                    'email' => htmlspecialchars($this->input->post('emailadmin', true)),
                    'role' => $this->input->post('role'),
                    'alamat' => $this->input->post('alamatadmin'),
                    'notlp' => $this->input->post('tlpadmin')
                ];
                if($this->admin_model->getAdminByEmail($the_user)['role'] != "spadm" && $data1['role'] != 'adm'){
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda tidak dapat mengubah role anda</div>');
                    $this->load->view("vadmin/editform", $data1);
                }else{
                    $this->db->where('id_admin', $record_todo);
                    $this->db->update('admin', $data1);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Detail profil admin('.$record_todo.') BERHASIL diubah</div>');
                    redirect('cadmin/admin');
                }
            }

        }else{
            if (($the_user == $this->admin_model->getAdminByID($_GET['id'])['email']) || ($this->admin_model->getAdminByEmail($the_user)['role'] == "spadm")) {
                $data =[  
                    'id_todo' => $_GET['id'],
                    'nama' => $this->admin_model->getAdminByID($_GET['id'])['nama'],
                    'email' => $this->admin_model->getAdminByID($_GET['id'])['email'],
                    'role' => $this->admin_model->getAdminByID($_GET['id'])['role'],
                    'alamat' => $this->admin_model->getAdminByID($_GET['id'])['alamat'],
                    'notlp' => $this->admin_model->getAdminByID($_GET['id'])['notlp']
                ];
                $this->load->view("vadmin/editform", $data);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">uneditable' . $this->admin_model->getAdminByID($_GET['id'])['role'] . '</div>');
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
            echo "something wrong";
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
}
