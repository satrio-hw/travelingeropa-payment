<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view("admin/_partials/head.php")  ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view("admin/_partials/sidebar.php")  ?>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view("admin/_partials/navbar.php")  ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Konfigurasi Password: <?= $email; ?></h1> <?= $this->session->flashdata('message'); ?>
                    <?php
                                                                                                if ($this->session->userdata('role') == 'spadm') : ?>
                        <form method="POST" action=<?= base_url("cadmin/admin/change_pass") ?>>
                            <div align="right">
                                <input type="submit" name="reset_admin" class="btn btn-danger btn-user btn-sm" value="Reset password as Super Admin" />
                            </div>
                    <?php endif; ?>
                    <!-- DataTales Example -->
                        <div class="slider-content">
                            <!-- Inner row 1 -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><b>Password Lama</b></label>
                                        <input type="password" class="form-control" name="passwordold" id="passwordold" placeholder="Masukan Password Lama" />
                                        <?= form_error('password0', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label><b>Password Baru</b></label>
                                        <input type="password" class="form-control" name="password1" id="password1" placeholder="Masukan Password" required/>
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label><b>Konfirmasi Password Baru</b></label>
                                        <input type="password" class="form-control" name="password2" id="password2" placeholder="Ketikan password kembali" required/>
                                        <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="email_record" value="<?= $email ?>" />
                                        <input type="submit" name="submit1" class="btn btn-primary btn-user" value="Ubah Password" />
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->

    <?php $this->load->view("admin/_partials/js.php")  ?>

</body>

</html>