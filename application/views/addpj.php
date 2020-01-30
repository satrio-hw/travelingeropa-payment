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
              <p><span> R E G I S T E R </span></p>
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
          <h2> Cek Otorisasi Penanggung Jawab</h2>
          <?= $this->session->flashdata('message'); ?>
          <p>*untuk pembayaran cicilan, harap memasukan identitas anda sesuai dengan email yang anda terima</p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-offset-2 col-md-8">
        <div id="sendmessage"></div>
        <div id="errormessage"></div>

        <form action="<?= base_url('cindex/addpj') ?>" method="post">
          <div class="row form-group">
            <div class="col-md-12">
              <label for="fullname">Nama Penanggung Jawab/Penyetor</label><br>
              <sub><font color='red'>*Perhatikan tanda baca, spasi dan huruf kapital !</font></sub>
              <input type="text" name="nama" id="nama" class="form-control">
            </div>

          </div>
          <div class="row form-group">
            <div class="col-md-12">
              <label for="email">Email Penanggung Jawab/Penyetor</label>
              <input type="text" name="email" id="email" class="form-control" value=<?= $this->session->userdata('email'); ?>>
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-12">
              <label for="tanggal_lahir">Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control">
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-12">
              <label for="hp">No. HP</label>
              <input type="text" name="hp" id="hp" class="form-control">
            </div>
          </div>
          <div class="col-md-offset-2 col-md-8">
            <input type="submit" name="bayardp" class="btn btn-primary btn-block" value="PEMBAYARAN DP" />
            <br>
          </div>
          <div class="col-md-offset-2 col-md-8">
            <input type="submit" name="cicilan" class="btn btn-default btn-block" value="setor cicilan" />
          </div>
        </form>

      </div>
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
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
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

</html>x