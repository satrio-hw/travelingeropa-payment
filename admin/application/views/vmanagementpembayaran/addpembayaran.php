<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view("admin/_partials/head.php") ?>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 10pt;
        }

        th,
        td {
            padding: 5px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #c9d7f2;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view("admin/_partials/sidebar.php", $id = ['sidebar' => '1']);   ?>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view("admin/_partials/navbar.php");  ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Pembayaran</h1>
                    <?= $this->session->flashdata('message'); ?>
                    <?php
                    if ($this->session->userdata('emailterdaftar') != null) {
                    ?>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead bgcolor="#4655f2">
                                <tr>
                                    <th>
                                        <font color="white">ID Pesanan</font>
                                    </th>
                                    <th>
                                        <font color="white">Paket</font>
                                    </th>
                                    <th>
                                        <font color="white"> Pesanan Lunas</font>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $list_lunas = $this->session->userdata('emailterdaftar');
                                foreach ($list_lunas as $id) {
                                ?>
                                    <tr>
                                        <th>
                                            <font color=black><?= $id[0]; ?></font>
                                        </th>
                                        <th>
                                            <font color=black>
                                                <?php
                                                $email = $this->session->userdata('email_pemesan');
                                                $paket = $this->db->get_where('order', ['id_order' => $id[0], 'email_pemesan' => $email])->row_array();
                                                $namapaket = $this->db->get_where('paket', ['id_paket' => $paket['id_paket']])->row_array();
                                                echo '(' . $paket['id_paket'] . ') ' . $namapaket['nama'];
                                                ?></font>
                                        </th>
                                        <th>
                                            <font color='black'>
                                                <?php
                                                echo str_replace('Array', '', print_r($id[1], true));
                                                ?>
                                            </font>
                                        </th>

                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php
                    }

                    ?>
                    <!-- DataTales Example -->
                    <?php if ($this->session->userdata('emailterdaftar') != null) { ?>
                        <form method="post" action=<?= base_url("cmanagementpembayaran/mp/cicilan") ?> enctype='multipart/form-data'>
                        <?php } else { ?>
                            <form method="post" action=<?= base_url("cmanagementpembayaran/mp/addpembayaran") ?> enctype='multipart/form-data'>
                            <?php } ?>
                            <div class="slider-content">
                                <!-- Inner row 1 -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- layer 2 -->
                                        <div class="layer-0-2 wow slideInUp">
                                            <div class="form-group">
                                                <label><b>Jenis Pembayaran</b></label>
                                                <select class="form-control" name="pembayaran" id="pembayaran" required>
                                                    <option value="DP">DP</option>
                                                    <option value="cicilan1">Cicilan 1</option>
                                                    <option value="cicilan2">Cicilan 2</option>
                                                    <option value="cicilan3">Cicilan 3</option>
                                                    <option value="cicilan4">Cicilan 4</option>
                                                    <option value="pelunasan">Pelunasan</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label><b>Nama Penanggung Jawab</b> <sub> *isi bagian ini saja untuk pembayaran cicilan</sub></label>
                                                <input type="text" class="form-control" name="namapj" id="namapj" placeholder="Masukan Nama Penanggungjawab" />
                                                <?= form_error('namapj', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <div class="form-group">
                                                <label><b>Email Penanggung Jawab</b><sub> *isi bagian ini saja untuk pembayaran cicilan</sub></label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Masukan Email" <?php if ($this->session->userdata('emailterdaftar') != null) { ?>value=<?= $this->session->userdata('email_pemesan') ?><?php } ?> />
                                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <!-- Jika Email Belum pernah melakukan pembayaran sebelumnya : -->
                                            <?php if ($this->session->userdata('emailterdaftar') == null) { ?>
                                                <div class="form-group">
                                                    <label><b>Tanggal Lahir Penanggung Jawab</b></label>
                                                    <input class="form-control <?php echo form_error('ttl_pj') ? 'is-invalid' : '' ?>" type="date" name="ttl_pj" placeholder="Tanggal Lahir" />
                                                    <?= form_error('ttl_pj', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="hp"><b>Nomor Handphone Penanggung Jawab</b></label>
                                                    <input class="form-control <?php echo form_error('hp_pj') ? 'is-invalid' : '' ?>" type="number" name="hp_pj" min='0' placeholder="Nomor Handphone" />
                                                    <?= form_error('hp_pj', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label><b>List Paket</b></label>
                                                    <select class="form-control" name="paket_pilihan" id="paket_pilihan">
                                                        <?php
                                                        foreach ($listpaket as $paket) { ?>
                                                            <option value='<?= $paket->id_paket; ?>'>(<?= $paket->id_paket; ?>) <?= $paket->nama; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <?= form_error('paket_pilihan', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Jumlah peserta</b></label>
                                                    <input type="number" min=1 class="form-control" name="jmlh_pserta" id="jmlh_pserta" placeholder="Jumlah peserta" />
                                                    <?= form_error('jmlh_pserta', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" name="cekemail" class="btn btn-primary btn-user btn-block" value="Cek Email" />
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" name="cicilan" class="btn btn-primary btn-user btn-block" value="Bayar Cicilan" />
                                                </div>
                                            <?php }
                                            ## JIka Email yang dimasukan sudah pernah melakukan pembayaran maka tampilkan: START-->
                                            else {
                                            ?>
                                                <div class="form-group">
                                                    <label><b>ID Order</b></label>
                                                    <input type="text" class="form-control" name="idorder" id="idorder" placeholder="ID Order" />
                                                    <?= form_error('idorder', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Upload Bukti Pembayaran ( <?= '<' ?> 5MB ):</b></label>
                                                    <input type="file" name='bukti'>
                                                    <?= form_error('bukti', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" name="submitcicilan" class="btn btn-primary btn-user btn-block" value="Upload Bukti" />
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php $this->load->view("admin/_partials/footer.php")  ?>

            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href=<?= base_url('admin/Login/logout'); ?>>Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->

    <?php $this->load->view("admin/_partials/js.php")  ?>

</body>

</html>