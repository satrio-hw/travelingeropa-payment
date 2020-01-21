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
                    <h1 class="h3 mb-2 text-gray-800">Requirement yang dibutuhkan</h1>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead bgcolor="#4655f2">
                            <tr>
                                <th>
                                    <font color="white">ID Pesanan</font>
                                </th>
                                <th>
                                    <font color="white">Pemesan</font>
                                </th>
                                <th>
                                    <font color="white">Pembayaran</font>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>
                                    <?= $this->session->userdata('idorder'); ?>
                                </th>
                                <th>
                                    <?= $this->session->userdata('sendto'); ?>
                                </th>
                                <th>
                                    <?= $this->session->userdata('type'); ?>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                    <!-- DataTales Example -->
                    <form method="post" action=<?= base_url("cmanagementpembayaran/mp/pending") ?> enctype='multipart/form-data'>
                        <div class="form-group">
                            <div class="form-group">
                                <label>Requirement yang kurang :</label>
                                <textarea name="req" max_length=140 required>Status, Kekurangan</textarea>
                            </div>
                            <input type="submit" name="submitreq" class="btn btn-primary btn-user btn-block" value="Kirim Email" />
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