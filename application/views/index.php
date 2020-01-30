<!DOCTYPE html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>traveling eropa </title>
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- css -->
  <link href=<?= base_url("assets/css/bootstrap.min.css") ?> rel="stylesheet" media="screen">
  <link href=<?= base_url("assets/css/style.css") ?> rel="stylesheet" media="screen">
  <link href=<?= base_url("assets/color/default.css") ?> rel="stylesheet" media="screen">
  <script src=<?= base_url("assets/js/modernizr.custom.js") ?>></script>
  <!-- =======================================================
    Theme Name: Mamba
    Theme URL: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>
<body>
  <!-- intro area -->

  <div id="intro">

    <div class="intro-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">

            <div class="brand">
              <h1><a onclick="return confirm('Kembali ke halaman pertama?')" href='https://travelingeropapay.com'><img src="<?= base_url('assets/img/logo_ori.png'); ?>" width=300 height=120/> </a>
              <div class="line-spacer"></div>
              <p><span> </span></p>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>


<!-- login -->
<section id="contact" class="home-section bg-white">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-2 col-md-8">
        <div class="section-heading">
          <h2> Upload Bukti Pembayaran</h2>
          <?= $this->session->flashdata('message'); ?>
          <p></p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-offset-2 col-md-8">

        <form action=<?= base_url('cindex/cekemail') ?> method="post">
          <div class="form-group">
            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" required/>
            <div class="validation"></div>
          </div>
          <input type="submit" name="submit" class="btn btn-primary btn-block" value="Next" />
        </form>

      </div>

    </div>
</section>

<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p>&copy; Travelingeropa</p>
        <div class="credits">
          <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Mamba
            -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> hahahaha
        </div>

      </div>
    </div>
  </div>
</footer>

<!-- js -->
<script src='<?= base_url("assets/js/jquery.js") ?>'></script>
<script src='<?= base_url("assets/js/bootstrap.min.js") ?>'></script>
<script src='<?= base_url("assets/js/jquery.smooth-scroll.min.js") ?>'></script>
<script src='<?= base_url("assets/js/jquery.dlmenu.js") ?>'></script>
<script src='<?= base_url("assets/js/wow.min.js") ?>'></script>
<script src='<?= base_url("assets/js/custom.js") ?>'></script>
<script src='<?= base_url("assets/contactform/contactform.js") ?>'></script>

</body>

</html>