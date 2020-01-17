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
                    <h1 class="h3 mb-2 text-gray-800">Input Peserta</h1>


                    <!-- DataTales Example -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">Summary</h1>
                        <form action="<?= base_url("cmanagementpembayaran/mp/addpembayaran") ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <tr>
                                        <th> Email Pemesan :
                                        </th>
                                        <th> <?= $this->session->userdata('email_pemesan') ?>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th> Pembayaran :
                                        </th>
                                        <th> <?= $this->session->userdata('tipe_bayar') ?>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th> untuk paket :
                                        </th>
                                        <th> (<?= $id_paket; ?>) <?= $nama; ?>
                                        </th>
                                    </tr>
                                </table>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Email Peserta</th>
                                            <th>Nama</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Nomor Passport</th>
                                            <th>Expired Passport</th>
                                            <th>Status Tiket</th>
                                            <th>Nomor Hanphone</th>
                                            <th>Domisili</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($i = 0; $i < intval($this->session->userdata('jmlh_psrta')); $i++) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <?= strval($this->session->userdata('que_email_peserta')[$i]); ?>
                                                </td>
                                                <td>
                                                    <?= strval($this->session->userdata('que_nama_peserta')[$i]); ?>
                                                </td>
                                                <td>
                                                    <?= strval($this->session->userdata('que_ttl_peserta')[$i]); ?>
                                                </td>
                                                <td>
                                                    <?= strval($this->session->userdata('que_nopass_peserta')[$i]); ?>
                                                </td>
                                                <td>
                                                    <?= strval($this->session->userdata('que_exppass_peserta')[$i]); ?>
                                                </td>
                                                <td>
                                                    <?= strval($this->session->userdata('que_tiket_peserta')[$i]); ?>
                                                </td>
                                                <td>
                                                    <?= strval($this->session->userdata('que_nohp_peserta')[$i]); ?>
                                                </td>
                                                <td>
                                                    <?= strval($this->session->userdata('que_domisili_peserta')[$i]); ?>
                                                </td>
                                            </tr>
                                        <?php
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group">
                                <label>Upload Bukti Pembayaran ( <?= '<' ?> 5MB ):</label>
                                <input type="file" name='bukti'>

                            </div>
                            <div class="form-group">
                                <input type="submit" name="submitaddform" class="btn btn-primary btn-user btn-block" value="Konfirmasi Pembayaran" onclick="return confirm('Konfirmasi pesanan ini?')" />
                            </div>
                        </form>

                    </div>
                    <!-- /.container-fluid -->

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