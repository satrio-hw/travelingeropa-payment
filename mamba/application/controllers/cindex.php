<?php
class cindex extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("index_model");
        $this->load->library('form_validation');
    }
    public function index()
    {
        
        // jika form login disubmit
        
        // tampilkan halaman login
        $this->load->view("index.php");
    }
    public function cekemail(){
        echo 'ini fungsi cek email';      
        if ($this->input->post('email')!=NULL) {
            $this->session->set_userdata('email',$this->input->post('email'));
            $input_email = $this->session->userdata('email');
            if ($this->index_model->getPemesanByEmail($input_email)!=null) {
                $this->session->userdata('email');
                redirect(base_url('cdp'));
            }else{
                echo "email gak ada, daftar cuy";
            }
        }
    }
    public function addpj()
    {
        if(isset($_POST['submitcuy'])){
            $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
            $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
            $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');
            $this->form_validation->set_rules('hp', 'No. HP', 'required|trim');
            

            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role = "alert">Input salah, cek kembali data yang diinput</div>');
                echo "salah woy";
                #$this->load->view('addpj');
            } else {
                $data = [
                    'nama' => $this->input->post('nama'),
                    'email' => htmlspecialchars($this->input->post('email', true)),
                    'tanggal_lahir' =>$this->input->post('tanggal_lahir'),
                    'hp' => $this->input->post('hp'),
                    ];
                // var_dump($data);
                $this->db->insert('pemesan', $data);
                $this->session->set_flashdata('success', 'Berhasil disimpan');
                //$this->load->view('addpj');
                if ($this->input->post('email')!=NULL) {
                    $this->session->set_userdata('email',$this->input->post('email'));
                    $input_email = $this->session->userdata('email');
                    if ($this->index_model->getPemesanByEmail($input_email)!=null) {
                        $this->session->userdata('email');
                        redirect(base_url('cdp'));
                    }else{
                        echo "email gak ada, daftar cuy";
                    }
                }
            }
        }else{
            $this->load->view('addpj');
        }
        
    }
}