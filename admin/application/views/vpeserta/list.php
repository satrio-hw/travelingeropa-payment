<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view("admin/_partials/head.php"); ?>
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
                    <h1 class="h3 mb-2 text-gray-800">Table Peserta</h1>
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!-- <a href="<?php #echo site_url('cpeserta/peserta/add') 
                                            ?>"><i class="fas fa-plus"></i> Add New</a> -->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead bgcolor="#4655f2">
                                        <tr>
                                            <th>
                                                <font color="white">
                                                    Email Peserta
                                            </th>
                                            <th>
                                                <font color="white">
                                                    Nama
                                            </th>
                                            <th>
                                                <font color="white">
                                                    Tanggal Lahir
                                            </th>
                                            <th>
                                                <font color="white">
                                                    Nomor Passport
                                            </th>
                                            <th>
                                                <font color="white">
                                                    Expired Passport
                                            </th>
                                            <th>
                                                <font color="white">
                                                    Status Tiket
                                            </th>
                                            <th>
                                                <font color="white">
                                                    Nomor Hanphone
                                            </th>
                                            <th>
                                                <font color="white">
                                                    Domisili
                                            </th>
                                            <th>
                                                <font color="white">
                                                    Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($peserta as $pesertaa) : ?>
                                            <tr>
                                                <td>
                                                    <font color="black">
                                                        <?= $pesertaa->email_peserta ?>
                                                </td>
                                                <td>
                                                    <font color="black">
                                                        <?= $pesertaa->nama ?>
                                                </td>
                                                <td>
                                                    <font color="black">
                                                        <?= $pesertaa->tanggal_lahir ?>
                                                </td>
                                                <td>
                                                    <font color="black">
                                                        <?php if ($pesertaa->no_passport == null) {
                                                            echo '-';
                                                        } else {
                                                            echo $pesertaa->no_passport;
                                                        } ?>
                                                </td>
                                                <td>
                                                    <font color="black">
                                                        <?php if ($pesertaa->no_passport == null) {
                                                            echo '-';
                                                        } else {
                                                            echo $pesertaa->exp_passport;
                                                        } ?>
                                                </td>
                                                <td>
                                                    <font color="black">
                                                        <?= $pesertaa->status_tiket ?>
                                                </td>
                                                <td>
                                                    <font color="black">
                                                        <?= $pesertaa->hp ?>
                                                </td>
                                                <td>
                                                    <font color="black">
                                                        <?= $pesertaa->domisili ?>
                                                </td>
                                                <td>
                                                    <font color="black">
                                                        <a href="<?php echo site_url('cpeserta/peserta/edit/' . $pesertaa->id_peserta) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                                                        <a onclick="deleteConfirm('<?php echo site_url('cpeserta/peserta/delete/' . $pesertaa->id_peserta) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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