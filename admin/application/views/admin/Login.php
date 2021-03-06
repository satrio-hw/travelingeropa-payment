<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Travelingeropapay Admin - Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url("assets/"); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url("assets/"); ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="p-5">

                                <div class="wrap_view">
                                    <?= $this->session->flashdata('message'); ?>
                                    <h1 class="heading text-center text-uppercase mb-5"> Login Admin Traveling Eropa </h1>
                                    <div class="inner_sec">
                                        
                                        <p align='center'>
                                         <img src='<?= base_url('assets/img/logo_block.png');?>' height=100>  
                                        </p>
                                         
                                        <div class="row">
                                            <div class="col-12 col-md-5 mx-auto mt-5">
                                                <form action="<?= site_url('auth') #site_url('admin/login') ?>" method="POST">
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="text" class="form-control" name="email" placeholder="Enter Your Email" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <input type="password" class="form-control" name="password" placeholder="Password" required />
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success w-100" value="Login" />
                                        </div>

                                        </form>

                                        <!-- Bootstrap core JavaScript-->
                                        <script src="<?= base_url("assets/"); ?>vendor/jquery/jquery.min.js"></script>
                                        <script src="<?= base_url("assets/"); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                                        <!-- Core plugin JavaScript-->
                                        <script src="<?= base_url("assets/"); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

                                        <!-- Custom scripts for all pages-->
                                        <script src="<?= base_url("assets/"); ?>js/sb-admin-2.min.js"></script>

</body>

</html>