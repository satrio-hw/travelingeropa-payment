<?php
class ccicilan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("cicilan_model");
        $this->load->library('form_validation');
    }
    public function index()
    {
        
        // jika form login disubmit
        
        // tampilkan halaman login
        echo "hai";
        $this->load->view("cicilan.php");
    }
    public function addpembayaran()
    {
        #### from PESERTA_HANDLING --to-- other PESERTA_HANDLING ####

        if (isset($_POST['submitdetail'])) {
            #queue EMAIL
            $temp_var = ($this->session->userdata('que_email_peserta'));
            array_push($temp_var, $this->input->post('email_peserta'));
            $this->session->set_userdata('que_email_peserta', $temp_var);
            #queue NAMA
            $temp_var = ($this->session->userdata('que_nama_peserta'));
            array_push($temp_var, $this->input->post('nama'));
            $this->session->set_userdata('que_nama_peserta', $temp_var);
            #queue TGLLAHIR
            $temp_var = ($this->session->userdata('que_ttl_peserta'));
            array_push($temp_var, $this->input->post('tanggal_lahir'));
            $this->session->set_userdata('que_ttl_peserta', $temp_var);
            #queue NOPASS
            $temp_var = ($this->session->userdata('que_nopass_peserta'));
            array_push($temp_var, $this->input->post('no_passport'));
            $this->session->set_userdata('que_nopass_peserta', $temp_var);
            #queue EXPPASS
            $temp_var = ($this->session->userdata('que_exppass_peserta'));
            array_push($temp_var, $this->input->post('exp_passport'));
            $this->session->set_userdata('que_exppass_peserta', $temp_var);
            #queue TIKET
            $temp_var = ($this->session->userdata('que_tiket_peserta'));
            array_push($temp_var, $this->input->post('status_tiket'));
            $this->session->set_userdata('que_tiket_peserta', $temp_var);
            #queue NOHP
            $temp_var = ($this->session->userdata('que_nohp_peserta'));
            array_push($temp_var, $this->input->post('hp'));
            $this->session->set_userdata('que_nohp_peserta', $temp_var);
            #queue DOMISILI
            $temp_var = ($this->session->userdata('que_domisili_peserta'));
            array_push($temp_var, $this->input->post('domisili'));
            $this->session->set_userdata('que_domisili_peserta', $temp_var);

            $counter = $this->session->userdata('loop_input_psrta');
            $counter = $counter - 1;

            if ($counter == 0) {
                redirect('cmanagementpembayaran/mp/uploadbukti');
            } else {
                $this->session->set_userdata('loop_input_psrta', $counter);
                $this->load->view('vmanagementpembayaran/peserta_handling');
            }
        }

        #### from ADDPEMBAYARAN --to-- PESERTA_HANDLING ####

        else if (isset($_POST['cekemail'])) {
            $this->session->userdata('email');
            $this->form_validation->set_rules('paket', 'Paket', 'required|trim');
            $this->form_validation->set_rules('jumlah_peserta', 'Jumlah Peserta', 'required|trim');

            // input salah
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role = "alert">Input salah, cek kembali data yang diinput</div>');
                $this->load->view('dp');
            } else {
                $paket = $this->input->post('paket');
                $stat_email = $this->db->get_where('order', ['email' => $email, 'id_paket' => $paket])->result_array();
                // $stat_email = ($this->pembayaran_model->getPembayaranByEmail(($this->input->post('email', true))));
                if ($stat_email == Null) {
                    $data = [
                        'pembayaran' => $this->input->post('pembayaran'),
                        'email' => htmlspecialchars($this->input->post('email', true)),
                        'paket' => htmlspecialchars($this->input->post('paket_pilihan', true))
                    ];

                    $loop = $this->input->post('jmlh_pserta');
                    $loop = intval($loop);
                    $this->session->set_userdata('loop_input_psrta', $loop);
                    $this->session->set_userdata('jmlh_psrta', $loop);
                    $this->session->set_userdata('email_pemesan', htmlspecialchars($this->input->post('email', true)));
                    $this->session->set_userdata('tipe_bayar', $this->input->post('pembayaran'));
                    $this->session->set_userdata('paketdipilih', htmlspecialchars($this->input->post('paket_pilihan', true)));
                    $this->session->set_userdata('hp_pj', $this->input->post('hp_pj'));
                    $this->session->set_userdata('ttl_pj', $this->input->post('ttl_pj'));

                    #session for queue START
                    $initarray = array();
                    $this->session->set_userdata('que_email_peserta', $initarray);
                    $this->session->set_userdata('que_nama_peserta', $initarray);
                    $this->session->set_userdata('que_ttl_peserta', $initarray);
                    $this->session->set_userdata('que_nopass_peserta', $initarray);
                    $this->session->set_userdata('que_exppass_peserta', $initarray);
                    $this->session->set_userdata('que_tiket_peserta', $initarray);
                    $this->session->set_userdata('que_nohp_peserta', $initarray);
                    $this->session->set_userdata('que_domisili_peserta', $initarray);
                    #var_dump($this->session->userdata('loop_input_psrta'));
                    #session for queue END

                    $this->load->view('peserta', $data);
                } else {
                    echo 'sudah ada email terdaftar';
                    var_dump($stat_email);

                    $id_order_exist = $stat_email[1]['id_order'];
                    echo $id_order_exist;
                    $data_pembayaran = $this->pembayaran_model->getPembayaranByID($id_order_exist);
                    #var_dump($data_pembayaran);
                    //if ($data_pembayaran == null) {
                    //     echo 'aman';
                    //     echo $cekpembayaran;
                    //     echo $stat_email;
                    //     #redirect('cmanagementpembayaran/mp');
                    // } else {
                    //     var_dump($cekpembayaran);
                    //     // $this->session->set_flashdata('message', '<div class="alert alert-danger" role = "alert">Pembayaran ' . $tipepembayaran . ' sudah dilakukan</div>');
                    //     // $datapaket = [
                    //     //     'listpaket' => $this->paket_model->getAll()
                    //     // ];
                    //     // $this->load->view('vmanagementpembayaran/addpembayaran', $datapaket);
                    // }
                }
            }
        }

        ### submit to DB ###

        elseif (isset($_POST['submitaddform'])) {
            $filename = $this->input->post('waktu');
            $file_bukti = $_FILES['bukti']['name'];

            if ($filename = '') {
            } else {
                $config_upload['upload_path'] = './img_bukti';
                $config_upload['allowed_types'] = 'jpg|png|jpeg|PNG|gif';
                $config_upload['max_size']     = '1024';
                // $config['max_width'] 	= '1024';
                // $config['max_height'] 	= '768';

                $this->load->library('upload', $config_upload);

                if (!$this->upload->do_upload('bukti')) {
                    echo $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role = "alert">Gagal Upload Gambar Bukti</div>');
                    redirect('cmanagementpembayaran/mp');
                } else {

                    $idorder = date('YmdHisu');
                    ### input tabel pembayaran ##
                    $datapembayaran = [
                        'pembayaran' => $this->session->userdata('tipe_bayar'),
                        'email' => $this->session->userdata('email_pemesan'),
                        'id_order' => $idorder,
                        'waktu' => date('Y:m:d H:i:s'),
                        'bukti' => $file_bukti,
                        'admin' => $this->session->userdata('email'),
                        'konfirmasi' => 'none'
                    ];
                    $this->db->insert('pembayaran', $datapembayaran);
                    #input tabel order
                    $dataorder = [
                        'id_order' => $idorder,
                        'id_paket' => $this->session->userdata('paketdipilih'),
                        'email_pemesan' => $this->session->userdata('email_pemesan')
                    ];
                    $this->db->insert('order', $dataorder);
                    #input tabel pemesan
                    $dataorder = [
                        'email' => $this->session->userdata('email_pemesan'),
                        'tanggal_lahir' => $this->session->userdata('ttl_pj'),
                        'hp' => $this->session->userdata('hp_pj')
                    ];
                    $this->db->insert('pemesan', $dataorder);
                    #input tabel peserta
                    for ($i = 0; $i < intval($this->session->userdata('jmlh_psrta')); $i++) {
                        $datapeserta = [
                            'id_peserta' => uniqid(),
                            'email_peserta' => $this->session->userdata('que_email_peserta')[$i],
                            'nama' => $this->session->userdata('que_nama_peserta')[$i],
                            'tanggal_lahir' => $this->session->userdata('que_ttl_peserta')[$i],
                            'no_passport' => $this->session->userdata('que_nopass_peserta')[$i],
                            'exp_passport' => $this->session->userdata('que_exppass_peserta')[$i],
                            'status_tiket' => $this->session->userdata('que_tiket_peserta')[$i],
                            'hp' => $this->session->userdata('que_nohp_peserta')[$i],
                            'domisili' => $this->session->userdata('que_domisili_peserta')[$i]
                        ];
                        $this->db->insert('peserta', $datapeserta);
                    }
                    $this->session->set_flashdata('success', 'Berhasil disimpan');
                    echo 'selesai mameeen';
                    // $this->load->view('vmanagementpembayaran/vmp');
                    // echo $this->upload->display_errors();
                    // echo $config_upload['upload_path'];
                    // echo validation_errors();
                    #redirect('cmanagementpembayaran/mp');
                    #echo 'hai2';

                }
            }
        } else {
            $datapaket = [
                'listpaket' => $this->paket_model->getAll()
            ];
            $this->load->view('vmanagementpembayaran/addpembayaran', $datapaket);
        }
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