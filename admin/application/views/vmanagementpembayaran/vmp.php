<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view("admin/_partials/head.php");  ?>

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
                    <h1 class="h3 mb-2 text-gray-800">Management Data Pembayaran</h1>
                    <p class="mb-4">Data Pembayaran<a target="_blank" href="https://datatables.net">Traveling Eropa</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran</h6>
                            <form method="POST" action=<?= base_url("cmanagementpembayaran/mp/addpembayaran") ?>>
                                <div align='right'>
                                    <button type="submit" name="submit" class="btn btn-primary btn-user btn-sm">
                                        <i class="fas fa-plus-circle"></i>
                                    </button>
                                </div>
                            </form>
                            <form method="POST" action=<?= base_url("cmanagementpembayaran/mp/export_pembayaran") ?>>
                                <div align="right">
                                    <button type="submit" name="export" class="btn btn-success btn-user btn-sm" value="export">
                                        <i class="fas fa-file-download"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Status Pembayaran</th>
                                            <th>Email</th>
                                            <th>id_order</th>
                                            <th>waktu</th>
                                            <th>bukti</th>
                                            <th>Konfirmasi</th>
                                            <th>admin</th>
                                        </tr>
                                    <tbody>
                                        <?php foreach ($pembayaran as $record) : ?>
                                            <tr>
                                                <td><?php echo  $record['status_pembayaran']; ?></td>
                                                <td><?php echo  $record['email']; ?></td>
                                                <td><?php echo  $record['id_order']; ?></td>
                                                <td><?php echo  $record['waktu']; ?></td>
                                                <td><?php echo  '<img src="data:image/jpg;base64,' . base64_encode($record['bukti']) . '" width="200" height="200" >'; ?></td>
                                                <td>
                                                    <div>
                                                        <?php if ($this->session->userdata('konfirmasi') == false) { ?>
                                                            <a onclick="return confirm('Anda yakin untuk melakukan konfirmasi?')" href="<?= base_url('cmanagementpembayaran/mp/konfirmasi'); ?>?e=<?= base64_encode($record['email']) ?>&id=<?= base64_encode($record['id_order']) ?>" class="btn btn-primary btn-user"><i class="fas fa-check-circle"></i></a>
                                                            <a onclick="return confirm('Anda yakin untuk melakukan pembatalan?')" class="btn btn-danger btn-user"><i class="fas fa-times-circle"></i></a>
                                                        <?php } else {
                                                                                                                                                                                                                                            echo '<i class="fas fa-check-circle"></i>';
                                                                                                                                                                                                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

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

</html>uniqidvz