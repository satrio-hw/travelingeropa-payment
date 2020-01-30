<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

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
                    <?= $this->session->flashdata('message'); ?>
                    <a href="<?= site_url('cmanagementpembayaran/mp/pemesan'); ?>?e=table"><i class="fas fa-list"></i> Lihat Semua Penanggung Jawab</a>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                        <a href="<?= site_url('cmanagementpembayaran/mp/editpemesan') ?>?e=<?= base64_encode($PJ['email']); ?>>">
                                            <?php echo  $PJ['email']; ?>
                                        </a>
                                    </th>
                                    <th>
                                        <?= $PJ['nama']; ?>
                                    </th>
                                    <th>
                                        <?= $PJ['hp']; ?>
                                    </th>
                                    <th>
                                        <?= $PJ['tanggal_lahir']; ?>
                                    </th>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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