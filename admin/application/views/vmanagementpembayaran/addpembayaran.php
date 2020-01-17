<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view("admin/_partials/head.php") ?>

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
                    <?php
                    if ($this->session->userdata('emailterdaftar') != null) {
                    ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>
                                        ID Pesanan
                                    </th>
                                    <th>
                                        Pesanan Lunas
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
                                            <?= $id[0]; ?>
                                        </th>
                                        <th>
                                            <?php
                                            echo str_replace('Array', '', print_r($id[1], true));
                                            ?>
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
                    <?= $this->session->flashdata('message'); ?>

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
                                                <label>Jenis Pembayaran</label>
                                                <select class="form-control" name="pembayaran" id="pembayaran" required>
                                                    <option value="DP">DP</option>
                                                    <option value="cicilan1">Cicilan 1</option>
                                                    <option value="cicilan2">Cicilan 2</option>
                                                    <option value="cicilan3">Cicilan 3</option>
                                                    <option value="cicilan4">Cicilan 4</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Email Penanggung Jawab</label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Masukan Email" required <?php if ($this->session->userdata('emailterdaftar') != null) { ?>value=<?= $this->session->userdata('email_pemesan') ?><?php } ?> />
                                            </div>
                                            <?php if ($this->session->userdata('emailterdaftar') == null) { ?>
                                                <div class="form-group">
                                                    <label>Tanggal Lahir Penanggung Jawab</label>
                                                    <input class="form-control <?php echo form_error('ttl_pj') ? 'is-invalid' : '' ?>" type="date" name="ttl_pj" placeholder="Tanggal Lahir" required />
                                                </div>
                                                <div class="form-group">
                                                    <label for="hp">Nomor Handphone Penanggung Jawab</label>
                                                    <input class="form-control <?php echo form_error('hp_pj') ? 'is-invalid' : '' ?>" type="number" name="hp_pj" min='0' placeholder="Nomor Handphone" required />
                                                </div>
                                                <div class="form-group">
                                                    <label>List Paket</label>
                                                    <select class="form-control" name="paket_pilihan" id="paket_pilihan" required>
                                                        <?php
                                                        foreach ($listpaket as $paket) { ?>
                                                            <option value='<?= $paket->id_paket; ?>'>(<?= $paket->id_paket; ?>) <?= $paket->nama; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Jumlah peserta</label>
                                                    <input type="number" class="form-control" name="jmlh_pserta" id="jmlh_pserta" placeholder="Jumlah peserta" required />
                                                </div>
                                            <?php }
                                            ?>
                                            <?php
                                            if ($this->session->userdata('emailterdaftar') != null) {
                                            ?>
                                                <div class="form-group">
                                                    <label>ID Order</label>
                                                    <input type="text" class="form-control" name="idorder" id="idorder" placeholder="ID Order" required />
                                                </div>
                                                <div class="form-group">
                                                    <label>Upload Bukti Pembayaran ( <?= '<' ?> 5MB ):</label>
                                                    <input type="file" name='bukti'>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" name="submitcicilan" class="btn btn-primary btn-user btn-block" value="Upload Bukti" />
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="form-group">
                                                    <input type="submit" name="cekemail" class="btn btn-primary btn-user btn-block" value="Cek Email" />
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