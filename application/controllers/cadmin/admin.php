<?php

class admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('admin_model');
    }

    // --------------------------------------------- VIEW CONTROLLERS START --------------------------------------------- //
    public function index()
    {
        $list_admin['admins'] = $this->admin_model->getAllAdmins();
        // load view vadmin
        $this->load->view("vadmin/table", $list_admin);
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
    public function auth()
    {
        if (isset($_POST['auth_confirm'])) {
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

                $email_sa = 'sa@me.com';
                $auth_sa = $this->db->get_where('admin', ['email' => $email_sa])->row_array();

                $baseline_pass = $auth_sa['password'];
                $inserted_pass = $data['password'];
                $unhash = password_verify($inserted_pass, $baseline_pass);

                if ($unhash == true) {
                    $this->db->delete('admin', ['id_admin' => $data['id_todo']])->row_array();
                    echo '<script>alert("Admin dengan ID : ' . $data['id_todo'] . ' telah dihapus")</script>';
                    redirect('cadmin/admin');
                } else {
                    echo '<script>alert("Password Salah !")</script>';
                    redirect('cadmin/admin');
                }
            }
        } else {
            $record_todo = [
                'id' => $_GET['id'],
                'nama_admin' => $this->admin_model->getNameAdmin($_GET['id'])
            ];
            $list_admin = [
                'admins' => $this->admin_model->getAllAdmins(),
                'record_todo' => $record_todo
            ];

            $this->load->view("vadmin/table", $list_admin);
        }
        /*
        $this->form_validation->set_rules('auth_pass', 'auth_pass', 'required');
        $this->form_validation->set_rules('id_record', 'id_record', 'required');
        $this->form_validation->set_rules('actions', 'actions', 'required');

        if ($this->form_validation->run() == false) {
            echo '<script>alert("INPUT PASSWORD, ID or ACTIONS ERROR")</script>';
            $this->load->view("vadmin/table");
        } else {
            $data = [
                'password' => $this->input->post('auth_pass'),
                'id_todo' => htmlspecialchars($this->input->post('id_record', true)),
                'actions_taken' => htmlspecialchars($this->input->post('actions', true))
            ];

            $email_sa = 'adm1@test.com';
            //$sql="SELECT`password`FROM `admin` WHERE `email`='adm1@test.com'";
            echo $data['actions_taken'];
            echo $data['id_todo'];
            $auth_sa = $this->db->get_where('admin', ['email' => $email_sa])->row_array();
            $unhash = password_verify($data['password'], $auth_sa['password']);

            //    if($unhash){
            //        if ($data['actions_taken'] == "delr") {
            //            $this->db->delete('admin', ['id_admin' => $data['id_todo']])->row_array();
            //        }
            //    }

            //    redirect('cadmin/admin');
        }*/
    }
    // ---------------------------------------------CONFIRMATION SA END--------------------------------------------- //


    // Actions pada tabel
    public function editlist()
    {
        // load view vadmin
        if ($this->input->post('delete') == "delete") {
            echo "export clicked";
            redirect('cadmin/admin');
        } else {
            $this->load->view("vadmin/form");
        }
    }
    // Registrasi NEW ADMIN
    public function regisadmin()
    {

        echo $this->input->post("password1");

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
        $this->form_validation->set_rules('alamatadmin', 'Alamat Admin', 'required|trim|max_length[120]');
        $this->form_validation->set_rules('tlpadmin', 'No. Tlp. Admin', 'required|trim|numeric|max_length[12]|min_length[12]', [
            'max_length' => 'masukan 12 digit no. tlp',
            'min_length' => 'masukan 12 digit no. tlp'
        ]);


        if ($this->form_validation->run() == false) {
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
}
