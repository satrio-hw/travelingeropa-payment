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
                <p><span> FORM CICILAN </span></p>

            </div>
          </div>
        </div>
      </div>
    </div>

  </div>


  <!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <h3><i class></i>Form Cicilan</h3>

      <?= $this->session->flashdata('message'); ?>
      <!-- BASIC FORM VALIDATION -->

      <div class="form-panel">

        <form action="<?= base_url('cdp/addpembayaran') ?>" method="post" enctype="multipart/form-data">

          <div class="form-group has-success">
            <label class="col-lg-2 control-label"><b>Pembayaran :</b></label>
            <div class="col-md-5">
              <select class="form-control" name="pembayaran" id="pembayaran" required>
                <option value="DP">DP</option>
                <option value="cicilan1">Cicilan 1</option>
                <option value="cicilan2">Cicilan 2</option>
                <option value="cicilan3">Cicilan 3</option>
                <option value="cicilan4">Cicilan 4</option>
                <option value="pelunasan">Pelunasan</option>
              </select>
            </div>
            <br>
            <br>
            <label class="col-lg-2 control-label">Untuk Paket :</label>
            <div class="col-md-5">
              <select class="form-control" name="idorder" id="idorder" required>
                <?php
                foreach ($id_order as $id_order) { ?>
                  <option value='<?= $id_order['id_order']; ?>'>(<?= $id_order['id_order']; ?>),
                    <?php
                    $paket = $this->db->get_where('paket', ['id_paket' => $id_order['id_paket']])->result_array();
                    echo $paket[0]['nama'];
                    ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>
          <div class="form-group has-error">
            <label class="col-lg-2 control-label">Upload Bukti ( <?= '<' ?> 5MB ):</label>
            <input type="file" name='bukti'>

            <input type="hidden" name="namapj" value=<?= $this->session->userdata('namapenyetor'); ?>>
            <input type="hidden" name="email" value=<?= $this->session->userdata('email'); ?>>
            <input type="hidden" name="ttl_pj" value=<?= $this->session->userdata('ttlpenyetor'); ?>>
            <input type="hidden" name="hp_pj" value=<?= $this->session->userdata('hppenyetor'); ?>>
            <input type="hidden" name="paket_pilihan" value=<?= $id_order['id_paket']; ?>>

            <input type="submit" name="cicilan" class="btn btn-primary btn-block" value="Submit" />
          </div>
        </form>

      </div>
      <!-- /form-panel -->
      </div>
      <!-- /col-lg-12 -->
      </div>
      <!-- row -->
    </section>
    <!-- /wrapper -->
  </section>
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

</html>