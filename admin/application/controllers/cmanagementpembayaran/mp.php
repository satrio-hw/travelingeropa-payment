<?php

class Mp extends CI_Controller
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
            redirect(site_url('admin/Login'));
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

        $this->session->set_userdata('sendto', base64_decode($_GET['e']));
        $this->session->set_userdata('idorder', base64_decode($_GET['id']));
        $this->session->set_userdata('type', $_GET['type']);
        $this->session->set_userdata('konfirmasi', 'diterima');
        redirect(site_url('cmanagementpembayaran/mailer'));
    }

    public function tolak()
    {
        $this->session->set_userdata('sendto', base64_decode($_GET['e']));
        $this->session->set_userdata('idorder', base64_decode($_GET['id']));
        $this->session->set_userdata('type', $_GET['type']);
        $this->session->set_userdata('konfirmasi', 'ditolak');
        redirect(site_url('cmanagementpembayaran/mailer'));
    }

    public function pending()
    {
        if (isset($_POST['submitreq'])) {
            $this->session->set_userdata('req', $this->input->post('req'));
            redirect(site_url('cmanagementpembayaran/mailer'));
        } else {
            $this->session->set_userdata('sendto', base64_decode($_GET['e']));
            $this->session->set_userdata('idorder', base64_decode($_GET['id']));
            $this->session->set_userdata('type', $_GET['type']);
            $this->session->set_userdata('konfirmasi', 'pending');
            $this->load->view('vmanagementpembayaran/requirement');
        }
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


            #queue upkamar
            $temp_var = ($this->session->userdata('que_upgrade_kamar'));
            array_push($temp_var, $this->input->post('upkamar'));
            $this->session->set_userdata('que_upgrade_kamar', $temp_var);
            #queue optional
            $temp_var = ($this->session->userdata('que_optional'));
            array_push($temp_var, $this->input->post('optional'));
            $this->session->set_userdata('que_optional', $temp_var);
            #queue visa
            $temp_var = ($this->session->userdata('que_visa'));
            array_push($temp_var, $this->input->post('visa'));
            $this->session->set_userdata('que_visa', $temp_var);
            #queue asuransi
            $temp_var = ($this->session->userdata('que_asuransi'));
            array_push($temp_var, $this->input->post('asuransi'));
            $this->session->set_userdata('que_asuransi', $temp_var);
            #queue simcard
            $temp_var = ($this->session->userdata('que_simcard'));
            array_push($temp_var, $this->input->post('simcard'));
            $this->session->set_userdata('que_simcard', $temp_var);
            #queue bagasipergi
            $temp_var = ($this->session->userdata('que_bagasipergi'));
            array_push($temp_var, $this->input->post('bagasipergi'));
            $this->session->set_userdata('que_bagasipergi', $temp_var);
            #queue bagasipulang
            $temp_var = ($this->session->userdata('que_bagasipulang'));
            array_push($temp_var, $this->input->post('bagasipulang'));
            $this->session->set_userdata('que_bagasipulang', $temp_var);


            $counter = $this->session->userdata('loop_input_psrta');
            $counter = $counter - 1;

            if ($counter == 0) {
                redirect('cmanagementpembayaran/mp/uploadbukti');
            } else {
                $this->session->set_userdata('loop_input_psrta', $counter);
                $this->load->view('vmanagementpembayaran/peserta_handling');
            }
        } else if (isset($_POST['submitaddform'])) {

            $filename = $this->input->post('waktu');
            $extention = array();
            $file_bukti = $_FILES['bukti']['name'];

            $counter = strlen($file_bukti);
            while ($counter >= 0 and $file_bukti[$counter - 1] != '.') {
                array_push($extention, $file_bukti[$counter - 1]);
                $counter = $counter - 1;
            }
            $ex = implode('', array_reverse($extention, true));
            if ($filename = '') {
            } else {
                $config_upload['upload_path'] = './img_bukti';
                $config_upload['allowed_types'] = 'jpg|png|jpeg|PNG|gif';
                $config_upload['max_size']     = '6000';
                $config_upload['file_name']     = strval(date('HiYmds'));
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
                        'bukti' => $config_upload['file_name'] . '.' . $ex,
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
                    
                    #input tabel pemesan (JIKA flag bukan cicilan)
                    if($this->db->get_where('pemesan', ['email' => $this->session->userdata('email_pemesan')])->result_array() == null){
                        $dataorder = [
                            'nama' => $this->session->userdata('namapj'),
                            'email' => $this->session->userdata('email_pemesan'),
                            'tanggal_lahir' => $this->session->userdata('ttl_pj'),
                            'hp' => $this->session->userdata('hp_pj')
                        ];
                        $this->db->insert('pemesan', $dataorder);    
                    }
                    
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
                            'id_order' => $idorder,

                            'upkamar' => $this->session->userdata('que_upgrade_kamar')[$i],
                            'opsional' => $this->session->userdata('que_optional')[$i],
                            'visa' => $this->session->userdata('que_visa')[$i],
                            'asuransi' => $this->session->userdata('que_asuransi')[$i],
                            'simcard' => $this->session->userdata('que_simcard')[$i],
                            'upbagasipergi' => $this->session->userdata('que_bagasipergi')[$i],
                            'upbagasipulang' => $this->session->userdata('que_bagasipulang')[$i]
                        ];
                        $this->db->insert('peserta', $datapeserta);
                    }
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role = "alert">Data pembayaran berhasil ditambah</div>');
                    redirect('cmanagementpembayaran/mp');
                }
            }


            #### from ADDPEMBAYARAN --to-- PESERTA_HANDLING ####
        } else {

            ### Handling page ADDPEMBAYARAN (Cek Email dan bayar Cicilan) ###

            ### Tombol 'Cek email'
            if (isset($_POST['cekemail'])) {
                $this->form_validation->set_rules('namapj', 'Nama Penanggung Jawab', 'required|trim');
                $this->form_validation->set_rules('pembayaran', 'Pembayaran', 'required|trim');
                $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
                $this->form_validation->set_rules('ttl_pj', 'Tanggal Lahir', 'required');
                $this->form_validation->set_rules('hp_pj', 'No Hp Penanggung Jawab', 'required|trim');
                $this->form_validation->set_rules('paket_pilihan', 'Paket Pilihan', 'required|trim');
                $this->form_validation->set_rules('jmlh_pserta', 'Jumlah Peserta', 'required|trim');
                $this->session->set_userdata('flag','cekemail');
                $flag = 'cekemail';
            }
            ### Tombol Bayar Cicilan
            if (isset($_POST['cicilan'])) {
                $this->form_validation->set_rules('namapj', 'Nama Penanggung Jawab', 'required|trim');
                $this->form_validation->set_rules('pembayaran', 'Pembayaran', 'required|trim');
                $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
                $this->form_validation->set_rules('paket_pilihan', 'Paket Pilihan', 'required|trim');
                $this->session->set_userdata('flag','cicilan');
                $flag = 'cicilan';
            }
            // input salah
            if ($this->form_validation->run() == false) {
                $datapaket = [
                    'listpaket' => $this->paket_model->getAll()
                ];
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role = "alert">Input salah, cek kembali data yang diinput</div>');
                $this->load->view('vmanagementpembayaran/addpembayaran', $datapaket);

                ### Lolos Validasi
            } else {
                $paketpilihan = $this->input->post('paket_pilihan');
                $emailpenyetor = htmlspecialchars($this->input->post('email', true));
                ### ORDER yang terdaftar atas nama email dan paket yang sama
                $stat_email = $this->db->get_where('order', ['email_pemesan' => $emailpenyetor, 'id_paket' => $paketpilihan])->result_array();

                $this->session->set_userdata('namapj', htmlspecialchars($this->input->post('namapj', true)));
                $this->session->set_userdata('email_pemesan', htmlspecialchars($this->input->post('email', true)));
                $this->session->set_userdata('tipe_bayar', $this->input->post('pembayaran'));
                $this->session->set_userdata('paketdipilih', htmlspecialchars($this->input->post('paket_pilihan', true)));
                $this->session->set_userdata('hp_pj', $this->input->post('hp_pj'));
                $this->session->set_userdata('ttl_pj', $this->input->post('ttl_pj'));

                ### init jumlah looping page add peserta
                $loop = $this->input->post('jmlh_pserta');
                $loop = intval($loop);
                $this->session->set_userdata('loop_input_psrta', $loop);
                $this->session->set_userdata('jmlh_psrta', $loop);

                ### Bila email BELUM terdaftar di table ORDER
                if ($stat_email == Null or $flag == 'cekemail') {
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

                    $this->session->set_userdata('que_upgrade_kamar', $initarray);
                    $this->session->set_userdata('que_optional', $initarray);
                    $this->session->set_userdata('que_visa', $initarray);
                    $this->session->set_userdata('que_asuransi', $initarray);
                    $this->session->set_userdata('que_simcard', $initarray);
                    $this->session->set_userdata('que_bagasipergi', $initarray);
                    $this->session->set_userdata('que_bagasipulang', $initarray);

                    #session for queue END

                    $this->load->view('vmanagementpembayaran/peserta_handling', $data);

                    ### Bila Email SUDAH terdaftar di table ORDER (bukan PJ baru)
                } else if ($stat_email == Null and $flag == 'cicilan') {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role = "alert">Tidak ditemukan data cicilan untuk email yang dimasukan</div>');
                    $datapaket = [
                        'listpaket' => $this->paket_model->getAll()
                    ];
                    $this->load->view('vmanagementpembayaran/addpembayaran', $datapaket);
                } else {
                    $idlunas = array();
                    ### Cek order yang sudah pernah dibayar
                    foreach ($stat_email as $order) {
                        $idorder = array(strval($order['id_order']));
                        $data_pembayaran = $this->pembayaran_model->getPembayaranByIDresarray($order['id_order']);
                        $list_lunas = array();
                        foreach ($data_pembayaran as $lunas) {
                            ### Array Pembayaran yang sudah dilunasi (by ID Order)
                            array_push($list_lunas, $lunas['pembayaran']);
                        }
                        ### Array ID Order yang sudah pernah dibayar (berisi Array Pembayaran yang sudah dilunasi)
                        array_push($idorder, $list_lunas);
                        ### Array Pembayaran yang sudah selesai ([idorder, [jenis pembayaran]])
                        array_push($idlunas, $idorder);
                    }
                    ### Session of array
                    $this->session->set_userdata('emailterdaftar', $idlunas);
                    $datapaket = [
                        'listpaket' => $this->paket_model->getAll()
                    ];
                    $this->load->view('vmanagementpembayaran/addpembayaran', $datapaket);
                }
            }
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
            // var_dump($cektabel);
            if ($cektabel == null) {
                $file_bukti = $_FILES['bukti']['name'];
                $extention = array();
                $file_bukti = $_FILES['bukti']['name'];

                $counter = strlen($file_bukti);
                while ($counter >= 0 and $file_bukti[$counter - 1] != '.') {
                    array_push($extention, $file_bukti[$counter - 1]);
                    $counter = $counter - 1;
                }
                $ex = implode('', array_reverse($extention, true));

                if ($filename = '') {
                } else {
                    $config_upload['upload_path'] = './img_bukti';
                    $config_upload['allowed_types'] = 'jpg|png|jpeg|PNG|gif';
                    $config_upload['max_size']     = '6000';
                    $config_upload['file_name']     = strval(date('HiYmds'));

                    $this->load->library('upload', $config_upload);

                    if (!$this->upload->do_upload('bukti')) {
                        // echo $this->upload->display_errors();
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role = "alert">Gagal Upload Gambar Bukti</div>');
                        redirect('cmanagementpembayaran/mp');
                    } else {
                        $datapembayaran = [
                            'pembayaran' => $this->input->post('pembayaran'),
                            'email' => $this->session->userdata('email_pemesan'),
                            'id_order' => $this->input->post('idorder'),
                            'waktu' => date('Y:m:d H:i:s'),
                            'bukti' => $config_upload['file_name'] . '.' . $ex,
                            'admin' => $this->session->userdata('email'),
                            'konfirmasi' => 'none'
                        ];

                        $this->db->insert('pembayaran', $datapembayaran);
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role = "alert">Data pembayaran berhasil ditambah</div>');
                        redirect('cmanagementpembayaran/mp');
                    }
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role = "alert">Jenis pembayaran serupa telah dibayarkan, cek kembali email dan jenis pembayaran</div>');
                $datapaket = [
                    'listpaket' => $this->paket_model->getAll()
                ];
                $this->load->view('vmanagementpembayaran/addpembayaran', $datapaket);
            }
        }
    }

    public function pemesan()
    {
        if ($_GET['e'] != 'table') {
            $data = ['pj' => $this->db->get_where('pemesan', ['email' => base64_decode($_GET['e'])])->result_array()];

            $this->load->view('vmanagementpembayaran/penanggungjwb', $data);
        } else {
            $data = ['pj' => $this->db->get('pemesan')->result_array()];
            $this->load->view('vmanagementpembayaran/penanggungjwb', $data);
        }
    }
    public function editpemesan()
    {
        if (isset($_POST['subpemesan'])) {
            $this->form_validation->set_rules('namapj', 'Nama Penanggung Jawab', 'required|trim');
            $this->form_validation->set_rules('hp', 'No Hp', 'required|trim');
            $this->form_validation->set_rules('ttl_pj', 'Tanggal Lahir', 'required');

            if ($this->form_validation->run() == false) {
                $data = ['pj' => $this->db->get_where('pemesan', ['email' => ($this->input->post('email'))])->result_array()];
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role = "alert">Input salah, cek kembali data yang diinput</div>');

                $this->load->view('vmanagementpembayaran/penanggungjwb', $data);
            } else {
                $data1 = [
                    'nama' => htmlspecialchars($this->input->post('namapj', true)),
                    'tanggal_lahir' => $this->input->post('ttl_pj'),
                    'hp' => $this->input->post('hp')
                ];
                $this->db->where('email', htmlspecialchars($this->input->post('email', true)));
                $this->db->update('pemesan', $data1);

                $data = ['pj' => $this->db->get_where('pemesan', ['email' => ($this->input->post('email'))])->result_array()];
                $this->session->set_flashdata('message', '<div class="alert alert-success" role = "alert">Data Penanggung jawab berhasil di Update</div>');

                $this->load->view('vmanagementpembayaran/penanggungjwb', $data);
            }
        } else {
            $data = ['pj' => $this->db->get_where('pemesan', ['email' => base64_decode($_GET['e'])])->result_array()];
            $this->load->view('vmanagementpembayaran/editpj', $data);
        }
    }
    public function topoption()
    {
        if (isset($_POST['export'])) {
            $data['pembayaran'] = $this->pembayaran_model->getAllPembayaran();
            $this->load->view('vmanagementpembayaran/export_pembayaran', $data);
        } else {
            $datapaket = [
                'listpaket' => $this->paket_model->getAll()
            ];
            $this->load->view('vmanagementpembayaran/addpembayaran', $datapaket);
        }
    }
}
