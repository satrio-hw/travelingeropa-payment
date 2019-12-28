<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view("admin/_partials/head.php");  ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view("admin/_partials/sidebar.php", $id = ['sidebar' => 3]);  ?>

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
                    <h1 class="h3 mb-2 text-gray-800">Edit Data</h1>

                    <form action="<?php base_url('cpeserta/peserta/edit') ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $peserta->id_peserta ?>" />

                        <div class="row">
                            <div class="col">
                                <label for="email_peserta">Email Peserta</label>
                                <input class="form-control <?php echo form_error('email_peserta') ? 'is-invalid' : '' ?>" value="<?php echo $peserta->email_peserta ?>" type="text" name="email_peserta" placeholder="Email Peserta" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('email_peserta') ?>
                                </div>
                            </div>
                            <div class="col">
                                <label for="nama">Nama Peserta</label>
                                <input class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" value="<?php echo $peserta->nama ?>" type="text" name="nama" placeholder="Nama Peserta" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('nama') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input class="form-control <?php echo form_error('tanggal_lahir') ? 'is-invalid' : '' ?>" value="<?php echo $peserta->tanggal_lahir ?>" type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('tanggal_lahir') ?>
                                </div>
                            </div>
                            <div class="col">
                                <label for="no_passport">Nomor Passport</label>
                                <input class="form-control <?php echo form_error('no_passport') ? 'is-invalid' : '' ?>" value="<?php echo $peserta->no_passport ?>" type="number" name="no_passport" placeholder="Nomor Passport" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('no_passport') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="exp_passport">Expired Passport</label>
                                <input class="form-control <?php echo form_error('exp_passport') ? 'is-invalid' : '' ?>" value="<?php echo $peserta->exp_passport ?>" type="date" name="exp_passport" placeholder="Expired Passport" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('exp_passport') ?>
                                </div>
                            </div>
                            <div class="col">
                                <label for="status_tiket">Status Tiket*</label>
                                <select name="status_tiket" class="form-control <?php echo form_error('status_tiket') ? 'is-invalid' : '' ?>" value="<?php echo $peserta->status_tiket ?>">
                                    <option value="">--Pilih--</option>
                                    <option value="Status Tiket">Status Tiket</option>
                                    <option value="Include">Include</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?php echo form_error('status_tiket') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="hp">Nomor Handphone</label>
                                <input class="form-control <?php echo form_error('hp') ? 'is-invalid' : '' ?>" value="<?php echo $peserta->hp ?>" type="number" name="hp" placeholder="Nomor Handphone" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('hp') ?>
                                </div>
                            </div>
                            <div class="col">
                                <label for="domisili">Domisili</label>
                                <input class="form-control <?php echo form_error('domisili') ? 'is-invalid' : '' ?>" value="<?php echo $peserta->domisili ?>" type="text" name="domisili" placeholder="Domisili" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('domisili') ?>
                                </div>
                            </div>
                        </div><br>
                        <input class="btn btn-primary" type="submit" name="btn" value="Save" />
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