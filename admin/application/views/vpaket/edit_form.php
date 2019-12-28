<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view("admin/_partials/head.php")  ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view("admin/_partials/sidebar.php", $id = ['sidebar' => 2]);  ?>

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

                    <form action="<?php site_url('cpaket/paket/edit') ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $paket->id_paket ?>" />

                        <div class="col">
                            <label for="nama">Nama Paket</label>
                            <input class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" type="text" value="<?= $paket->nama ?>" name="nama" placeholder="Nama" />
                            <div class="invalid-feedback">
                                <?php echo form_error('nama') ?>
                            </div>
                        </div>
                        <div class="col">
                            <label for="harga">Harga </label>
                            <input class="form-control <?php echo form_error('harga') ? 'is-invalid' : '' ?>" type="number" value="<?= $paket->harga ?>" name="harga" placeholder="Harga" />
                            <div class="invalid-feedback">
                                <?php echo form_error('harga') ?>
                            </div>
                        </div>
                        <div class="col">
                            <label for="harga_in_landtour">Harga In Landtour</label>
                            <input class="form-control <?php echo form_error('harga_in_landtour') ? 'is-invalid' : '' ?>" type="number" value="<?= $paket->harga_in_landtour ?>" name="harga_in_landtour" placeholder="Harga in landtour" />
                            <div class="invalid-feedback">
                                <?php echo form_error('harga_in_landtour') ?>
                            </div>
                        </div>
                        <div class="col">
                            <label for="upgrade_kamar">Upgrade Kamar</label>
                            <input type="number" name="upgrade_kamar" value="<?= $paket->upgrade_kamar ?>" class="form-control <?php echo form_error('upgrade_kamar') ? 'is-invalid' : '' ?>">
                            </input>
                            <div class="invalid-feedback">
                                <?php echo form_error('upgrade_kamar') ?>
                            </div>
                        </div>
                        <div class="col">
                            <label for="keterangan_tambahan">Keterangan Tambahan</label>
                            <input class="form-control <?php echo form_error('keterangan_tambahan') ? 'is-invalid' : '' ?>" type="text" value="<?= $paket->keterangan_tambahan ?>" name="keterangan_tambahan" placeholder="Keterangan Tambahan" />
                            <div class="invalid-feedback">
                                <?php echo form_error('keterangan_tambahan') ?>
                            </div>
                        </div>
                        <div class="col">
                            <label for="visa">Visa</label>
                            <input type="number" name="visa" value="<?= $paket->visa ?>" class="form-control <?php echo form_error('visa') ? 'is-invalid' : '' ?>">
                            </input>
                            <div class="invalid-feedback">
                                <?php echo form_error('visa') ?>
                            </div>
                        </div>
                        <div class="col">
                            <label for="asuransi">Asuransi</label>
                            <input type="number" name="asuransi" value="<?= $paket->asuransi ?>" class="form-control <?php echo form_error('asuransi') ? 'is-invalid' : '' ?>">
                            </input>
                            <div class="invalid-feedback">
                                <?php echo form_error('asuransi') ?>
                            </div>
                        </div>
                        <div class="col">
                            <label for="simcard">Simcard</label>
                            <input type="number" name="simcard" value="<?= $paket->simcard ?>" class="form-control <?php echo form_error('simcard') ? 'is-invalid' : '' ?>">
                            </input>
                            <div class="invalid-feedback">
                                <?php echo form_error('simcard') ?>
                            </div>
                        </div>
                        <div class="col">
                            <label for="upgrade_bagasi">Upgrade Bagasi</label>
                            <input type="number" name="upgrade_bagasi" value="<?= $paket->upgrade_bagasi ?>" class="form-control <?php echo form_error('upgrade_bagasi') ? 'is-invalid' : '' ?>">
                            </input>
                            <div class="invalid-feedback">
                                <?php echo form_error('upgrade bagasi') ?>
                            </div>
                        </div>
                        <br>
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->

    <?php $this->load->view("admin/_partials/js.php")  ?>

</body>

</html>