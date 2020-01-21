<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view("admin/_partials/head.php")  ?>
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
                    <h1 class="h3 mb-2 text-gray-800">List Paket</h1>
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="<?php echo site_url('cpaket/paket/add') ?>"><i class="fas fa-plus"></i> Add New</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead bgcolor="#4655f2">
                                        <tr>
                                            <th>
                                                <font color="white">Nama Paket</font>
                                            </th>
                                            <th>
                                                <font color="white">Harga</font>
                                            </th>
                                            <th>
                                                <font color="white">Harga In-Landtour</font>
                                            </th>
                                            <th>
                                                <font color="white">Upgrade Kamar</font>
                                            </th>
                                            <th>
                                                <font color="white">Optional</font>
                                            </th>
                                            <th>
                                                <font color="white">Visa</font>
                                            </th>
                                            <th>
                                                <font color="white">Asuransi</font>
                                            </th>
                                            <th>
                                                <font color="white">Simcard</font>
                                            </th>
                                            <th>
                                                <font color="white">Upgrade Bagasi</font>
                                            </th>
                                            <th>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($paket as $paket2) : ?>
                                            <tr>
                                                <td>
                                                    <font color='black'>
                                                        <?= $paket2->nama ?>
                                                </td>
                                                <td>
                                                    <font color='black'>
                                                        <?= $paket2->harga ?>
                                                </td>
                                                <td>
                                                    <font color='black'>
                                                        <?= $paket2->harga_in_landtour ?>
                                                </td>
                                                <td>
                                                    <font color='black'>
                                                        <?= $paket2->upgrade_kamar ?>
                                                </td>
                                                <td>
                                                    <font color='black'>
                                                        <?= $paket2->keterangan_tambahan ?>
                                                </td>
                                                <td>
                                                    <font color='black'>
                                                        <?= $paket2->visa ?>
                                                </td>
                                                <td>
                                                    <font color='black'>
                                                        <?= $paket2->asuransi ?>
                                                </td>
                                                <td>
                                                    <font color='black'>
                                                        <?= $paket2->simcard ?>
                                                </td>
                                                <td>
                                                    <font color='black'>
                                                        <?= $paket2->upgrade_bagasi ?></font>
                                                </td>
                                                <td>
                                                    <font color='black'>
                                                        <a href="<?php echo site_url('cpaket/paket/edit/' . $paket2->id_paket) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                                                        <a onclick="deleteConfirm('<?php echo site_url('cpaket/paket/delete/' . $paket2->id_paket) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Delete Confirmation-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->

    <?php $this->load->view("admin/_partials/js.php")  ?>
    <script>
        function deleteConfirm(url) {
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
    </script>

</body>

</html>