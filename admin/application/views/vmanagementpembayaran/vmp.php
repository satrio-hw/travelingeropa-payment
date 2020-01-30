<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <?php $this->load->view("admin/_partials/head.php");  ?>

    <!-- Table Hover Cursor for this page START -->
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 10pt;
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
    <!-- Table Hover Cursor for this page START -->

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


                    <?= $this->session->flashdata('message'); ?>
                    <p class="mb-4">Data Pembayaran<a target="_blank" href="https://datatables.net">Traveling Eropa</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran</h6>
                            <!-- tombol add pembayaran dan export START -->
                            <div align='right'>
                                <form method="POST" action=<?= site_url("cmanagementpembayaran/mp/topoption") ?>>
                                    <button type="submit" name="submit" class="btn btn-primary btn-user btn-sm">
                                        <i class="fas fa-plus-circle"></i>
                                    </button>
                                    <button type="submit" name="export" class="btn btn-success btn-user btn-sm" value="export">
                                        <i class="fas fa-file-download"></i>
                                    </button>
                                </form>
                            </div>
                            <!-- tombol add pembayaran dan export END -->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead bgcolor="#4655f2">
                                        <tr>
                                            <th>
                                                <font color="white">Pembayaran</font>
                                            </th>
                                            <th>
                                                <font color="white">Email Penanggungjawab</font>
                                            </th>
                                            <th>
                                                <font color="white">ID Order</font>
                                            </th>
                                            <th>
                                                <font color="white">Waktu Pemesanan</font>
                                            </th>
                                            <th>
                                                <font color="white">Bukti Pembayaran</font>
                                            </th>
                                            <th>
                                                <font color="white">Tindakan Konformasi</font>
                                            </th>
                                            <th>
                                                <font color="white">Admin</font>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pembayaran as $record) : ?>
                                            <tr>
                                                <td>
                                                    <font color="black">
                                                        <?php echo  $record['pembayaran']; ?>
                                                </td>
                                                <td>
                                                    <font color="black">
                                                        <a href="<?= site_url('cmanagementpembayaran/mp/pemesan') ?>?e=<?= base64_encode($record['email']); ?>?>">
                                                            <?php echo  $record['email']; ?>
                                                        </a>
                                                </td>
                                                <td>
                                                    <font color="black"><?php echo  $record['id_order']; ?>
                                                </td>
                                                <td>
                                                    <font color="black"><?php echo  $record['waktu']; ?>
                                                </td>
                                                <td><a target="_blank" href="<?= base_url('img_bukti/'. $record['bukti']) ; ?>"><?php echo  $record['bukti']; ?></a>
                                                <td>
                                                    <div>
                                                        <?php if ($record['konfirmasi'] == 'none') { ?>
                                                            <a onclick="return confirm('Anda yakin untuk melakukan konfirmasi?')" href="<?= site_url('cmanagementpembayaran/mp/konfirmasi') ?>?id=<?= base64_encode($record['id_order']); ?>&type=<?= $record['pembayaran']; ?>&e=<?= base64_encode($record['email']) ?>" class="btn btn-success btn-user"><i class="fas fa-check-circle"></i></a>
                                                            <a href="<?= site_url('cmanagementpembayaran/mp/pending') ?>?id=<?= base64_encode($record['id_order']); ?>&type=<?= $record['pembayaran']; ?>&e=<?= base64_encode($record['email']) ?>" class="btn btn-info btn-user"><i class="fas fa-tasks"></i></a>
                                                            <a onclick="return confirm('Anda yakin untuk melakukan pembatalan?')" href="<?= site_url('cmanagementpembayaran/mp/tolak') ?>?id=<?= base64_encode($record['id_order']); ?>&type=<?= $record['pembayaran']; ?>&e=<?= base64_encode($record['email']) ?>" class="btn btn-danger btn-user"><i class="fas fa-times-circle"></i></a>
                                                        <?php } else if ($record['konfirmasi'] == 'confirmed') {
                                                            echo '<font color="green">TERKONFIRMASI</font>';
                                                        } else if ($record['konfirmasi'] == 'REJECTED') {
                                                            echo '<font color="red">REJECTED</font>';
                                                        } else {
                                                            echo '<font color="blue">' . $record["konfirmasi"] . '</font>';
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <font color="black"><?php echo  $record['admin']; ?>
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
                    <a class="btn btn-primary" href=<?= site_url('admin/Login/logout'); ?>>Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->

    <?php $this->load->view("admin/_partials/js.php")  ?>

</body>

</html>