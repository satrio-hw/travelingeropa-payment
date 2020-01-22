<?php

class mp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pembayaran_model');
        $this->load->model('paket_model');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));

        if ($this->session->userdata('email') == false || $this->session->userdata('role') == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">AKSES DITOLAK !!! Silahkan masukan email dan password yang terdaftar</div>');
            redirect(base_url('admin/Login'));
        }
    }

    public function index()
    {
        $sessionData = $this->session->all_userdata();
        foreach ($sessionData as $key => $val) {
            if (
                $key != 'email'
                && $key != 'role'
            ) {
                $this->session->unset_userdata($key);
            }
        }
        // load view vmanagementpembayaran/vmp.php
        $data['pembayaran'] = $this->pembayaran_model->getAllPembayaran();
        $this->load->view("vmanagementpembayaran/vmp", $data);
    }

    public function konfirmasi()
    {
        $data = ['konfirmasi' => 'confirmed'];
        $this->db->where('email', base64_decode($_GET['e']));
        $this->db->update('pembayaran', $data);

        $this->session->set_userdata('sendto', base64_decode($_GET['e']));
        $this->session->set_userdata('idorder', base64_decode($_GET['id']));
        $this->session->set_userdata('type', $_GET['type']);
        $this->session->set_userdata('konfirmasi', 'diterima');
        redirect(base_url('cmanagementpembayaran/mailer'));
    }

    public function tolak()
    {
        $data = ['konfirmasi' => 'REJECTED'];
        $this->db->where('email', base64_decode($_GET['e']));
        $this->db->update('pembayaran', $data);

        $this->session->set_userdata('sendto', base64_decode($_GET['e']));
        $this->session->set_userdata('idorder', base64_decode($_GET['id']));
        $this->session->set_userdata('type', $_GET['type']);
        $this->session->set_userdata('konfirmasi', 'ditolak');
        redirect(base_url('cmanagementpembayaran/mailer'));
    }

    public function uploadbukti()
    {
        $paket = $this->paket_model->getById($this->session->userdata('paketdipilih'));
        $this->load->view('vmanagementpembayaran/uploadbukti', $paket);
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
            $this->form_validation->set_rules('pembayaran', 'Status Pembayaran', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
            $this->form_validation->set_rules('paket_pilihan', 'Paket Pilihan', 'required|trim');
            $this->form_validation->set_rules('jmlh_pserta', 'Jumlah Peserta', 'required|trim');

            // input salah
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role = "alert">Input salah, cek kembali data yang diinput</div>');
                $this->load->view('vmanagementpembayaran/addpembayaran');
            } else {
                $paketpilihan = $this->input->post('paket_pilihan');
                $emailpenyetor = htmlspecialchars($this->input->post('email', true));

                $stat_email = $this->db->get_where('order', ['email_pemesan' => $emailpenyetor, 'id_paket' => $paketpilihan])->result_array();

                $this->session->set_userdata('email_pemesan', htmlspecialchars($this->input->post('email', true)));
                $this->session->set_userdata('tipe_bayar', $this->input->post('pembayaran'));
                $this->session->set_userdata('paketdipilih', htmlspecialchars($this->input->post('paket_pilihan', true)));
                $this->session->set_userdata('hp_pj', $this->input->post('hp_pj'));
                $this->session->set_userdata('ttl_pj', $this->input->post('ttl_pj'));

                $loop = $this->input->post('jmlh_pserta');
                $loop = intval($loop);
                $this->session->set_userdata('loop_input_psrta', $loop);
                $this->session->set_userdata('jmlh_psrta', $loop);
                // $stat_email = ($this->pembayaran_model->getPembayaranByEmail(($this->input->post('email', true))));
                if ($stat_email == Null) {
                    $data = [
                        'pembayaran' => $this->input->post('pembayaran'),
                        'email' => htmlspecialchars($this->input->post('email', true)),
                        'paket' => htmlspecialchars($this->input->post('paket_pilihan', true))
                    ];
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

                    $this->load->view('vmanagementpembayaran/peserta_handling', $data);
                } else {
                    // echo 'sudah ada email terdaftar';
                    // var_dump($stat_email);
                    // echo '<br>';

                    $idlunas = array();
                    foreach ($stat_email as $order) {
                        // echo '<br>';
                        // echo '<br>';
                        // echo 'ID ORDER : ' . $order['id_order'];
                        // echo '<br>';
                        $idorder = array(strval($order['id_order']));
                        // echo $idorder;
                        $data_pembayaran = $this->pembayaran_model->getPembayaranByIDresarray($order['id_order']);
                        // echo '<br>';
                        // echo '<br>';
                        #var_dump($data_pembayaran);
                        #array_push($idlunas, $idorder);
                        #print_r($idlunas);
                        $list_lunas = array();
                        foreach ($data_pembayaran as $lunas) {
                            // echo '<br>LUNAS : ';
                            // var_dump($lunas);
                            array_push($list_lunas, $lunas['pembayaran']);
                            // echo '<br>';
                        }
                        array_push($idorder, $list_lunas);
                        #var_dump($idorder);
                        array_push($idlunas, $idorder);
                    }
                    // #var_dump($idlunas);
                    // var_dump($idlunas[0][1]);
                    // echo '<br>';
                    // var_dump($idlunas[1][1]);
                    // echo count($idlunas);

                    $this->session->set_userdata('emailterdaftar', $idlunas);

                    $datapaket = [
                        'listpaket' => $this->paket_model->getAll()
                    ];
                    $this->load->view('vmanagementpembayaran/addpembayaran', $datapaket);
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
                $config_upload['max_size']     = '6000';
                // $config['max_width'] 	= '1024';
                // $config['max_height'] 	= '768';

                $this->load->library('upload', $config_upload);

                if (!$this->upload->do_upload('bukti')) {
                    // echo $this->upload->display_errors();
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
                            'domisili' => $this->session->userdata('que_domisili_peserta')[$i],
                            'id_order' => $idorder
                        ];
                        $this->db->insert('peserta', $datapeserta);
                    }
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role = "alert">Data pembayaran berhasil ditambah</div>');
                    redirect('cmanagementpembayaran/mp');
                }
            }
        } else {
            $datapaket = [
                'listpaket' => $this->paket_model->getAll()
            ];
            $this->load->view('vmanagementpembayaran/addpembayaran', $datapaket);
        }
    }

    public function cicilan()
    {
        // var_dump($this->session->userdata());
        $this->form_validation->set_rules('pembayaran', 'Status Pembayaran', 'required|trim');
        $this->form_validation->set_rules('idorder', 'idorder', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role = "alert">Input salah, cek kembali data yang diinput</div>');
            $this->load->view('vmanagementpembayaran/addpembayaran');
        } else {

            $cektabel = $this->db->get_where('pembayaran', ['pembayaran' => $this->input->post('pembayaran'), 'id_order' => $this->input->post('idorder')])->result_array();
            var_dump($cektabel);
            if ($cektabel == null) {
                $file_bukti = $_FILES['bukti']['name'];

                if ($filename = '') {
                } else {
                    $config_upload['upload_path'] = './img_bukti';
                    $config_upload['allowed_types'] = 'jpg|png|jpeg|PNG|gif';
                    $config_upload['max_size']     = '6000';
                    // $config['max_width'] 	= '1024';
                    // $config['max_height'] 	= '768';

                    $this->load->library('upload', $config_upload);

                    $datapembayaran = [
                        'pembayaran' => $this->input->post('pembayaran'),
                        'email' => $this->session->userdata('email_pemesan'),
                        'id_order' => $this->input->post('idorder'),
                        'waktu' => date('Y:m:d H:i:s'),
                        'bukti' => $file_bukti,
                        'admin' => $this->session->userdata('email'),
                        'konfirmasi' => 'none'
                    ];

                    $this->db->insert('pembayaran', $datapembayaran);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role = "alert">Data pembayaran berhasil ditambah</div>');
                    redirect('cmanagementpembayaran/mp');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role = "alert">Cek kembali email dan jenis pembayaran</div>');
                $datapaket = [
                    'listpaket' => $this->paket_model->getAll()
                ];
                $this->load->view('vmanagementpembayaran/addpembayaran', $datapaket);
            }
        }
    }
    public function export_pembayaran()
    {
        $data['pembayaran'] = $this->pembayaran_model->getAllPembayaran();
        $this->load->view('vmanagementpembayaran/export_pembayaran', $data);
    }
}
