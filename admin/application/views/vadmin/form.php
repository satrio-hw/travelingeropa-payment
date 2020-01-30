<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <?php $this->load->view("admin/_partials/head.php");  ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view("admin/_partials/sidebar.php", $id = ['sidebar' => 4]);  ?>

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
                    <h1 class="h3 mb-2 text-gray-800">Pendaftaran Admin</h1>
                    <!-- DataTales Example -->
                    <form method="post" action=<?= site_url("cadmin/admin/regisadmin") ?>>
                        <div class="slider-content">
                            <!-- Inner row 1 -->
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- layer 2 -->
                                    <div class="layer-0-2 wow slideInUp">
                                        <div class="form-group">
                                            <label><b>Nama</b></label>
                                            <input type="text" class="form-control" name="namaadmin" id="namaadmin" placeholder="Masukan Nama Admin" required />
                                            <?= form_error('namaadmin', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label><b>Email</b></label>
                                            <input type="email" class="form-control" name="emailadmin" id="emailadmin" placeholder="Masukan Email Admin" required />
                                            <?= form_error('emailadmin', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label><b>Alamat</b></label>
                                            <input type="alamat" class="form-control" name="alamatadmin" id="alamatadmin" maxlength=120 placeholder="Masukan Alamat Admin" required />
                                        </div>
                                        <div class="form-group">
                                            <label><b>No. Telp</b></label>
                                            <input type="tel" data-rule-mobileUK="true" class="form-control" name="tlpadmin" id="tlpadmin" maxlength=12 minlength=12 placeholder="Masukan no. tlp admin" required />
                                            <?= form_error('tlpadmin', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label><b>Role</b></label>
                                            <select class="form-control" name="role" id="role" required>
                                                <option value="adm">Admin</option>
                                                <option value="spadm">Super Admin</option>
                                                <option value="mailer">Mailer</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><b>Password</b></label>
                                        <input type="password" class="form-control" name="password1" id="password1" placeholder="Masukan Password" required />
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label><b>Konfirmasi Password</b></label>
                                        <input type="password" class="form-control" name="password2" id="password2" placeholder="Ketikan password kembali" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Daftar Sekarang" />
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
                    <a class="btn btn-primary" href=<?= site_url('admin/Login/logout'); ?>>Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->

    <?php $this->load->view("admin/_partials/js.php")  ?>

</body>

</html>