<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view("admin/_partials/head.php")  ?>

    <!-- Table Hover Cursor for this page START -->
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
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

    <!-- script only for this page -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <?php
    if (isset($record_todo)) { ?>
        <script>
            $(document).ready(function() {
                $("#displayModal").modal('show');
            });
        </script>
    <?php
    }
    ?>
</head>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view("admin/_partials/sidebar.php")  ?>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view("admin/_partials/navbar.php")  ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">List Admin Traveling Eropa</h1>
                    <?= $this->session->flashdata('message'); ?>
                    <?php echo phpversion(); ?>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                            <form method="POST" action=<?= base_url("cadmin/admin/form") ?>>
                                <div align="right">
                                    <button type="submit" name="submit" class="btn btn-primary btn-user btn-sm">
                                        <i class="fas fa-user-plus"></i>
                                    </button>
                                    <button type="submit" name="export" class="btn btn-success btn-user btn-sm" value="export">
                                        <i class="fas fa-file-download"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead bgcolor="#4655f2">

                                        <tr>
                                            <th class="col-md-0.5">
                                                <font color="white">ID</font>
                                            </th>
                                            <th class="col-md-2">
                                                <font color="white">Nama</font>
                                            </th>
                                            <th class="col-md-1.5">
                                                <font color="white">Email</font>
                                            </th>
                                            <th class="col-md-1.5">
                                                <font color="white">No. Tlp</font>
                                            </th>
                                            <th class="col-md-3">
                                                <font color="white">Alamat</font>
                                            </th>
                                            <th class="col-md-0.5">
                                                <font color="white">Role</font>
                                            </th>
                                            <th class="col-md-1">
                                                <font color="white">Password</font>
                                            </th>
                                            <th class="col-md-2">
                                                <font color="white">Action</font>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No. Tlp</th>
                                            <th>Alamat</th>
                                            <th>Role</th>
                                            <th>Password</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php

                                        foreach ($admins as $record) :
                                            ?>
                                            <tr>
                                                <td><?php echo  $record['id_admin']; ?></td>
                                                <td><?php echo  $record['nama']; ?></td>
                                                <td><?php echo  $record['email']; ?></td>
                                                <td><?php echo  $record['notlp']; ?></td>
                                                <td><?php echo  $record['alamat']; ?></td>
                                                <td><?php echo  $record['role']; ?></td>
                                                <td>
                                                    <i class="fas fa-lock"></i>
                                                </td>

                                                <td>
                                                    <div align="center">
                                                        <a href="<?= base_url('cadmin/admin/editlist') ?>?id=<?= $record['id_admin'] ?>" class="btn btn-primary btn-user"><i class="fas fa-edit fa-sm"></i></a>
                                                        <a href="<?= base_url('cadmin/admin/deletelist') ?>?id=<?= $record['id_admin'] ?>" class="btn btn-danger btn-user"><i class="fas fa-trash-alt fa-sm"></i></a>
                                                        <?php
                                                            if (isset($record_todo)) {
                                                                $this->load->view("vadmin/modals.php", $record_todo);
                                                            }
                                                            ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.container-fluid -->

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