<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view("admin/_partials/head.php") ?>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            font-size-adjust: inherit;
        }

        th,
        td {
            padding: 8px;
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
                    <h1 class="h3 mb-2 text-gray-800">Penanggung Jawab</h1>
                    <form method="post" action=<?= base_url("cmanagementpembayaran/mp/editpemesan") ?> enctype='multipart/form-data'>
                        <a href="<?= base_url('cmanagementpembayaran/mp/pemesan'); ?>?e=table"><i class="fas fa-list"></i>Lihat Semua Penanggung Jawab</a>
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead bgcolor="#4655f2">
                                <tr>
                                    <th>
                                        <font color="white">Email PJ</font>
                                    </th>
                                    <th>
                                        <font color="white">Nama PJ</font>
                                    </th>
                                    <th>
                                        <font color="white">No. Hp</font>
                                    </th>
                                    <th>
                                        <font color="white">Tanggal Lahir</font>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($pj as $PJ) { ?>
                                    <tr>
                                        <th>
                                            <?php echo  $PJ['email']; ?>
                                        </th>

                                        <th>
                                            <input type="text" name='namapj' id='namapj' placeholder="<?= $PJ['nama']; ?>">
                                            <?= form_error('namapj', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </th>
                                        <th>
                                            <input type="number" name='hp' id='hp' min=0 placeholder="<?= $PJ['hp']; ?>">
                                            <?= form_error('hp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </th>
                                        <th>
                                            <input class="form-control <?php echo form_error('ttl_pj') ? 'is-invalid' : '' ?>" type="date" name="ttl_pj" placeholder=<?= $PJ['tanggal_lahir']; ?> />
                                            <?= form_error('ttl_pj', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </th>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <input type="hidden" name='email' value=<?php echo  $PJ['email']; ?>>
                            <input type="submit" name="subpemesan" class="btn btn-primary btn-user btn-block" value="Submit" />
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