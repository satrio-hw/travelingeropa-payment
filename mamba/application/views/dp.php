<!DOCTYPE html>
<html>

<head>
  <title>traveling eropa </title>
  <meta charset="utf-8" />
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
  <div class="menu-area">
    <div id="dl-menu" class="dl-menuwrapper">
      <button class="dl-trigger">Open Menu</button>
      <ul class="dl-menu">
        <li>
          <a href="#intro">Home</a>
        </li>
        <li><a href="<?= base_url('cdp'); ?>">Form DP</a></li>
        <li><a href="<?= base_url('ccicilan'); ?>">Form Cicilan</a></li>
      </ul>
    </div>
    <!-- /dl-menuwrapper -->
  </div>
  </div>

  <!-- intro area -->
  <div id="intro">

    <div class="intro-text">
      <div class="container">
        <div class="row">


          <div class="col-md-12">

            <div class="brand">
              <h1><a href=<?= base_url('maincontrol') ?>>TRAVELING EROPA</a>
                <div class="line-spacer"></div>
                <p><span> FORM DOWNPAYMENT </span></p>
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
            <h2>FORM DOWNPAYMENT</h2>
            <?= $this->session->flashdata('message'); ?>
            <p> </p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-offset-2 col-md-8">
          <div id="sendmessage"></div>
          <div id="errormessage"></div>

          <form action="<?= base_url('cdp/addpembayaran') ?>" method="post">
            <div class="row form-group">
              <div class="form-group">
                <div class="col-md-12">
                  <label for="paket">Paket</label>
                  <select class="form-control" name="paket_pilihan" id="paket_pilihan" required>
                    <?php
                    foreach ($listpaket as $a) { ?>
                      <option value='<?= $a['id_paket']; ?>'><?= $a['nama']; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>

              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label>Jumlah Peserta</label>
                  <input type="number" min=1 class="form-control" name="jmlh_pserta" id="jmlh_pserta" placeholder="Jumlah peserta" required />
                </div>
              </div>

              <div class="col-md-offset-2 col-md-8">
                <input type="hidden" name="namapj" value=<?= $nama; ?>>
                <input type="hidden" name="pembayaran" value='DP'>
                <input type="hidden" name="email" value=<?= $email; ?>>
                <input type="hidden" name="ttl_pj" value=<?= $ttl; ?>>
                <input type="hidden" name="hp_pj" value=<?= $hp; ?>>

                <input type="submit" name="cekemail" class="btn btn-primary btn-block" value="Next" />
              </div>
            </div>
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