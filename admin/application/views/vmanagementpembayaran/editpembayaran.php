<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

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
                    <?= $this->session->flashdata('message'); ?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Pembayaran</h1>
                    <!-- DataTales Example -->
                    <form method="post" action=<?= (site_url("cmanagementpembayaran/mp/editpembayaran")); ?> enctype='multipart/form-data'>
                        <div class="slider-content">
                            <!-- Inner row 1 -->
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- layer 2 -->
                                    <div class="layer-0-2 wow slideInUp">
                                        <div class="form-group">
                                            <label>Pembayaran</label>
                                            <input type="text" class="form-control" name="pembayaran" id="pembayaran" value="<?= $pembayaran ?>" placeholder="Pembayaran" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" id="email" value="<?= $email ?>" placeholder="Masukan Email" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Id_Order</label>
                                            <input type="id_order" class="form-control" name="id_order" id="id_order" value="<?= $id_order ?>" placeholder="<?= $id_order ?>" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Waktu</label>
                                            <input type="datetime-local" class="form-control" name="waktu" id="waktu" value="<?= $waktu ?>" placeholder="Tanggal" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Bukti</label>
                                            <input type="file" name='bukti' value="<?= $bukti ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="admin" value=<?= $this->session->userdata("email"); ?>>
                                            <input type="submit" name="submitedit" class="btn btn-primary btn-user btn-block" value="Bayar Sekarang" onclick="return confirm('Anda yakin untuk melakukan pembayaran?')" />
                                        </div>
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